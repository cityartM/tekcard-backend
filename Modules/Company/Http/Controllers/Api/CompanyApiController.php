<?php

namespace Modules\Company\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Card\Models\Card;
use Modules\Company\Http\Requests\CreateCompanyCardContactRequest;
use Modules\Company\Http\Resources\CompanyCardContactResource;
use Modules\Company\Http\Resources\CompanyResource;
use Modules\Company\Http\Resources\CompanyUsersResource;
use Modules\Company\Models\Company;
use Modules\Company\Repositories\CompanyCardContactRepository;
use Modules\Company\Repositories\CompanyRepository;
use Spatie\QueryBuilder\QueryBuilder;

use Modules\Company\Models\CompanyCardContact;

class CompanyApiController extends ApiController
{

    private $company;
    private $companyCardContacts;

    function __construct(CompanyRepository $company,CompanyCardContactRepository $companyCardContacts)
    {
        $this->company= $company;
        $this->companyCardContacts= $companyCardContacts;
    }

    public function index()
    {
        $companies = QueryBuilder::for(Company::class)
            ->allowedSorts(['id'])
            ->defaultSort('-id')
            ->paginate(10);

        return $this->respondWithSuccess([
            'companies' =>  CompanyResource::collection($companies),
        ], 'Company request back successfully.', 200);
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function companyUsers()
    {
        $companyUsers = QueryBuilder::for(User::class)
            ->where('company_id', auth()->user()->company_id)
            ->allowedFilters(['name', 'email'])
            ->allowedSorts(['id'])
            ->defaultSort('-id')
            ->paginate(10);

        return $this->respondWithSuccess([
            'CompanyUsers' => CompanyUsersResource::collection($companyUsers),
        ], 'CompanyUsers request back successfully.', 200);
    }


    public function storeCardContact(CreateCompanyCardContactRequest $request)
    {
        $data = $request->only(['card_id', 'remark_id', 'group_id']);

        if(auth()->user()->company_id == null){
            return $this->setStatusCode(403)->respondWithError('You are not allowed to create a company card contact',);
        }

        $existCard = $this->companyCardContacts->checkExistCard($data['card_id'],auth()->user()->company_id);

        if($existCard){
            return $this->respondWithSuccess([
                'companyCardContact' => new CompanyCardContactResource($existCard),
            ], 'Company Card Contact created successfully', 200);
        }

        $data['user_id'] = auth()->id();
        $data['company_id'] = auth()->user()->company_id;

        $cardContact = $this->companyCardContacts->create($data);

        return $this->respondWithSuccess([
            'companyCardContact' => new CompanyCardContactResource($cardContact),
        ], 'Company Card Contact created successfully', 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        
        try {

            $companyCardContact = CompanyCardContact::where('id', $id)->first();
          

            if ($companyCardContact->user_id !== auth()->id()) {
                return $this->respondWithSuccess(
                    ['message' => 'You are not authorized to delete this remark'],
                    'Authorization failed',403
                );
            }

            if (!$companyCardContact) {
                return $this->setStatusCode(400)->respondWithError('Company Card Contact not found.');
            }

            

            $companyCardContact->delete();

            return $this->respondWithSuccess([
                'companyCardContact' => new CompanyCardContactResource($companyCardContact),
            ], 'Company Card Contact deleted successfully', 200);
        } catch (\Exception $e) {

            return $this->respondWithError('Failed to delete Company Card Contact.', 500);
        }
    }



}
