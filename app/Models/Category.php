<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'entid';
    protected $fillable = [
        'entid', 'name', 'human_name'
    ];
    public $timestamps = false;

    public function getCategoriesList()
    {
        $categories = DB::table('categories as c')
            ->select(['c.entid as id', 'c.name', 'c.human_name as title', 'ea.alias'])
            ->leftJoin('entity_url_aliases as ea', 'ea.entid', '=', 'c.entid')
            ->orderBy('c.human_name');

        return $categories->get();
    }

    public function getCategoryInfo(string $name)
    {
        $category = DB::table('categories as c')
            ->select(['c.entid as id', 'c.name', 'c.human_name as title', 'ea.alias'])
            ->leftJoin('entity_url_aliases as ea', 'ea.entid', '=', 'c.entid')
            ->where('c.name', '=', $name);

        return $category->first();
    }

    public function getCategoryNewsList(int $cat_id)
    {
        $news = DB::table('news_categories as nc')
            ->select(['nc.entid as id', 'n.title', 'n.summary', 'n.content', 'n.created as date'])
            ->join('news as n', 'nc.entid', '=', 'n.entid')
            ->where([
                ['nc.cat_id', '=', $cat_id],
                ['n.status', '=', 1]
            ])->orderByDesc('n.created');

        return $news->get();
    }

    public function add(array $data)
    {
        $type = DB::table('entity_types')
            ->select('entity_type_id as id')
            ->where('name', '=', 'category')
            ->first();
            
        $data['entid'] = DB::table('entities')
            ->insertGetId(['entity_type_id' => $type->id]);
            
        return Category::create($data);
    }
}
