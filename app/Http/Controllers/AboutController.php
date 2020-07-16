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
        $data = [
            'title' => title('About Project'),
            'page_title' => 'About',
            'feedbacks' => Feedback::all(['*'], 4)
        ];
        
        return view('content/about', $data);
    }

    public function indexPostRequest(FeedbackRequest $request)
    {
        $feedback = new Feedback;
        $feedback->fill($request->validated());
        $feedback->save();
        return redirect()->route('about');
    }

    public function getFeedbacksViaApi()
    {
        $model = new Feedback();
        return $model->getFeedbacksViaApi();
    }
}
