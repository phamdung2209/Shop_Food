<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Attribute extends Model
{
    protected $table = 'attributes';
    protected $guarded = ['atb_name', 'atb_slug', 'atb_type_id', 'created_at', 'updated_at'];

    protected $type = [
        1 => [
            'name' => "Loại",
            'class' => 'label label-info'
        ],
        2 => [
            'name' => 'Kiểu',
            'class' => 'label label-default'
        ],
    ];

    public function getType()
    {
        return Arr::get($this->type, $this->atb_type,"[N\A]");
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'atb_category_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'atb_type_id');
    }
}
