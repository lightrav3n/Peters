<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigOrder extends Model
{
    use HasFactory;

    public function product(){
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
