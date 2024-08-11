<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    static public function checkSlug($slug)
    {
        return self::where('slug', '=', $slug)->count();
    }

    static public function  getSigle($id)
    {
        return self::find($id);
    }

    static public function getRecord()
    {
        return self::select('products.*')
                            ->orderby('id', 'desc')
                            ->paginate(5);
    }



}
