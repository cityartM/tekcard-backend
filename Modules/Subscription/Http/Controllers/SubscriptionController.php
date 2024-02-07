<?php

namespace Modules\Subscription\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Subscription\Models\Subscription;
use Modules\Subscription\Http\Requests\CreateSubscriptionRequest;
use Modules\Subscription\Repositories\SubscriptionRepository;

use Illuminate\Support\Facades\Response as LaravelResponse;


use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;

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
    

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->subscriptions->getDatatables()->datatables($request);
        }
        return view("subscription::index")->with([
            "columns" => $this->subscriptions->getDatatables()::columns(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateSubscriptionRequest $request)
    {
        $data = $request->only(['email']);

        $this->subscriptions->create($data);
       // Subscription::create($data);

        return redirect()->back()
            ->with('success', 'Subscription created successfully');
    }


    public function destroy($id)
    {
       // dd("its here");

       $subscriptions = $this->subscriptions->delete($id);

        return redirect()->route('subscriptions.index')->with('success', 'subscription deleted successfully.');
    }

    public function download()
    {
        $data = Subscription::all(); // Fetch data from your table

        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Add CSV header
        $csv->insertOne(['id', 'email', 'created_at']); // Replace with your actual column names

        // Add data to CSV
        foreach ($data as $row) {
            $csv->insertOne($row->toArray());
        }

        $filename = 'data.csv';

        return LaravelResponse::make($csv->output(), 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

}
