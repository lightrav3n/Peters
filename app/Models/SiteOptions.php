<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteOptions extends Model
{
    use HasFactory;
    protected $fillable = ['option_name', 'option_value', 'option_display'];
}
