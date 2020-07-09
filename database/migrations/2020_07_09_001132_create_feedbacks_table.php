<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->integer('fbid')
                ->autoIncrement()
                ->unsigned();

            $table->string('author');

            $table->string('email')
                ->nullable();

            $table->string('content');

            $table->datetime('date');

            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
        });

        DB::statement(
            'ALTER TABLE `feedbacks`
            CHANGE COLUMN `date`
                `date` DATETIME NOT NULL
                DEFAULT CURRENT_TIMESTAMP
                AFTER `content`'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}
