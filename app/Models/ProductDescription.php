<?php

namespace App\Models;

use App\Scopes\HasLanguageScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ProductDescription extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'language', 'product_short_description', 'product_description'];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new HasLanguageScope());
    }
//
//    protected static function booted()
//    {
//        static::addGlobalScope(new HasLanguageScope());
//    }
}
