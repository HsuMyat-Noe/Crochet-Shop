<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Subcategory as ModelsSubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Subcategory::getRecord();
        $data['header_title'] = 'Sub Category List';
        return view('admin.subcategory.list', $data);
    }

    public function add()
    {
        $data['getCategory'] = Category::getCategory();
        $data['header_title'] = 'Add New Sub Category';
        return view('admin.subcategory.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:subcategories'
        ]);
        $subcategory = new SubCategory();
        $subcategory->name = trim($request->subcategory_name);
        $subcategory->slug = trim($request->slug);
        $subcategory->meta_title = trim($request->meta_title);
        $subcategory->meta_description = trim($request->meta_description);
        $subcategory->meta_keyword = trim($request->meta_keyword);
        $subcategory->status = trim($request->status);
        $subcategory->created_by = Auth::user()->name;
        $subcategory->category_id = $request->category_name;
        $subcategory->save();
        return redirect('admin/subcategory/list')->with('success', 'Sub Category Successfully Created!');
    }

    public function getSubcategories(Request $request)
    {
        $category_id = $request->id;
        $getSubCategory = SubCategory::getSubCategory($category_id);
        $html = '';
        $html = '<option value="">Select</option>';
        foreach($getSubCategory as $value)
        {
            $html .= '<option value="'.$value->id.'">'.$value->name.'</option>';
        }
        $json['html'] = $html;
        echo json_encode($json);
    }

    public function edit($id)
    {
        $data['getCategory'] = Category::getCategory();
        $data['getRecord'] = Subcategory::getSigle($id);
        $data['header_title'] = 'Edit Sub Category';
        return view('admin.subcategory.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:subcategories,slug,'. $id
        ]);
        $subcategory = Subcategory::getSigle($id);
        $subcategory->name = trim($request->subcategory_name);
        $subcategory->slug = trim($request->slug);
        $subcategory->meta_title = trim($request->meta_title);
        $subcategory->meta_description = trim($request->meta_description);
        $subcategory->meta_keyword = trim($request->meta_keyword);
        $subcategory->status = trim($request->status);
        $subcategory->created_by = Auth::user()->name;
        $subcategory->category_id = $request->category_name;
        $subcategory->save();
        return redirect('admin/subcategory/list')->with('success', 'Sub Category Successfully Updated!');
    }

    public function delete($id)
    {
        $subcategory = Subcategory::getSigle($id);
        $subcategory->delete();
        return redirect()->back()->with('success', 'Sub Category Successfully deleted!');

    }
}
