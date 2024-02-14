<?php

namespace Modules\Company\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Http\Controllers\Api\ApiController;
use Modules\Company\Repositories\CompanyRepository;
use Modules\Company\Http\Resources\CompanyUsersResource;
use Spatie\QueryBuilder\QueryBuilder;

class CompanyApiController extends ApiController
{

    private $company;

    function __construct(CompanyRepository $company)
    {
        $this->company= $company;
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {;

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


    public function storeCardContact(CreateCardContactRequest $request)
    {
        $data = $request->only(['card_id', 'remark_id', 'group']);

        $existCard = $this->cardContacts->checkExistCard($data['card_id'],auth()->id());

        if($existCard){
            return $this->respondWithSuccess([
                'cardContact' => new CardContactResource($existCard),
            ], 'Card Contact created successfully', 200);
        }

        $data['user_id'] = auth()->id();

        $cardContact = $this->cardContacts->create($data);

        return $this->respondWithSuccess([
            'cardContact' => new CardContactResource($cardContact),
        ], 'Card Contact created successfully', 200);
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
    public function destroy($id)
    {
        //
    }
}
