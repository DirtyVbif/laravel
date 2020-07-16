<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Feedback extends Model
{
  /**
   * override table name for Feedback model
   */
  protected $table = 'feedbacks';
  /**
   * base rewrite fillable fields for Feedback model
   */
  protected $fillable = [
    'author', 'email', 'content'
  ];
  /**
   * disable default laravel timestamps for Feedback model
   */
  public $timestamps = false;
  /**
   * set primary key column name for Feedback model
   */
  protected $primaryKey = 'fid';

  public function getFeedbacksViaApi()
  {
    $feedbacks = $this->getFeedbacksList();

    $data = [];
    foreach ($feedbacks as $item) {
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

    if (!is_null($limit)) {
      $feedbacks->limit($limit);
    }

    return $feedbacks->get();
  }

  public static function all($columns = ['*'], int $limit = null)
  {
    $feedbacks = parent::all($columns)->sortByDesc('date');
    if ($limit) {
      $feedbacks = $feedbacks->take($limit);
    }
    return $feedbacks;
  }
}
