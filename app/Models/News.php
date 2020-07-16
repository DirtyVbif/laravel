<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
  /**
   * set symbols limit for news summary
   */
  const SUMMARY_LIMIT = 240;
  /**
   * set primary key column name for News model
   */
  protected $primaryKey = 'entid';
  /**
   * change primary key AI setting for News model
   */
  public $incrementing = false;
  /**
   * base rewrite fillable fields for News model
   */
  protected $fillable = [
    'entid', 'title', 'summary', 'content'
  ];
  /**
   * disable default laravel timestamps for News model
   */
  public $timestamps = false;
  /**
   * add relationships to News model
   */
  protected $with = [
    'categories', 'entity', 'entityUrlAliases'
  ];

  public function categories()
  {
    return $this->hasManyThrough(Category::class, NewsCategory::class, 'entid', 'entid', 'entid', 'cat_id');
  }

  public function entity()
  {
    return $this->hasOne(Entity::class, 'entid', 'entid');
  }

  public function entityUrlAliases()
  {
    return $this->hasMany(EntityUrlAlias::class, 'entid', 'entid');
  }

  public function scopeIdDescending($query)
  {
    return $query->orderBy('created', 'DESC');
  }

  public static function validateSummary(Collection $news)
  {
    foreach ($news as $item) {
      $summary = $item->summary ? $item->summary : strip_tags($item->content);
      $item->summary = strTrim($summary, self::SUMMARY_LIMIT);
    }

    return $news;
  }

  public static function all($columns = ['*'], int $limit = null)
  {
    $news = parent::all($columns)->sortByDesc('created');
    if ($limit) {
      $news = $news->take($limit);
    }
    return self::validateSummary($news);
  }

  public function updateCategories(int $news_id, string $categories)
  {
    DB::table('news_categories')
      ->where(['entid' => $news_id])
      ->delete();

    foreach ($this->categoriesToArray($categories) as $cat_id) {
      $category = new NewsCategory;
      $category->fill(['entid' => $news_id, 'cat_id' => $cat_id]);
      $category->save();
    }

    return;
  }

  public function categoriesToString()
  {
    $array = [];
    foreach ($this->categories as $item) {
      if (in_array($item->entid, $array)) {
        continue;
      }
      $array[] = $item->entid;
    }
    $this->categories = implode(',', $array);

    return $this;
  }

  public function categoriesToArray(string $categories)
  {
    $categories = str_replace(' ', '', $categories);
    return explode(',', $categories);
  }

  public static function new(array $data)
  {
    // get new entity id
    $data['entid'] = Entity::new('news');
    // create new article
    $article = new self;
    $article->fill($data);
    $article->save();
    // create categories relations for new article
    NewsCategory::new($article->categoriesToArray($data['categories']), $article->entid);
  }
}
