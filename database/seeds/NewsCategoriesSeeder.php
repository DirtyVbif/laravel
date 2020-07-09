<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news_id_list = $this->getNewsIdList();
        $cat_id_list = $this->getCategoriesIdList();        
        if(empty($news_id_list) || empty($cat_id_list)) { return; }
        $count = count($cat_id_list) - 1;
        
        foreach($news_id_list as $news) {
            // generate list of random categories for current news
            $n = [];
            for ($i=0; $i <= mt_rand(0, $count); $i++) { 
                do {
                    $x = mt_rand(0, $count);
                } while(in_array($x, $n));
                $n[] = $x;
            }
            // store each category for current news
            foreach($n as $ni) {
                $cat_id = $cat_id_list[$ni]->id;
                DB::table('news_categories')->insert([
                    'entid' => $news->id,
                    'cat_id' => $cat_id
                ]);
            }
        }
    }

    private function getNewsIdList()
    {
        return DB::table('news as n')
            ->leftJoin('news_categories as nc', 'nc.entid', '=', 'n.entid')
            ->select(['n.entid as id'])
            ->whereNull('nc.entid')
            ->get();
    }

    private function getCategoriesIdList()
    {
        return DB::table('categories')->select(['entid as id'])->get();
    }
}
