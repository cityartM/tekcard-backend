<?php

namespace Modules\CompanyGroups\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\CompanyGroups\Models\CompanyGroup;
use Modules\CompanyGroups\Http\Resources\CompanyGroupResource;
use Modules\CompanyGroups\Http\Requests\CreateGroupRequest;
use Modules\CompanyGroups\Repositories\CompanyGroupRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ApiController;

class CompanyGroupsApiController extends ApiController
{
    private $group;

    function __construct(CompanyGroupRepository $group)
    {
        $this->group = $group;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
{
    $user = Auth::user();
    $company_id = $user->company_id;
    $companyGroup = CompanyGroup::where('company_id', $company_id)->get();

    return $this->respondWithSuccess([
        'company_groups' => CompanyGroupResource::collection($companyGroup),
    ], 'company_groups request back successfully.', 200);
}

    /**
     * Store a newly created resource in storage.
     * @param CreateGroupRequest $request
     * @return Renderable
     */
    public function store(CreateGroupRequest $request)
    {
        $data = $request->only(['display_name']);
        $data['user_id'] = Auth::id();
        $user = Auth::user();
        $data['company_id'] = $user->company_id;

        $group = CompanyGroup::create($data);

        return $this->respondWithSuccess([
            'group' => new CompanyGroupResource($group),
        ],  'group request created successfully.',200);
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $group = CompanyGroup::find($id);
        if (!$group) {
            return response()->json(['error' => 'Group not found'], 404);
        }
        return response()->json(['group' => new CompanyGroupResource($group)], 200);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreateGroupRequest $request, $id)
    {
        
        $group = CompanyGroup::find($id);
        
        if (!$group) {
            return response()->json(['error' => 'Group not found'], 404);
        }
        if ($group->user_id !== Auth::id()) {
            return response()->json(['error' => 'You are not authorized to update this group'], 403);
        }
        
        $data = $request->only(['display_name']);
        
        $group->update($data);

        return $this->respondWithSuccess([
            'group' => new CompanyGroupResource($group),
        ],  'group request created successfully.',200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $group = CompanyGroup::find($id);
        

        if (!$group) {
            return response()->json(['error' => 'Group not found'], 404);
        }
        if ($group->user_id !== Auth::id()) {
            return response()->json(['error' => 'You are not authorized to delete this group'], 403);
        }

        $group->delete();

        return response()->json(['message' => 'Group deleted successfully'], 200);
    }
}
