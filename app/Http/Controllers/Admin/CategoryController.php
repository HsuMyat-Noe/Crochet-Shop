<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
use Validator;

class CategoryController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Category::getCategory();
        $data['header_title'] = 'Category List';
        return view('admin.category.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Category';
        return view('admin.category.add', $data);
    }

    public function insert(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:categories'
        ]);
        $category = new Category();
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keyword = trim($request->meta_keyword);
        $category->status = trim($request->status);
        $category->created_by = Auth::user()->name;
        $category->save();
        return redirect('admin/category/list')->with('success', 'Category Successfully Created!');
    }

    public function edit($id)
    {
        $data['getRecord'] = Category::getSigle($id);
        $data['header_title'] = 'Edit Category';
        return view('admin.category.edit', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:categories,slug,'. $id
        ]);
        $category = Category::getSigle($id);
        $category->name = trim($request->name);
        $category->slug = trim($request->slug);
        $category->meta_title = trim($request->meta_title);
        $category->meta_description = trim($request->meta_description);
        $category->meta_keyword = trim($request->meta_keyword);
        $category->status = trim($request->status);
        $category->created_by = Auth::user()->name;
        $category->save();
        return redirect('admin/category/list')->with('success', 'Category Successfully Updated!');
    }

    public function delete($id)
    {
        $category = Category::getSigle($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category Successfully deleted!');

    }
}
