<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    const SUMMARY_LIMIT = 240;

    protected $table = 'news';
    protected $primaryKey = 'entid';
    protected $fillable = [
        'entid', 'title', 'summary', 'content'
    ];
    public $timestamps = false;

    public function getNewsList(int $limit = null)
    {
        $news = DB::table('news as n')
            ->select(['n.entid as id', 'n.title', 'n.summary', 'n.content', 'n.created as date', 'ea.alias'])
            ->leftJoin('entity_url_aliases as ea', 'ea.entid', '=', 'n.entid')
            ->where('n.status', '=', 1)
            ->orderByDesc('n.created');
        
        if(!is_null($limit)) {
            $news->limit($limit);
        }

        $news = $news->get();
        foreach($news as &$item) {
            if($item->summary) {
                $item->summary = mb_strlen($item->summary) > self::SUMMARY_LIMIT ? mb_substr($item->summary, 0, self::SUMMARY_LIMIT - 3) . ' ...' : $item->summary;
            } else {
                $summary = strip_tags($item->content);
                $item->summary = mb_substr($summary, 0, self::SUMMARY_LIMIT) . ' ...';
            }
        }
        return $news;
    }

    public function getArticle(int $id)
    {
        $article = self::select(['entid as id', 'title', 'summary', 'content', 'created as date'])
            ->where(['entid' => $id])->first();
        if(!$article) { return null; }
        $categories = DB::table('news_categories')
            ->select(['cat_id as id'])
            ->where(['entid' => $id])
            ->get();
            
        $array = [];
        foreach($categories as $category) {
            $array[] = $category->id;
        }
        $article->categories = implode(',', $array);
        return $article;
    }

    public function getArticleContent(int $id)
    {
        $article = DB::table('news')
            ->select(['entid as id', 'title', 'summary', 'content', 'created as date'])
            ->where('entid', '=', $id);
        
        return $article->first();
    }

    public function getArticleCategories(int $id)
    {
        $categories = DB::table('news_categories as nc')
            ->select(['nc.cat_id as id', 'c.name', 'c.human_name as title'])
            ->join('categories as c', 'nc.cat_id', '=', 'c.entid')
            ->where('nc.entid', '=', $id)
            ->orderBy('c.human_name');

        return $categories->get();
    }

    public function add(array $data)
    {
        $type = DB::table('entity_types')
            ->select('entity_type_id as id')
            ->where('name', '=', 'news')
            ->first();
        $data['entid'] = DB::table('entities')->insertGetId(['entity_type_id' => $type->id]);
        self::create([
            'entid' => $data['entid'],
            'title' => $data['title'],
            'summary' => $data['summary'],
            'content' => $data['content']
        ]);
        $data['categories'] = str_replace(' ', '', $data['categories']);
        foreach(explode(',', $data['categories']) as $cat_id) {
            DB::table('news_categories')
                ->insert([
                    'entid' => $data['entid'],
                    'cat_id' => $cat_id
                ]);
        }
    }

    public function editArticle(int $id)
    {
        $article = self::find($id);
        if(!$article) {
            return abort(404);
        }
        dd($article);
    }

    public function updateCategories(int $id, string $categories)
    {
        $categories = str_replace(' ', '', $categories);
        $categories = explode(',', $categories);
        DB::table('news_categories')
            ->where(['entid' => $id])
            ->delete();

        foreach($categories as $cat_id) {
            DB::table('news_categories')
                ->insert(['entid' => $id, 'cat_id' => $cat_id]);
        }
    }
}