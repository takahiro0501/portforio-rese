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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->integer('area_id');
            $table->integer('genre_id');
            $table->string('title', 20);
            $table->string('tel', 10);
            $table->string('text', 300);
            $table->string('img', 100);
            $table->time('start_time');
            $table->time('end_time');
            $table->string('post_code', 10);
            $table->string('address', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
