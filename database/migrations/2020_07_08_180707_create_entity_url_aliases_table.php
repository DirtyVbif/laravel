<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityUrlAliasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_url_aliases', function (Blueprint $table) {
            $table->integer('entid')
                ->primary()
                ->unsigned();

            $table->char('alias', 120)
                ->unique();

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
        Schema::dropIfExists('entity_url_aliases');
    }
}
