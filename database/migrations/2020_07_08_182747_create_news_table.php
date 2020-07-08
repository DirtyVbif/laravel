<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->integer('entid')
                ->primary()
                ->unsigned();

            $table->string('title');

            $table->string('summary')
                ->nullable();

            $table->text('content');

            $table->tinyInteger('status')
                ->unsigned()
                ->default(1)
                ->index();
            
            $table->dateTime('created');
            $table->dateTime('updated');

            $table->foreign('entid')
                ->on('entities')
                ->references('entid')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
        });

        DB::statement(
            'ALTER TABLE `news`
            CHANGE COLUMN `created`
                `created` DATETIME NOT NULL
                DEFAULT CURRENT_TIMESTAMP
                AFTER `status`,
            CHANGE COLUMN `updated`
                `updated` DATETIME NOT NULL
                DEFAULT CURRENT_TIMESTAMP
                ON UPDATE CURRENT_TIMESTAMP
                AFTER `created`'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
