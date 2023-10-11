<?php

namespace Modules\Subscription\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Subscription\Models\Subscription;
use Modules\Subscription\Http\Requests\CreateSubscriptionRequest;
use Modules\Subscription\Repositories\SubscriptionRepository;

class SubscriptionController extends Controller
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
        return view('subscription::index', compact('subscriptions'));
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateSubscriptionRequest $request)
    {
        $data = $request->only(['email']);

        Subscription::create($data->all());

        return redirect()->route('subscriptions.index')
            ->with('success', 'Subscription created successfully');
    }


    public function destroy($id)
    {
       // dd("its here");
    
       $subscriptions = $this->subscriptions->delete($id);

        return redirect()->route('subscriptions.index')->with('success', 'subscription deleted successfully.');
    }
}
