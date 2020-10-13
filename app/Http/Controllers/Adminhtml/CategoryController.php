<?php

namespace App\Http\Controllers\Adminhtml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class CategoryController extends Controller
{
    public function addCategory()
    {
        $data = DB::table('categories')->get()->toArray();
        return view('admin.category.add', compact('data'));
    }

    public function listCaterogy()
    {
        $data = DB::table('categories as t1')
            ->leftJoin('categories as t2', 't2.id', '=', 't1.parent')
            ->select('t2.name as parent_name', 't1.*')
            ->get()->toArray();
        return view('admin.category.list', compact('data'));
    }

    public function saveCaterogy(Request $request)
    {
        $this->validate($request,
            [
                'category_name' => 'required',
                'status_category' => 'required',
            ],
            [
                'name.required' => "Please Enter Name Category",
                'status.required' => "Please Choose Status",
            ]

        );
        $data = [];
        $data['name'] = $request->input('category_name');
        $data['description'] = $request->input('category_description');
        $data['status'] = $request->input('status_category');
        $data['parent'] = $request->input('parent');
        DB::table('categories')->insert($data);
        Session::put('message', 'Add Category success :)');
        return redirect()->route('admin.list.category');
    }

    public function deleteCaterogy($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('admin.list.category');
    }

    public function editCaterogy($id)
    {
        $dataParent = DB::table('categories')->get()->toArray();
        $data = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit', compact(['data', 'dataParent']));
    }
    public function disableCaterogy($id)
    {
        DB::table('categories')->where('id', $id)->update(['status'=>0]);
        Session::put('message', 'Disable category success');
        return redirect()->route('admin.list.category');
    }
    public function enableCaterogy($id)
    {
        DB::table('categories')->where('id', $id)->update(['status'=>1]);
        Session::put('message', 'Enable category success');
        return redirect()->route('admin.list.category');
    }

    public function postEditCaterogy(Request $request,$id)
    {
        $data = [];
        $data['name'] = $request->input('category_name');
        $data['description'] = $request->input('category_description');
        $data['status'] = $request->input('status_category');
        $data['parent'] = $request->input('parent');
        DB::table('categories')->where('id', $id)->update($data);
        Session::put('message', 'Edit category success');
        return redirect()->route('admin.list.category');
    }
}
