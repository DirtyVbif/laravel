<?php

namespace App\Http\Controllers;

use App\FeedbackModel;
use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    const FEEDBACK_FILE = 'app/public/feedbacks.json';

    public function index()
    {
        $model = new FeedbackModel();
        $data = [
            'title' => title('About Project'),
            'page_title' => 'About',
            'feedbacks' => $model->getFeedbacksList(4)
        ];
        
        return view('content/about', $data);
    }

    public function indexPostRequest(FeedbackRequest $request)
    {
        $model = new FeedbackModel();
        $model->storeFeedback($request->validated());
        return redirect()->route('home');
    }

    public function getFeedbacksViaApi()
    {
        $model = new FeedbackModel();
        return $model->getFeedbacksViaApi();
    }
}
