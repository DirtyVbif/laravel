<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    const FEEDBACK_FILE = 'app/public/feedbacks.json';

    public function index()
    {
        $model = new Feedback();
        $data = [
            'title' => title('About Project'),
            'page_title' => 'About',
            'feedbacks' => $model->getFeedbacksList(4)
        ];
        
        return view('content/about', $data);
    }

    public function indexPostRequest(FeedbackRequest $request)
    {
        $model = new Feedback();
        $model->storeFeedback($request->validated());
        return redirect()->route('home');
    }

    public function getFeedbacksViaApi()
    {
        $model = new Feedback();
        return $model->getFeedbacksViaApi();
    }
}
