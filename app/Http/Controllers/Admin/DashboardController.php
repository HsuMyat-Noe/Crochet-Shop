<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin_dashboard()
    {
        $data['header_title'] = 'Dashboard';
        return view('admin.dashboard', $data);
    }
}
