<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_categories', function (Blueprint $table) {
            $table->integer('entid')
                ->unsigned();

            $table->integer('cat_id')
                ->unsigned();

            $table->foreign('entid')
                ->on('entities')
                ->references('entid')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('cat_id')
                ->on('categories')
                ->references('entid')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->primary(['entid', 'cat_id']);

            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_categories');
    }
}
