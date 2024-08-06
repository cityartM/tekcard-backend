<?php

namespace Modules\Feature\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Cache;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Feature\Http\Requests\CreateFeatureRequest;
use Modules\Feature\Http\Requests\UpdateFeatureRequest;
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

    public function indexCompany()
    {
        return view('feature::indexCompany', [
            'plans' => Plan::where('type', 'company')->get(),
            'features' => $this->features->all()
        ]);
    }

    public function indexClient()
    {
        return view('feature::indexClient', [
            'plans' => Plan::where('type', 'client')->get(),
            'features' => $this->features->all()
        ]);
    }

    public function show()
    {
        return view('feature::indexCompany', [
            'plans' => Plan::where('type', 'company')->get(),
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
     * Update specified feature with provided data.
     *
     * @param Feature $feature
     * @param UpdateFeatureRequest $request
     * @return mixed
     */
    public function update(Feature $feature, UpdateFeatureRequest $request)
    {
        $this->features->update($feature->id, $request->all());

        return redirect()->route('features.index')
            ->withSuccess(__('Feature updated successfully.'));
    }

    /**
     * Remove specified feature from system.
     *
     * @param Feature $feature
     * @param UserRepository $userRepository
     * @return mixed
     */
    public function destroy(Feature $feature, UserRepository $userRepository)
    {

        if (! $feature->removable) {
            return redirect()->back()->withSuccess(__('You can not delete this feature.'));
        }

        //$userPlan = $this->plans->findByName('User');

        //$userRepository->switchPlansForUsers($plan->id, $userPlan->id);

        $this->features->delete($feature->id);

        Cache::flush();

        return redirect()->route('features.index')
            ->withSuccess(__('Feature deleted successfully.'));
    }
}
