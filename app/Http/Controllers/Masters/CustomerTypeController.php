<?php

namespace App\Http\Controllers\Masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerTypeRequest;
use App\Models\CustomerType;

class CustomerTypeController extends Controller
{
    public function index(){
        $customers = CustomerType::all();
        return view('masters.customer_type.index',compact('customers'));
    }

    public function create()
    {
        return view('masters.customer_type.create');
    }

    public function store(CustomerTypeRequest  $request){

        $request->validated();

        $customers= CustomerType::create($request->all());

        return redirect()->route('customer_type.index')->with('status','Cutomer Type Added Succeccfully');

    }
    public function update(CustomerTypeRequest  $request, $id){
        $request->validated();

        $customer = CustomerType::findOrFail($id);
        $customer->update($request->all());

        return redirect()->route('customer_type.index')->with('status','Customer Type Updated Successfully');
    }

    public function edit($id){
        $customer = CustomerType::findOrFail($id);
        return view('masters.customer_type.edit',compact('customer'));
    }

    public function destroy($id){
        $customer=CustomerType::find($id);
        $customer->delete();

        return redirect()->route('customer_type.index')->with('status','Customer Type Deleted Successfully');

    }

}