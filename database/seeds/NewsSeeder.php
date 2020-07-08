<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * default entity type id from `entity_types` table
     */
    const TYPEID = 1;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) {
            $data = $this->loadData();
            $data['entid'] = DB::table('entities')->insertGetId(['entity_type_id' => self::TYPEID]);
            DB::table('news')->insert($data);
        }
    }

    /**
     * Generate fake data for article
     */
    private function loadData()
    {
        $faker = Faker\Factory::create('ru_RU');

        $content = '';
        $n = mt_rand(3, 5);

        for ($i=0; $i < $n; $i++) { 
            $content .= '<p>' . $faker->realText(mt_rand(150, 350)) . '</p>';
        }

        return [
            'title' => $faker->sentence(mt_rand(3, 9)),
            'summary' => $faker->realText(mt_rand(190, 240)),
            'content' => $content
        ];
    }
}
