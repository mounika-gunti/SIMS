<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('masters.customer.index');
    }

    public function create()
    {
        return view('masters.customer.create');
    }

    public function show()
    {
        return view('masters.customer.view');
    }

    public function edit()
    {
        return view('masters.customer.edit');
    }
}