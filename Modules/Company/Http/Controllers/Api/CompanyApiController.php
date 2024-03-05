<?php

namespace Modules\Company\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
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
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('company::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('company::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('company::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($cardId)
{
    try {
      
        $companyCardContact = CompanyCardContact::where('id', $cardId)->first();

        if (!$companyCardContact) {
            return $this->respondWithError('Company Card Contact not found.', 404);
        }

        $companyCardContact->delete();

        return $this->respondWithSuccess([
            'companyCardContact' => new CompanyCardContactResource($companyCardContact),
        ], 'Company Card Contact deleted successfully', 200);
    } catch (\Exception $e) {
        
        return $this->respondWithError('Failed to delete Company Card Contact.', 500);
    }
}

/*
public function destroy(Request $request)
{
    try {
        // Validate the incoming request
        $request->validate([
            'user_id' => 'required|integer',
            'card_id' => 'required|integer',
            'group_id' => 'required|integer',
        ]);

        // Extract parameters from the request
        $userId = $request->input('user_id');
        $cardId = $request->input('card_id');
        $groupId = $request->input('group_id');

        // Find the company card contact with given user_id, card_id, and group_id
        $companyCardContact = CompanyCardContact::where('user_id', $userId)
            ->where('card_id', $cardId)
            ->where('group_id', $groupId)
            ->first();

        // If the company card contact doesn't exist, return a 404 response
        if (!$companyCardContact) {
            return $this->respondWithError('Company Card Contact not found.', 404);
        }

        // Delete the company card contact
        $companyCardContact->delete();

        // Return a success response
        return $this->respondWithSuccess([
            'companyCardContact' => new CompanyCardContactResource($companyCardContact),
        ], 'Company Card Contact deleted successfully', 200);
    } catch (\Exception $e) {
        // If an exception occurs during the process, return a 500 response
        return $this->respondWithError('Failed to delete Company Card Contact.', 500);
    }
}*/



}
