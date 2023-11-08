<?php

namespace Modules\Subscription\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Subscription\Models\Subscription;

use App\Http\Controllers\Api\ApiController;
use Modules\Subscription\Repositories\SubscriptionRepository;
use Modules\Subscription\Http\Resources\SubscriptionResource;


class SubscriptionApiController extends ApiController
{

    private $subscriptions; 

    function __construct(SubscriptionRepository $subscriptions)
    {
        $this->subscriptions= $subscriptions;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $subscriptions = Subscription::all();

        return $this->respondWithSuccess([
            'Subscription' => new SubscriptionResource($subscriptions),
        ],  'Help request created successfully.',200);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('subscription::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->only(['email']);

        $subscription = $this->subscriptions->create($data);

       //$subscription = Subscription::create($data);
        

        return $this->respondWithSuccess([
            'Subscription' => new SubscriptionResource($data),
        ],  'Subscription request created successfully.',200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('subscription::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('subscription::edit');
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
