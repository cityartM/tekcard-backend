<?php

namespace Modules\Plan\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Cache;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\Plan\Http\Requests\CreatePlanRequest;
use Modules\Plan\Http\Requests\UpdatePlanRequest;
use Modules\Plan\Models\Plan;
use Modules\Plan\Repositories\PlanRepository;

/**
 * Class RolesController
 * @package App\Http\Controllers
 */
class PlansController extends Controller
{
    /**
     * @var PlanRepository
     */
    private $plans;

    /**
     * PlansController constructor.
     * @param PlanRepository $plans
     */
    public function __construct(PlanRepository $plans)
    {
        $this->plans = $plans;
    }



    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->plans->getDatatables()->datatables($request);
        }
        return view("plan::index")->with([
            "columns" => $this->plans->getDatatables()::columns(),
        ]);
    }

    /**
     * Display form for creating new plan.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('plan::add-edit', ['edit' => false]);
    }

    /**
     * Store newly created plan to database.
     *
     * @param CreatePlanRequest $request
     * @return mixed
     */
    public function store(CreatePlanRequest $request)
    {
        $this->plans->create($request->all());

        return redirect()->route('plans.index')
            ->withSuccess(__('Plan created successfully.'));
    }

    /**
     * Display for editing specified plan.
     *
     * @param Plan $plan
     * @return Factory|View
     */
    public function edit(Plan $plan)
    {
        return view('plan::add-edit', [
            'plan' => $plan,
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
