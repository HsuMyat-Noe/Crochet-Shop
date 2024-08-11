<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    static public function getSigle($id)
    {
        return Category::find($id);
    }

    static public function getCategory()
    {
        return Category::select('categories.*')
                ->orderby('id', 'desc')
                ->paginate(5);
    }

    static public function getRecordActive()
    {
        return self::select('categories.*')
                ->where('status', '=', 0)
                ->orderby('id', 'desc')
                ->get();
    }
}
