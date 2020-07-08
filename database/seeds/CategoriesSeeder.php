<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * default entity type id from `entity_types` table
     */
    const TYPEID = 2;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'cats', 'human_name' => 'Котики'],
            ['name' => 'dogs', 'human_name' => 'Собаки'],
            ['name' => 'humor', 'human_name' => 'Юмор'],
            ['name' => 'nsfw', 'human_name' => 'Клубничка'],
            ['name' => 'comics', 'human_name' => 'Комиксы']
        ];

        foreach($categories as $category) {
            $category['entid'] = DB::table('entities')->insertGetId(['entity_type_id' => self::TYPEID]);
            DB::table('categories')->insert($category);
        }
    }
}
