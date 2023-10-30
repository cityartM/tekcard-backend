<?php

namespace Modules\ContactUser\Http\Controllers;


use Illuminate\Http\Request;
use Modules\ContactUser\Http\Controllers\Controller;
use Modules\ContactUser\Models\Remark;
use Modules\ContactUser\Http\Requests\CreateRemarkRequest;
use Modules\ContactUser\Repositories\RemarkRepository;
use App\Http\Controllers\Api\ApiController;
use Modules\ContactUser\Http\Filters\RemarkKeywordSearch;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

use Modules\ContactUser\Http\Resources\RemarkResource;


class RemarkApiController extends ApiController
{
    private $remarkUser;

    public function __construct(RemarkRepository $remarkUser)
    {
        $this->remarkUser = $remarkUser;
    }

    public function index(Request $request)
    {
          $remarks = QueryBuilder::for(Remark::class)
             ->where('user_id',auth()->user()->id)
             ->allowedFilters([
                AllowedFilter::custom('search', new RemarkKeywordSearch),
            ])
            ->allowedSorts(['id'])
            ->defaultSort('id')
            ->paginate($request->per_page ?: 1);

        
    return $this->respondWithSuccess([
        'remarks' => RemarkResource::collection($remarks)->response()->getData(true),
    ],  'Remarks retrieved successfully', 200);

    }


    public function show($id)
{
    $remark = Remark::find($id);


    return $this->respondWithSuccess([
        'remark' => new RemarkResource($remark),
    ], 'Remark retrived successfully', 200);
}

    public function store(CreateRemarkRequest $request)
    {
        $data = $request->only(['title', 'color']);
        $data['user_id'] = auth()->id();
    
        $remark = Remark::create($data);
    
        return $this->respondWithSuccess([
            'remark' => new RemarkResource($remark),
        ], 'Remark created successfully', 200);
    }

    public function update(CreateRemarkRequest $request, $id)
    {
        return response()->json(['message' => $request->all()], 200);
        $data = $request->only(['title', 'color']);
        
        $remark = Remark::find($id);

        if (!$remark) {
            return $this->respondWithSuccess(
                ['message' => 'Remark not found'],
                'Remark not found',404
            );
        }
    
        if ($remark->user_id !== auth()->id()) {
            return $this->respondWithSuccess(
                ['message' => 'You are not authorized to update this remark'],
                'Authorization failed',403
            );
        }

        
        $remark->update($data);

        return $this->respondWithSuccess([
            'remark' => new RemarkResource($remark),
        ], 'Remark updated successfully', 200);
    }

    public function destroy($id)
    {
        $remark = Remark::find($id);
        
        if (!$remark) {
        return $this->respondWithSuccess(
            ['message' => 'Remark not found'],
            'Remark not found',404
        );}

        if ($remark->user_id !== auth()->id()) {
            return $this->respondWithSuccess(
                ['message' => 'You are not authorized to delete this remark'],
                'Authorization failed',403
            );
        }

        $remark->delete();

        return $this->respondWithSuccess([
            'remark' => new RemarkResource($remark),
        ],  'Remark deleted successfully', 200);
    }
}
