<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;
    static public function  getSigle($id)
    {
        return Subcategory::find($id);
    }

    static public function getRecord()
    {
        return Subcategory::select('subcategories.*', 'categories.name as category_name')
                            ->join('categories', 'categories.id', '=', 'subcategories.category_id')
                            ->orderby('id', 'desc')
                            ->paginate(5);
    }

    static public function getSubCategory($category_id)
    {
        return self::select('subcategories.*')
                ->where('status', '=', 0)
                ->where('subcategories.category_id', '=', $category_id)
                ->orderby('subcategories.name', 'asc')
                ->get();
    }

    
}
