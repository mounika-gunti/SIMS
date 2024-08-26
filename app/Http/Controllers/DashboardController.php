<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        return view('dashboard.index');
    }

    public function gst_tasks()
    {
        return view('dashboard.gst_tasks');
    }
}
