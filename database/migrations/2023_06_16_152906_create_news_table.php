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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->unsigned()->nullable()->constrained("news_categories")->cascadeOnUpdate()->nullOnDelete();
            $table->string('language',3);
            $table->text('title');
            $table->string('slug')->nullable();
            $table->string('poster_image_collection');
            $table->text('short_description');
            $table->longText('description');
            $table->string('gallery_collection')->nullable();
            $table->text('embed_video')->nullable();
            $table->string('local_video')->nullable();
            $table->enum('visibility',['0','1'])->default('1');
            $table->date('publish_date');
            $table->integer('views')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
