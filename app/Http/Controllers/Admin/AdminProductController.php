<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestProduct;
use App\Models\Category;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\Keyword;
use App\Models\Producer;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category:id,c_name');
        if ($id = $request->id) $products->where('id', $id);
        if ($name = $request->name) $products->where('pro_name','like', '%'.$name.'%');
        if ($category = $request->category) $products->where('pro_category_id',$category);

        $products = $products->orderByDesc('id')->paginate(10);
        $categories = Category::all();
        $viewData = [
            'products'   => $products,
            'categories' => $categories,
            'query'      => $request->query()
        ];

        return view('admin.product.index', $viewData);
    }

    public function create()
    {
        $categories = Category::all();
        $attributeOld = [];
        $keywordOld   = [];

        $attributesWeight = Type::with('attributes:id,atb_name,atb_type_id')->where('id', 1)->get()->toArray();
        $attributesSize = Type::with('attributes:id,atb_name,atb_type_id')->where('id', 2)->get()->toArray();
// dd($attributesWeight[0]['attributes']);
        $keywords   = Keyword::all();
        $producers = Producer::all();
        return view('admin.product.create', compact('categories', 'attributeOld', 'attributesWeight', 'attributesSize', 'keywords', 'keywordOld', 'producers'));
    }

    public function store(AdminRequestProduct $request)
    {
        $data = $request->except('_token','pro_avatar','attribute','keywords','file');
        $data['pro_slug']     = Str::slug($request->pro_name);
        $data['created_at']   = Carbon::now();

        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if ($image['code'] == 1)
                $data['pro_avatar'] = $image['name'];
        }

        $id = Product::insertGetId($data);
        if ($id) {
            $this->syncAttribute($request->attribute, $id);
            $this->syncKeyword($request->keywords, $id);
            if ($request->file) {
                $this->syncAlbumImageAndProduct($request->file, $id);
            }
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        $attributes =  Type::with('attributes:id,atb_name,atb_type_id')->get()->toArray();
        $keywords   = Keyword::all();
        $producer = Producer::all();

        $attributeOld = \DB::table('products_attributes')
            ->where('pa_product_id', $id)
            ->pluck('pa_attribute_id')
            ->toArray();

        $keywordOld = \DB::table('products_keywords')
            ->where('pk_product_id', $id)
            ->pluck('pk_keyword_id')
            ->toArray();

        if (!$attributeOld)  $attributeOld = [];
        if (!$keywordOld)    $keywordOld = [];


        $viewData = [
            'categories'    => $categories,
            'product'       => $product,
            'attributes'    => $attributes,
            'attributeOld'  => $attributeOld,
            'keywords'      => $keywords,
            'keywordOld'    => $keywordOld,
            'producer'      => $producer,
        ];

        return view('admin.product.update', $viewData);
    }

    public function update(AdminRequestProduct $request, $id)
    {
        $product           = Product::find($id);
        $data               = $request->except('_token','pro_avatar','attribute','keywords','file');
        $data['pro_slug']     = Str::slug($request->pro_name);
        $data['updated_at'] = Carbon::now();

        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if ($image['code'] == 1)
                $data['pro_avatar'] = $image['name'];
        }

        $update = $product->update($data);

        if ($update) {
            $this->syncAttribute($request->attribute, $id);
            $this->syncKeyword($request->keywords, $id);

            if ($request->file) {
                $this->syncAlbumImageAndProduct($request->file, $id);
            }
        }

        return redirect()->back();
    }

    public function syncAlbumImageAndProduct($files, $productID)
    {
        foreach ($files as $key => $fileImage) {
            $ext = $fileImage->getClientOriginalExtension();
            $extend = [
                'png','jpg','jpeg','PNG','JPG'
            ];

            if (!in_array($ext, $extend)) return false;

            $filename = date('Y-m-d__').Str::slug($fileImage->getClientOriginalName()).'.'.$ext;
            $path = public_path().'/uploads/'.date('Y/m/d/');
            if (!\File::exists($path)){
                mkdir($path, 0777, true);
            }


            $fileImage->move($path, $filename);
            \DB::table('product_images')
            ->insert([
                'pi_name' => $fileImage->getClientOriginalName(),
                'pi_slug' => $filename,
                'pi_product_id' => $productID,
                'created_at' => Carbon::now()
            ]);
        }
    }

    public function active($id)
    {
        $product = Product::find($id);
        $product->pro_active = ! $product->pro_active;
        $product->save();

        return redirect()->back();
    }

    public function hot($id)
    {
        $product = Product::find($id);
        $product->pro_hot = ! $product->pro_hot;
        $product->save();

        return redirect()->back();
    }

    private function syncKeyword($keywords, $idProduct)
    {
        if (!empty($keywords)) {
            $datas = [];
            foreach ($keywords as $key => $keyword) {
                $datas[] = [
                    'pk_product_id' => $idProduct,
                    'pk_keyword_id' => $keyword
                ];
            }

            \DB::table('products_keywords')->where('pk_product_id', $idProduct)->delete();
            \DB::table('products_keywords')->insert($datas);
        }
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) $product->delete();

        return redirect()->back();
    }

    public function deleteImage($imageID)
    {
        \DB::table('product_images')->where('id', $imageID)->delete();
        return redirect()->back();
    }

    protected function syncAttribute($attributes , $idProduct)
    {
        if (!empty($attributes)) {
            $datas = [];
            foreach ($attributes as $key => $value) {
                $datas[] = [
                    'pa_product_id'   => $idProduct,
                    'pa_attribute_id' => $value
                ];
            }
            if (!empty($datas)) {
                \DB::table('products_attributes')->where('pa_product_id', $idProduct)->delete();
                \DB::table('products_attributes')->insert($datas);
            }
        }
    }
}
