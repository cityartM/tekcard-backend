<?php

namespace Modules\FeedBack\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Support\Enum\Status;

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
  

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->feedBack->getDatatables()->datatables($request);
        }
        return view("feedback::index")->with([
            "columns" => $this->feedBack->getDatatables()::columns(),
        ]);
    }

    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);

        $this->feedBack->update($feedback);
    
    return redirect()->back()->with('success', 'Status updated successfully');
    }

    public function getPublishedFeedback()
{
    // Retrieve all published feedback
    $publishedFeedback = Feedback::where('status', Status::PUBLISHED)->get();

    dd($publishedFeedback);

    return view('your-view', compact("publishedFeedback"));
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
