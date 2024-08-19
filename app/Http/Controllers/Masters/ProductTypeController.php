<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\ProductTypeRequest;
class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $products= ProductType::all();
        return view('masters.product_type.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masters.product_type.create');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductTypeRequest $request){

        $request->validated();

        $product= ProductType::create($request->all());

        return redirect()->route('product_type.index')->with('status','Product Type Added Succeccfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $product = ProductType::findOrFail($id);
        return view('masters.product_type.edit',compact('product'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductTypeRequest $request, $id){

        $request->validated();

        $product = ProductType::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('product_type.index')->with('status','Product Type Updated Successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $product = ProductType::findOrFail($id);
        $product->deleted_at = Carbon::now();
        $product->save();

        return redirect()->route('product_type.index')->with('status','Product Type Deleted Successfully');
    }
}