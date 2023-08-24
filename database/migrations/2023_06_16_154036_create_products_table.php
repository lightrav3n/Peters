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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->unsigned()->nullable()->constrained("product_categories")->cascadeOnUpdate()->nullOnDelete();
            $table->string('product_name');
            $table->string('product_slug');
            $table->decimal('product_price',8,2)->nullable();
            $table->decimal('product_old_price',8,2)->nullable();
            $table->string('badge')->nullable();
            $table->string('collection_name')->nullable();
            $table->text('embed_video')->nullable();
            $table->string('local_video')->nullable();
            $table->enum('display_home',['0','1'])->default(0);
            $table->enum('visibility',['0','1'])->default('1');
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
