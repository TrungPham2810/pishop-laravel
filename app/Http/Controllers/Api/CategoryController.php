<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index() {
        return Category::all();
    }

    public function show($id) {
        return Category::find($id);
    }

    public function store(Request $request) {
        return Category::create($request->all());
    }

    public function update (Request $request, $id) {
        $product = Category::find($id);
        $product->update($request->all());
        return $product;
    }

    public function delete(Request $request, $id) {
        $product = Category::find($id);
        $product->delete();
        return 204;
    }
}
