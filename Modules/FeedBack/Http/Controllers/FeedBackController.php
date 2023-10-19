<?php

namespace Modules\FeedBack\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\FeedBack\Http\Requests\FeedBackRequest;

use Modules\FeedBack\Repositories\FeedBackRepository;

use Modules\FeedBack\Models\FeedBack;

class FeedBackController extends Controller
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
        $feedback = $this->feedBack->all();

        return view('feedback::index',compact('feedback'));
    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
         $this->feedBack->delete($id);

        return redirect()->route('feedback.index')->with('success', __('app.feedback_deleted_successfully'));
    }
}
