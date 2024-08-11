<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function list()
    {
        $data['getRecord'] = Product::getRecord();
        $data['header_title'] = 'Product List';
        return view('admin.product.list', $data);
    }

    public function add()
    {
        $data['getCategory'] = Product::getRecord();
        $data['header_title'] = 'Add New Product';
        return view('admin.product.add', $data);
    }

    public function insert(Request $request)
    {
        $title = trim($request->title);
        $product = new Product();        
        $product->title = $title;
        $product->created_by = Auth::user()->name;

        $slug = Str::slug($title, "-");
        $checkSlug = Product::checkSlug($slug);
        if(empty($checkSlug))
        {
            $product->slug = $slug;
        }
        else
        {
            $product->slug = $slug.'-'.$product->id;
        }
        $product->save();
        return redirect('admin/product/list')->with('success', 'Product Successfully Created!');
    }

    public function edit($id)
    {
        $product = Product::getSigle($id);
        $data['getCategory'] = Category::getRecordActive();
        $data['getColor'] = Color::getRecordActive();
        $data['getSubCategory'] = Subcategory::getSubCategory($product->category_id);
        $data['getProductColor'] = ProductColor::getColor($product->id);
        $data['getProductSize'] = ProductSize::getSize($product->id);

        if(!empty($product))
        {
            $data['getRecord'] = $product;
            $data['header_title'] = 'Edit Product';
            return view('admin.product.edit', $data);
        }

    }

    public function update($id, Request $request)
    {
        // dd($request->all());
        $product = Product::getSigle($id);
        $product->title = trim($request->title);
        $product->sku = trim($request->sku);
        $product->price = trim($request->price);
        $product->old_price = trim($request->old_price);
        $product->short_description = trim($request->short_description);
        $product->description = trim($request->long_description);
        $product->additional_information = trim($request->additional_information);
        $product->shipping_return = trim($request->shipping_return);
        $product->status = trim($request->status);
        $product->created_by = Auth::user()->name;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;

        ProductColor::deleteRecord($product->id);

        if(!empty($request->product_color))
        {
            foreach($request->product_color as $color_id)
            {
                $productColor = new ProductColor();
                $productColor->color_id = $color_id;
                $productColor->product_id = $product->id;
                $productColor->save();
            }

        }

        ProductSize::deleteRecord($product->id);

        if(!empty($request->size))
        {
            foreach($request->size as $size)
            {   
                if(!empty($size['name']))
                {
                    $saveSize = new ProductSize();
                    $saveSize->name = $size['name'];
                    $saveSize->price = $size['price'];
                    $saveSize->product_id = $product->id;
                    $saveSize->save();
                }   
            }

        }

        $slug = Str::slug($request->title, "-");
        $checkSlug = Product::checkSlug($slug);
        if(empty($checkSlug))
        {
            $product->slug = $slug;
        }
        else
        {
            $product->slug = $slug.'-'.$product->id;
        }

        $product->save();
        return redirect('admin/product/list')->with('success', 'Product Successfully Updated!');
    }

    // public function delete($id)
    // {
    //     $subcategory = Subcategory::getSigle($id);
    //     $subcategory->delete();
    //     return redirect()->back()->with('success', 'Sub Category Successfully deleted!');

    // }
}
