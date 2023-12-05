<?php

namespace Modules\FeedBack\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Controllers\Api\ApiController;
use Modules\FeedBack\Models\FeedBack;


use Modules\FeedBack\Http\Resources\FeedbackResource;

use Modules\FeedBack\Http\Requests\FeedBackRequest;

use Modules\FeedBack\Repositories\FeedBackRepository;
use App\Support\Enum\Status;


class FeedBackApiController extends ApiController
{

    private $feedBack;

    function __construct(FeedBackRepository $feedBack)
    {
        $this->feedBack= $feedBack;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
{
    $publishedFeedback = Feedback::where('status', Status::PUBLISHED)->get();

    return $this->respondWithSuccess([
        'feedBack' => FeedbackResource::collection($publishedFeedback),
    ], 'feedBack request back successfully.', 200);
}
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('feedback::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(FeedBackRequest $request)
    {
        $data = $request->only(['rating','comment']);

        $user_id = auth()->user()->id;

        $data['user_id'] = $user_id;

        $feedBack = $this->feedBack->create($data);

        return $this->respondWithSuccess([
            'feedBack' => new FeedbackResource($feedBack),
        ],  'feedBack request created successfully.',200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('feedback::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('feedback::edit');
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
