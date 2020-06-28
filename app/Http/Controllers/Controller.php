<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const TITLE_MASK = 'Laravel | %s';

    public function index()
    {
        $data = [
            'title' => title('Home Page'),
            'page_title' => 'Welcome, %username%'
        ];
        
        return view('content/welcome', $data);
    }

    public function indexNews()
    {
        $data = [
            'title' => title('News Page'),
            'page_title' => 'News page',
            'news' => $this->getNewsList()
        ];
        
        return view('content/news', $data);
    }

    public function indexAbout()
    {
        $data = [
            'title' => title('About Project'),
            'page_title' => 'About'
        ];
        
        return view('content/about', $data);
    }

    private function getNewsList()
    {
        return [
            ['title' => 'Какая-то новость на сайте',
            'text' => file_get_contents('https://loripsum.net/api/1/short')],
            ['title' => 'Очень важная статья',
            'text' => file_get_contents('https://loripsum.net/api/1/short')],
            ['title' => 'Ещё что-то добавили для контента',
            'text' => file_get_contents('https://loripsum.net/api/1/short')],
            ['title' => 'Не пропустите! Сайт сделать очень легко, достаточно только...',
            'text' => file_get_contents('https://loripsum.net/api/1/short')],
        ];
    }
}
