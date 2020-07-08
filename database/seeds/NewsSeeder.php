<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    public function getData()
    {
        $faker = Faker\Factory::create('ru_RU');
        $data = [];
        for ($i=0; $i < 10; $i++) { 
            $data[] = [
                'title' => $faker->sentence(mt_rand(3, 10)),
                'body' => $faker->realText(mt_rand(128, 1024))
            ];
        }
        return $data;
    }
}
