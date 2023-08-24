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
        Schema::create('product_lps', function (Blueprint $table) {
            $table->id();
            $table->string('language', 3);
            $table->string('title');
            $table->longText('text');
            $table->string('aos_text')->nullable();
            $table->string('collection_name');
            $table->string('collection_slide')->nullable();
            $table->string('aos_slide_from')->nullable();
            $table->string('link1');
            $table->string('link1_text');
            $table->string('link2');
            $table->string('link2_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_lps');
    }
};
