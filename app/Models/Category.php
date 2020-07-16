<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
  /**
   * base rewrite fillable fields for Category model
   */
  protected $fillable = [
    'entid', 'name', 'human_name'
  ];
  /**
   * disable default laravel timestamps for Category model
   */
  public $timestamps = false;
  /**
   * set primary key column name for Category model
   */
  protected $primaryKey = 'name';
  /**
   * change primary key AI setting for Category model
   */
  public $incrementing = false;
  /**
   * change primary key type for Category model
   */
  protected $keyType = 'string';
  /**
   * add relationships to Category model
   */
  protected $with = [
    'entityUrlAliases', 'entity'
  ];

  public function entityUrlAliases()
  {
    return $this->hasMany(EntityUrlAlias::class, 'entid', 'entid');
  }

  public function entity()
  {
    return $this->hasOne(Entity::class, 'entid', 'entid');
  }

  public function news()
  {
    $news = $this->belongsToMany(News::class, 'news_categories', 'cat_id', 'entid', 'entid', 'entid')
      ->getBaseQuery()
      ->orderByDesc('created')
      ->get();

    return News::validateSummary($news);
  }

  public static function new(array $data)
  {
    $data['entid'] = Entity::new('category');
    $category = new self;
    $category->fill($data);
    $category->save();
  }
}
