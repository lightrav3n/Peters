<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public function category(): object
    {
        return $this->belongsTo(ProductCategories::class, 'category_id', 'id');
    }

    public function descriptions(): object
    {
        return $this->hasMany(ProductDescription::class, 'product_id');
    }

    public function relatedProducts()
    {
        return $this->belongsToMany(Product::class, 'asociated_products', 'product_id', 'related_id');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->quality(60);
        $this->addMediaConversion('thumb-shop')
            ->width(263)
            ->quality(80);
        $this->addMediaConversion('thumb-medium')
            ->width(600)
            ->quality(99);
        $this->addMediaConversion('large')
            ->height(1280)
            ->quality(99);
    }
    public function incrementViewCount() {
        $this->views++;
        return $this->save();
    }
    public function scopeProductSearch($query, string $field, string $string): object
    {
        return $string ? $query->where($field, 'like', '%'.$string.'%') : $query;
    }
}
