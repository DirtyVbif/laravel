<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NewsModel extends Model
{
    const SUMMARY_LIMIT = 240;

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

    public function getArticleContent(int $id)
    {
        $article = DB::table('news')
            ->select(['title', 'summary', 'content', 'created as date'])
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

    public function createArticle(array $data)
    {
        $type = DB::table('entity_types')->select('entity_type_id as id')->where('name', '=', 'news')->first();
        $id = DB::table('entities')->insertGetId(['entity_type_id' => $type->id]);

        DB::table('news')
            ->insert([
                'entid' => $id,
                'title' => $data['title'],
                'summary' => $data['summary'],
                'content' => $data['content']
            ]);

        DB::table('news_categories')
            ->insert([
                'entid' => $id,
                'cat_id' => $data['category']
            ]);
    }
}