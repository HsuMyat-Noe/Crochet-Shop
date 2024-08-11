<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    static public function deleteRecord($product_id)
    {
        return self::where('product_id', '=', $product_id)->delete();
    }

    static public function getColor($product_id)
    {
        return self::select('product_colors.*')
                    ->where('product_id', '=', $product_id)
                    ->get();
    }
}
