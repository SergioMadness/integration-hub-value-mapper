<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @throws Exception
     */
    public function up(): void
    {
        Schema::create('value_mapping_value', static function (Blueprint $table): void {
            $table->string('id', 32)->primary();
            $table->string('value');
        });

        Schema::create('value_mapping', static function (Blueprint $table): void {
            $table->uuid('owner_id');
            $table->string('first_id');
            $table->string('second_id');
            $table->string('namespace');

            $table->unique(['owner_id', 'namespace', 'first_id', 'second_id']);
            $table->foreign('first_id')->on('value_mapping_value')->references('id')->onDelete('cascade');
            $table->foreign('second_id')->on('value_mapping_value')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('value_mapping');
        Schema::drop('value_mapping_value');
    }
};
