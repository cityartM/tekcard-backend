<?php

namespace App\Http\Controllers\Api\Notifications;

use App\Http\Controllers\Api\ApiController;
use App\Http\Filters\NotificationKeywordSearch;
use App\Http\Resources\NotificationResource;
use App\Repositories\Notification\NotificationRepository;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use App\Models\Notification;

class NotificationController extends ApiController
{
    /*
     *
     */
    private $notifications;

    /**
     * NotificationController constructor.
     * @param NotificationRepository $notifications
     */

    public function __construct(NotificationRepository $notifications)
    {
        $this->notifications = $notifications;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = QueryBuilder::for(Notification::class)
            ->allowedFilters([
                AllowedFilter::custom('search', new NotificationKeywordSearch()),
                AllowedFilter::exact('office_id'),
                AllowedFilter::exact('receiving_office_id'),
            ])
            ->allowedSorts(['id', 'created_at', 'updated_at'])
            ->defaultSort('id')
            ->paginate(10);

        return NotificationResource::collection($notifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Hoska\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Hoska\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(notification $notification)
    {
        //
    }

    /**
     * @param Request $request
     * @param notification $notification
     * @return array|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function update(Request $request, notification $notification)
    {
        $data = [
            'read_at'=> 1
        ];
        $notification = $this->notifications->update($notification->id , $data);
        return [ 'message' => $this->respondWithSuccessNotArray(),'data' => new NotificationResource($notification)];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Hoska\notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(notification $notification)
    {
        //
    }
}
