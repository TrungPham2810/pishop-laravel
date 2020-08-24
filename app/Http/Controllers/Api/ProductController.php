<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    const DEFAULT_SIZER = 9;
    public function index() {
        return Product::all();
    }

    public function filter($filter) {
        if($filter) {
            $param = [];
            $filter = explode('&', $filter);
            foreach ($filter as $value) {
                $value = explode('=', $value);
                if(count($value) == 2) {
                    $param[$value[0]] = $value[1];
                }
            }
            $products =  DB::table('products');
            if(isset($param['category_id'])) {
                $products->where('category_id', $param['category_id']);
            }
            if(isset($param['sort'])) {
                $products->orderBy($param['sort'],'ASC');
            }
            if(isset($param['price'])) {
                $price = explode('-' ,$param['price']);
                if(count($price) == 2) {
                    $products->whereBetween('price', [intval($price[0]), intval($price[1])]);
                }
            }

            if(isset($param['limit']) && is_numeric($param['limit'])) {
                $products->limit($param['limit']);
            } else {
                $products->limit(self::DEFAULT_SIZER);
            }
            return $products->get();
        }
        return Product::all();
    }

    public function show($id) {
        return Product::find($id);
    }

    public function store(Request $request) {
        return Product::create($request->all());
    }

    public function update (Request $request, $id) {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    public function delete(Request $request, $id) {
        $product = Product::find($id);
        $product->delete();
        return 204;
    }
}
