<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = false;

    public function getFormattedPriceAttribute()
    {
        return number_format($this->attributes['price'],0,',',' ');
    }
}
