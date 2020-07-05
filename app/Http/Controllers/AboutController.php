<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    const FEEDBACK_FILE = 'app/public/feedbacks.json';

    public function index()
    {
        $data = [
            'title' => title('About Project'),
            'page_title' => 'About'
        ];
        
        return view('content/about', $data);
    }

    public function indexPostRequest(FeedbackRequest $request)
    {
        $this->storeFeedback($request->validated());
        return redirect()->route('home');
    }

    private function storeFeedback($data)
    {

        $file = storage_path(self::FEEDBACK_FILE);
        if(!file_exists($file)) {
            $handle = fopen($file, 'w');
            fclose($handle);
        }
        $content = file_get_contents($file);
        if($content) {
            $content = json_decode($content, true);
        } else {
            $content = [];
        }
        array_push($content, [
            'timestamp' => time(),
            'content' => $data
        ]);
        file_put_contents($file, json_encode($content));
    }
}
