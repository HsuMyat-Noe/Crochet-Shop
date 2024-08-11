<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    static public function getSigle($id)
    {
        return Color::find($id);
    }

    static public function getRecord()
    {
        return Color::select('colors.*')
                ->orderby('id', 'desc')
                ->paginate(5);
    }

    static public function getRecordActive()
    {
        return self::select('colors.*')
                ->where('status', '=', 0)
                ->orderby('id', 'desc')
                ->get();
    }
}
