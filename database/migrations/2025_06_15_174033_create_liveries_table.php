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
            $table->string('aircraft');
            $table->string('airline');
            $table->string('IATA');
            $table->enum('type', \App\Enums\LiveryType::toArray())->default(\App\Enums\LiveryType::BASIC);
            $table->string('path');
            $table->decimal('price_jpg')->nullable();
            $table->decimal('price_png')->nullable();
            $table->string('category')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('on_sale')->default(true);
            $table->decimal('discount_jpg')->nullable();
            $table->decimal('discount_png')->nullable();
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
