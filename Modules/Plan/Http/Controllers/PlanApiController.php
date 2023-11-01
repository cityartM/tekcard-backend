<?php

namespace Modules\Plan\Http\Controllers;


use Illuminate\Http\Request;

use Modules\Plan\Http\Filters\PlanKeywordType;
use App\Http\Controllers\Api\ApiController;
use Modules\Plan\Http\Resources\PlanResource;
use Modules\Plan\Models\Plan;
use Modules\Plan\Repositories\PlanRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

use Modules\ContactUser\Http\Resources\RemarkResource;


class PlanApiController extends ApiController
{
    private $plans;

    public function __construct(PlanRepository $plans)
    {
        $this->plans = $plans;
    }

    public function index(Request $request)
    {
          $plans = QueryBuilder::for(Plan::class)
             ->allowedFilters([
                AllowedFilter::custom('type', new PlanKeywordType),
            ])
            ->allowedSorts(['id'])
            ->defaultSort('id')
            ->paginate($request->per_page ?: 10);


    return $this->respondWithSuccess([
        'plans' => PlanResource::collection($plans)->response()->getData(true),
    ],  'Plans retrieved successfully', 200);

    }


    public function show($id)
    {
        $plan = Plan::find($id);


        return $this->respondWithSuccess([
            'plan' => new RemarkResource($plan),
        ], 'Plan retrieved successfully', 200);
    }

}
