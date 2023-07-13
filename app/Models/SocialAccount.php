<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
