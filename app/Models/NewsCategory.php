<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
  /**
   * set primary key column name for NewsCategory model
   */
  protected $primaryKey = ['entid', 'cat_id'];
  /**
   * base rewrite fillable fields for NewsCategory model
   */
  protected $fillable = [
    'entid', 'cat_id'
  ];
  /**
   * disable default laravel timestamps for NewsCategory model
   */
  public $timestamps = false;
  /**
   * change primary key AI setting for NewsCategory model
   */
  public $incrementing = false;
  /**
   * add relationships to NewsCategory model
   */
  protected $with = [
    'category'
  ];


  public function category()
  {
    return $this->hasOne(Category::class, 'entid', 'cat_id');
  }


  public function news()
  {
    return $this->belongsTo(News::class, 'entid', 'entid');
  }

  public static function new(array $categories, int $entid)
  {
    foreach ($categories as $cat_id) {
      $category = new self;
      $category->fill(['entid' => $entid, 'cat_id' => $cat_id]);
      $category->save();
    }
  }
}
