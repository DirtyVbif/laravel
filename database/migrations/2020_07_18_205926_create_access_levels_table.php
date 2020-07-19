<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAccessLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_levels', function (Blueprint $table) {
            $table->tinyInteger('alid', true, true)
                ->primaryKey()
                ->comment('Access level id');

            $table->char('parameters', 50)
                ->unique()
                ->comment('Access level statuses');

            $table->string('description', 255)
                ->unique();
        });

        DB::table('access_levels')
            ->insert([
                ['alid' => 1, 'parameters' => 'anonymous', 'description' => 'Only for anonymous users'],
                ['alid' => 2, 'parameters' => 'anonymous,user,moderator,admin', 'description' => 'All users'],
                ['alid' => 3, 'parameters' => 'user,moderator,admin', 'description' => 'Only for registered users'],
                ['alid' => 4, 'parameters' => 'moderator,admin', 'description' => 'For moderators and admins only'],
                ['alid' => 5, 'parameters' => 'admin', 'description' => 'Only for admins'],
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('access_levels');
    }
}
