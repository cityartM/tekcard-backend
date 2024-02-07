<?php

namespace Modules\Company\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Http\Controllers\Api\ApiController;
use Modules\Company\Repositories\CompanyRepository;
use Modules\Company\Http\Resources\CompanyUsersResource;

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
{
    $companyId = auth()->user()->company_id;

    $companyUsers = User::where('company_id', $companyId)->get();

    return $this->respondWithSuccess([
        'CompanyUsers' => CompanyUsersResource::collection($companyUsers),
    ], 'CompanyUsers request back successfully.', 200);
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
