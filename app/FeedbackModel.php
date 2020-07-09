<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FeedbackModel extends Model
{
    public function getFeedbacksViaApi()
    {
        $feedbacks = $this->getFeedbacksList();
        
        $data = [];
        foreach($feedbacks as $item) {
            $data[] = [
                'author' => $item->author,
                'email' => $item->email,
                'content' => $item->content,
                'date' => $item->date
            ];
        }
        return json_encode($data);
    }    

    public function storeFeedback($data)
    {
        DB::table('feedbacks')
            ->insert([
                'author' => $data['author'],
                'email' => $data['email'],
                'content' => $data['content']
            ]);
    }

    public function getFeedbacksList(int $limit = null, string $order = 'DESC')
    {
        $feedbacks = DB::table('feedbacks')
            ->select(['fbid as id', 'author', 'email', 'content', 'date'])
            ->orderBy('date', $order);
        
        if(!is_null($limit)) {
            $feedbacks->limit($limit);
        }

        return $feedbacks->get();
    }
}
