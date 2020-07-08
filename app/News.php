<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    public function getAll()
    {
        $data = DB::table('news')->select(['id', 'title', 'body']);
        return $data->get(['id']);
    }
}
