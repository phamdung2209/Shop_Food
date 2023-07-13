<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
class Rating extends Model
{
    protected $guarded = [''];

    public function product()
    {
        return $this->belongsTo(Product::class,'r_product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'r_user_id');
    }
}