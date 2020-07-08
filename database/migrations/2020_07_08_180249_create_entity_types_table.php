<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_types', function (Blueprint $table) {
            $table->tinyInteger('entity_type_id')
                ->autoIncrement()
                ->unsigned();

            $table->char('name', 12)
                ->unique()
                ->comment('Entity type machine name');

            $table->char('source_table', 32)
                ->unique()
                ->comment('Name of table for entity type');

            $table->string('human_name')
                ->comment('Entity type human readable name');

            $table->string('description')
                ->nullable();

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
        Schema::dropIfExists('entity_types');
    }
}
