<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class News extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb100')
            ->height(100)
            ->quality(70);

        $this->addMediaConversion('thumb340')
            ->height(350)
            ->quality(80);
    }
    public function category(): object
    {
        return $this->belongsTo(NewsCategories::class, 'category_id', 'id');
    }
    public function scopeNewsSearch($query, string $field, string $string): object
    {
        return $string ? $query->where('title', 'like', '%'.$string.'%')->orWhere($field, 'like', '%'.$string.'%') : $query;
    }
    public function incrementViewCount() {
        $this->views++;
        return $this->save();
    }
}
