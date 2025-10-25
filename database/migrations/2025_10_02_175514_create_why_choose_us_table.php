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
        Schema::create('why_choose_us', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('desc');
            $table->string('category');
            $table->string('feature_1_title');
            $table->text('feature_1_desc');
            $table->string('feature_1_img');
            $table->string('feature_2_title');
            $table->text('feature_2_desc');
            $table->string('feature_2_img');
            $table->string('feature_3_title');
            $table->text('feature_3_desc');
            $table->string('feature_3_img');
            $table->string('section_img_1');
            $table->string('section_img_2');
            $table->string('section_img_3');
            $table->string('section_img_4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_us');
    }
};
