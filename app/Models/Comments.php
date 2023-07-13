<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class,'cmt_user_id','id');
    }

    public function reply()
    {
        return $this->hasMany(Comments::class,'cmt_parent_id','id');
    }
}