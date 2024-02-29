<?php

namespace Modules\ContactUser\Http\Controllers\Api;


use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Modules\ContactUser\Http\Controllers\Controller;
use Modules\ContactUser\Http\Filters\GroupKeywordSearch;
use Modules\ContactUser\Http\Filters\RemarkKeywordSearch;
use Modules\ContactUser\Http\Requests\CreateGroupRequest;
use Modules\ContactUser\Http\Requests\CreateRemarkRequest;
use Modules\ContactUser\Http\Requests\UpdateGroupRequest;
use Modules\ContactUser\Http\Resources\GroupResource;
use Modules\ContactUser\Http\Resources\RemarkResource;
use Modules\ContactUser\Models\Group;
use Modules\ContactUser\Models\Remark;
use Modules\ContactUser\Repositories\GroupRepository;
use Modules\ContactUser\Repositories\RemarkRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class GroupApiController extends ApiController
{
    private $groups;

    public function __construct(GroupRepository $groups)
    {
        $this->groups = $groups;
    }

    public function index(Request $request)
    {
          $groups = QueryBuilder::for(Group::class)
             ->where('company_id',auth()->user()->company?->id)
             ->where('company_id','!=',null)
             ->allowedFilters([
                AllowedFilter::custom('search', new GroupKeywordSearch),
            ])
            ->allowedSorts(['id'])
            ->defaultSort('id')
            ->get();


        return $this->respondWithSuccess([
            'groups' => GroupResource::collection($groups),
        ],  'Groups retrieved successfully', 200);

    }


    public function show(Group $group)
    {
        return $this->respondWithSuccess([
            'group' => new GroupResource($group),
        ], 'Group retrieved successfully', 200);
    }


    public function store(CreateGroupRequest $request)
    {
        if(!auth()->user()->hasRole('Company') || auth()->user()->company_id == null  ) {
            return $this->respondWithError('You are not authorized to create a group', 403);
        }
        $data = $request->only(['display_name', 'company_id','bio']);
        $data['company_id'] = auth()->user()->company->id;
        $data['user_id'] = auth()->id();

        $group = $this->groups->create($data);

        return $this->respondWithSuccess([
            'group' => new GroupResource($group),
        ], 'Group created successfully', 200);
    }

    public function update(UpdateGroupRequest $request, Group $group)
    {
        $data = $request->only(['display_name', 'company_id','bio']);

        $group = $this->groups->update($group->id, $data);

        return $this->respondWithSuccess([
            'group' => new GroupResource($group),
        ], 'Group updated successfully', 200);
    }

    public function destroy($id)
    {
        $Group = Group::find($id);

        if (!$Group) {
        return $this->respondWithSuccess(
            ['message' => 'Group not found'],
            'Group not found',404
        );}

        if ($Group->user_id !== auth()->id()) {
            return $this->respondWithSuccess(
                ['message' => 'You are not authorized to delete this Group'],
                'Authorization failed',403
            );
        }

        $Group->delete();

        return $this->respondWithSuccess([
            'Group' => new GroupResource($Group),
        ],  'Group deleted successfully', 200);
    }
}
