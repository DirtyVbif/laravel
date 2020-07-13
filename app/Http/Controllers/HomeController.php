<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Feedback;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $Feedbacks = new Feedback();
        $News = new News();
        $data = [
            'title' => title('Home Page'),
            'page_title' => 'Welcome, %username%',
            'news' => $News->getNewsList(4),
            'feedbacks' => $Feedbacks->getFeedbacksList(4)
        ];
        
        return view('content/welcome', $data);
    }
}
