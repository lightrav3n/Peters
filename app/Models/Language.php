<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public function descriptions(){
        return $this->belongsTo(ProductDescription::class, 'name', 'language');
    }

    public function privacyPolicy()
    {
        return$this->belongsTo(PageContent::class, 'name', 'language');
    }
}
