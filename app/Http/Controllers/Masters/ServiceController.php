<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('masters.service.index');
    }

    public function create()
    {
        return view('masters.service.create');
    }

    public function show()
    {
        return view('masters.service.view');
    }

    public function edit()
    {
        return view('masters.service.edit');
    }
}