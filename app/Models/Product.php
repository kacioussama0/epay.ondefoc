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

    public function getTotalAmountAttribute()
    {
        $price = $this->attributes['sale_price'] ?  $this->attributes['sale_price'] : $this->attributes['price'] ;
        $total = ((($this->attributes['tax_rate'] ?? 0)  / 100) * $price) + $price;

        return number_format($total,2,'.','');
    }

    public function getReductionRateAttribute() {
        $result = $this->attributes['price'] - $this->attributes['sale_price'];
        $rate = ($result / $this->attributes['price']) * 100;
        return floor($rate);
    }
}
