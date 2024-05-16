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
        Schema::create('type_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->tinyInteger('capacity')->default(1);
            $table->boolean('extra_person')->default(false);
            $table->string('thumbnail_picture');
            $table->json('pictures');
            $table->json('bed');
            $table->string('description');
            $table->json('amenities')->nullable();
            $table->tinyInteger('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_rooms');
    }
};
