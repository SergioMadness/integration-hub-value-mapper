<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ValueMap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function up(): void
    {
        Schema::create('value_mapping_value', function (Blueprint $table) {
            $table->string('id', 32)->primary();
            $table->string('value');
        });

        Schema::create('value_mapping', function (Blueprint $table) {
            $table->string('first_id');
            $table->string('second_id');

            $table->unique(['first_id', 'second_id']);
            $table->foreign('first_id')->on('value_mapping_value')->references('id')->onDelete('cascade');
            $table->foreign('second_id')->on('value_mapping_value')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('value_mapping_values');
        Schema::drop('value_mapping');
    }
}
