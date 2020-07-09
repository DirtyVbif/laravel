<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeedbacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5; $i++) {
            $data = $this->loadData();
            DB::table('feedbacks')->insert($data);
        }
    }

    /**
     * Generate fake data for article
     */
    private function loadData()
    {
        $faker = Faker\Factory::create('ru_RU');

        $data = [
            'author' => $faker->sentence(mt_rand(1, 2)),
            'content' => $faker->realText(mt_rand(24, 128))
        ];

        $email = mt_rand(0, 1);
        if($email) {
            $data['email'] = strtolower(randomStr(mt_rand(6, 16), true)) . '@lorem.ipsum';
        }

        return $data;
    }
}
