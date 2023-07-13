<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [''];

    public function menu()
    {
        return $this->belongsTo(Menu::class,'a_menu_id');
    }
}
