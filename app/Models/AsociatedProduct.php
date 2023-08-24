<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsociatedProduct extends Model
{
    use HasFactory;

    public function relatedTo()
    {
        return $this->belongsTo(Product::class, 'related_id', 'id')->with('media');
    }
}
