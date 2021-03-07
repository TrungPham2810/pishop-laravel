<?php

namespace App\Http\Controllers\Adminhtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;
use App\Product;
use App\ProductMediaGallery;
class ProductController extends Controller
{
    public function addBrandProduct()
    {
        $data = DB::table('categories')->get()->toArray();
        return view('admin.product.add', compact('data'));
    }

    public function listBrandProduct()
    {
        $data = DB::table('products')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->select('categories.name as category_name', 'products.*')
            ->get()->toArray();
        return view('admin.product.list', compact('data'));
    }

    public function saveBrandProduct(Request $request)
    {
        $this->validate($request,
            [
                'product_name' => 'required',
                'category_id' => 'required',
                'price' => 'required',
//                'fImages'  =>  'required|mimes:jpeg,png,jpg,gif|max:2048'
            ],
            [
                'product_name.required' => "Please Enter Name Brand",
                'price.required' => "Please Enter Price",
                'category_id.required' => "Please Choose Category",
            ]

        );

        if( $request->hasFile('fImages')) {
            $imageName = $request->file('fImages')->getClientOriginalName();
            $data = [];
            $request->file('fImages')->move('resources/upload/product/images/', $imageName);
            $data['name'] = $request->product_name;
            $data['description'] = $request->description;
            $data['price'] = $request->price;
            $data['image_path'] = $imageName;
            $data['category_id'] = $request->category_id;
            $data['qty'] = $request->qty;
//            DB::table('products')->insert($data);

            $product = new Product();
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->price = $data['price'];
            $product->image_path = $data['image_path'];
            $product->category_id = $data['category_id'];
            $product->save();
            if($request->hasFile('image_gallery')) {
                $gallerys = $request->file('image_gallery');
                foreach ($gallerys as $image) {
                    $imgName = $image->getClientOriginalName();
                    $image->move('resources/upload/product/gallery/', $imgName);
                    $proGallery = new ProductMediaGallery();
                    $proGallery->product_id = $product->id;
                    $proGallery->value = $imgName;
                    $proGallery->save();
                }
            }
            Session::put('message', 'Add Brand Product success :)');
        } else {
            Session::put('message', 'Add Brand Product False :)');
        }
        return redirect()->route('admin.list.brand.product');
    }

    public function deleteBrandProduct($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('admin.list.brand.product');
    }

    public function editBrandProduct($id)
    {
        $dataParent = DB::table('categories')->get()->toArray();
        $data = DB::table('products')->where('id', $id)->first();
        $listImgGallery = DB::table('product_media_gallery')->where('product_id', $id)->get()->toArray();
        return view('admin.product.edit', compact(['data','dataParent', 'listImgGallery']));
    }
    public function disableBrandProduct($id)
    {
        DB::table('products')->where('id', $id)->update(['brand_status'=>0]);
        Session::put('message', 'Disable Brand Product success');
        return redirect()->route('admin.list.brand.product');
    }
    public function enableBrandProduct($id)
    {
        DB::table('products')->where('id', $id)->update(['brand_status'=>1]);
        Session::put('message', 'Enable Brand Product success');
        return redirect()->route('admin.list.brand.product');
    }

    public function deleteGallery($gallery)
    {
        if(is_array($gallery)) {
            $ids = [];
            $mediaUrl = 'resources/upload/product/gallery/';
            foreach ($gallery as $key=>$value) {
                $ids[] = $key;
            }
            try {
                $listGallery = DB::table('product_media_gallery')->whereIn('id', $ids)->get()->toArray();
                DB::table('product_media_gallery')->whereIn('id', $ids)->delete();
                foreach ($listGallery as $item) {
                    $imagePath = $mediaUrl.$item->value;
                    if(file_exists($imagePath)) {
                        @unlink($imagePath);
                    }
                }
            }catch (\Exception $exception) {
                return back()->withErrors($exception->getMessage());
            }
        }

    }
    public function postEditBrandProduct(Request $request,$id)
    {
        $data = [];
        $deleteGallery = $request->delete_image;
        $this->deleteGallery($deleteGallery);
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['category_id'] = $request->category_id;
        $data['price'] = $request->price;
        $data['qty'] = $request->qty;
        if($request->hasFile('more_image_gallery')) {
            $gallerys = $request->file('more_image_gallery');
            foreach ($gallerys as $image) {
                $imgName = $image->getClientOriginalName();
                $image->move('resources/upload/product/gallery/', $imgName);
                $proGallery = new ProductMediaGallery();
                $proGallery->product_id = $id;
                $proGallery->value = $imgName;
                $proGallery->save();
            }
        }
        if( $request->hasFile('fImages')) {
            $imageName = $request->file('fImages')->getClientOriginalName();
            $request->file('fImages')->move('resources/upload/product/images/', $imageName);
            $data['image_path'] = $imageName;
        }
        DB::table('products')->where('id', $id)->update($data);
        Session::put('message', 'Edit Product success :)');

        return redirect()->route('admin.list.brand.product');
    }
}
