<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntityTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = "INSERT INTO `entity_types`
            (`entity_type_id`, `name`, `source_table`, `human_name`)
            VALUES
            (1, ?, ?, ?),
            (2, ?, ?, ?),
            (3, ?, ?, ?);";

        $bindings = [
            'news', 'news', 'Новостные материалы',
            'category', 'categories', 'Категории новостей',
            'rss', 'rss_source', 'RSS-ленты новостей'
        ];
        
        DB::insert($query, $bindings);
    }
}
