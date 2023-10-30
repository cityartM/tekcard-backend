<?php

namespace Modules\Feature\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Cache;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Feature\Http\Requests\CreateFeatureRequest;
use Modules\Feature\Models\Feature;
use Modules\Feature\Repositories\FeatureRepository;
use Modules\Plan\Http\Requests\CreatePlanRequest;
use Modules\Plan\Http\Requests\UpdatePlanRequest;
use Modules\Plan\Models\Plan;
use Modules\Plan\Repositories\PlanRepository;

/**
 * Class RolesController
 * @package App\Http\Controllers
 */
class FeaturesController extends Controller
{
    /**
     * @var PlanRepository
     */
    private $plans;
    /**
     * @var FeatureRepository
     */
    private $features;

    /**
     * PermissionsController constructor.
     * @param PlanRepository $plans
     * @param FeatureRepository $features
     */
    public function __construct(PlanRepository $plans, FeatureRepository $features)
    {
        $this->plans = $plans;
        $this->features = $features;
    }

    /**
     * Displays the page with all available permissions.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('feature::index', [
            'plans' => $this->plans->all(),
            'features' => $this->features->all()
        ]);
    }

    /**
     * Display form for creating new plan.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('feature::add-edit', ['edit' => false]);
    }

    /**
     * Store newly created plan to database.
     *
     * @param CreateFeatureRequest $request
     * @return mixed
     */
    public function store(CreateFeatureRequest $request)
    {
        $this->features->create($request->all());

        return redirect()->route('plans.index')
            ->withSuccess(__('Plan created successfully.'));
    }

    /**
     * Display for editing specified plan.
     *
     * @param Feature $feature
     * @return Factory|View
     */
    public function edit(Feature $feature)
    {
        return view('feature::add-edit', [
            'feature' => $feature,
            'edit' => true
        ]);
    }

    /**
     * Update specified plan with provided data.
     *
     * @param Plan $plan
     * @param UpdatePlanRequest $request
     * @return mixed
     */
    public function update(Plan $plan, UpdatePlanRequest $request)
    {
        $this->plans->update($plan->id, $request->all());

        return redirect()->route('plans.index')
            ->withSuccess(__('Plan updated successfully.'));
    }

    /**
     * Remove specified plan from system.
     *
     * @param Plan $plan
     * @param UserRepository $userRepository
     * @return mixed
     */
    public function destroy(Plan $plan, UserRepository $userRepository)
    {

        if (! $plan->removable) {
            return redirect()->back()->withSuccess(__('You can not delete this plan'));
        }

        //$userPlan = $this->plans->findByName('User');

        //$userRepository->switchPlansForUsers($plan->id, $userPlan->id);

        $this->plans->delete($plan->id);

        Cache::flush();

        return redirect()->route('plans.index')
            ->withSuccess(__('Plan deleted successfully.'));
    }
}
