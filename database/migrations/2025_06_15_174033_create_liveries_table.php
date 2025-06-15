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
            $table->text('description');
            $table->string('image_path')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('category')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('for_sale')->default(true);
            $table->string('tags')->nullable(); // JSON string for searchable tags
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
