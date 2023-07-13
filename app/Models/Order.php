<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [''];

    public function product()
    {
        return $this->belongsTo(Product::class,'od_product_id');
    }
}
