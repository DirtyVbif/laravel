<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRssSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rss_sources', function (Blueprint $table) {
            $table->integer('entid')
                ->primary()
                ->unsigned();

            $table->string('url')
                ->comment('Source link');

            $table->string('description')
                ->nullable()
                ->comment('Short description for source');

            $table->foreign('entid')
                ->on('entities')
                ->references('entid')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('rss_sources');
    }
}
