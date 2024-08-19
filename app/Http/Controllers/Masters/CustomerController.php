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
        return view('parties.customer.index');
    }

    public function create()
    {
        return view('parties.customer.create');
    }

    public function show()
    {
    }

    public function edit()
    {
        return view('parties.customer.edit');
    }
}