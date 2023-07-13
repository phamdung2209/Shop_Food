<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [''];

    const STATUS_ACTIVE = 1;
    const STATUS_HIDE = 0;

    public function products()
    {
        return $this->hasMany(Product::class,'pro_category_id');
    }

    public function children()
    {
        return $this->hasMany(self::class,'c_parent_id','id');
    }

    public static function recursive($categories ,$parents = 0 ,$level = 1 ,&$listCategoriesSort)
    {
        if(count($categories) > 0 )
        {
            foreach ($categories as $key => $value) {
                if($value->c_parent_id  == $parents)
                {
                    $value->level = $level;
                    $listCategoriesSort[] = $value;
                    unset($categories[$key]);
                    $parent = $value->id;

                    self::recursive($categories , $parent ,$level + 1 , $listCategoriesSort);
                }
            }
        }
    }
}
