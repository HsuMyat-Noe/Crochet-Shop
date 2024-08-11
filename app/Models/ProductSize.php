<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    static public function deleteRecord($product_id)
    {
        return self::where('product_id', '=', $product_id)->delete();
    }

    static public function getSize($product_id)
    {
        return self::select('product_sizes.*')
                    ->where('product_id', '=', $product_id)
                    ->get();
    }

}
