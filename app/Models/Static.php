<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Static_;

class Static extends Model

{
    protected $table = 'statics';
    protected $guarded = [''];
}
