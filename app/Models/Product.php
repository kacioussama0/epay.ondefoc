<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Date;

class Product extends Model
{

    use SoftDeletes;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Date::createFromDate($value);
    }
}
