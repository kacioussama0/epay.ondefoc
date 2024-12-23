<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class Order extends Model
{
    protected $guarded = ['id'];

    public function product() {
        return $this->belongsTo(Product::class,'product_id');
    }


    public function getStatusAttribute($value)
    {
        return match ($value) {
            'Pending' => '<span class="badge text-bg-warning fw-bold">قيد الانتظار</span>',
            'Paid' => '<span class="badge text-bg-success fw-bold">مدفوع</span>',
            default => '<span class="badge text-bg-danger fw-bold">ملغي</span>',
        };
    }

    public function getIdAttribute($value)
    {
        return "#$value";
    }


    public function getCreatedAtAttribute($value)
    {
        return Date::createFromDate($value);
    }
}
