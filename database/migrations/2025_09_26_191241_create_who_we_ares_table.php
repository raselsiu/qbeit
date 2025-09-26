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
        Schema::create('who_we_ares', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('feature_image_right');
            $table->string('feature_image_one');
            $table->string('feature_image_two');
            $table->string('feature_one_title');
            $table->string('feature_one_desc');
            $table->string('feature_two_title');
            $table->string('feature_two_desc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('who_we_ares');
    }
};
