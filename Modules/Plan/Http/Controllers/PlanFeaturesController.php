<?php

namespace Modules\Plan\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Modules\Plan\Repositories\PlanRepository;

/**
 * Class PlanFeaturesController
 * @package App\Http\Controllers
 */
class PlanFeaturesController extends Controller
{
    /**
     * @var PlanRepository
     */
    private $plans;

    /**
     * PlanFeaturesController constructor.
     * @param PlanRepository $plans
     */
    public function __construct(PlanRepository $plans)
    {
        $this->plans = $plans;
    }

    /**
     * Update permissions for each plan.
     *
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        $plans = $request->get('plans');

        $allPlans = $this->plans->lists('id');

        foreach ($allPlans as $planId) {
            $features = Arr::get($plans, $planId, []);
            $this->plans->updateFeatures($planId, $features);
        }

        return redirect()->route('features.index')
            ->withSuccess(__('Features saved successfully.'));
    }
}
