<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Attribute;

class FrontendController extends Controller
{
    public function __contruct()
    {
        
    }

    public function syncAttributeGroup()
    {
        $attributes     = Attribute::get();
        $groupAttribute = [];

        foreach ($attributes as $key => $attribute) {

            $groupAttribute[$attribute->atb_name][] = $attribute->toArray();
        }
        return $groupAttribute;
    }
}
