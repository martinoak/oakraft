<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('liveries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('airline');
            $table->enum('type', \App\Enums\LiveryType::toArray())->default(\App\Enums\LiveryType::BASIC);
            $table->decimal('price', 8, 2)->nullable();
            $table->string('category')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('on_sale')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liveries');
    }
};
