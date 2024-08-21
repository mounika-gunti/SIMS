<?php

namespace App\Http\Controllers\Masters;

use App\Http\Requests\CustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Customer;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Carbon\Carbon;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers=Customer::with('country','state','city')->get();


        return view('masters.customer.index',compact('customers'));
    }

    public function create()
    {
        $customers=Customer::with('country','state','city')->get();
        $countries=Country::all();
        $states=State::all();
        $cities=City::all();

        return view('masters.customer.create',compact('customers','countries','states','cities'));
    }

    // public function store(CustomerRequest $request){

    //     $request->validated();


    //     $customers = new Customer();
    //     $customers->country_id = $request->billing_country_id;
    //     $customers->state_id = $request->billing_state_id;
    //     $customers->city_id = $request->billing_city_id;

    //     $customers->name = $request->name;
    //     $customers->email = $request->email;
    //     $customers->phone_number = $request->phone_number;
    //     $customers->payment_terms = $request->payment_terms;
    //     $customers->credit_days = $request->credit_days;
    //     $customers->description = $request->description;
    //     $customers->billing_address = $request->billing_address;
    //     // $customers->shipping_address = $request->shipping_address;
    //     $customers->gst_number = $request->gst_number;
    //     // $customers->assigned_to = $request->assigned_to;

    //     $customers->save();



    //     return redirect()->route('customer.index')->with('status', 'Customer Added Successfully');
    // }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:15',
            'payment_terms' => 'nullable|string|max:255',
            'credit_days' => 'nullable|integer',
            'description' => 'nullable|string',
            'billing_country_id' => 'required|exists:countries,id',
            'billing_state_id' => 'required|exists:states,id',
            'billing_city_id' => 'required|exists:cities,id',
            'billing_address' => 'required|string|max:255',
            'gst_number' => 'required|string|max:15',
            'services' => 'nullable|array',
            'shipping_country_id' => 'nullable|exists:countries,id',
            'shipping_state_id' => 'nullable|exists:states,id',
            'shipping_city_id' => 'nullable|exists:cities,id',
            'shipping_address' => 'nullable|string|max:255',
        ]);

        $customer = new Customer();
        $customer->name = $validatedData['name'];
        $customer->email = $validatedData['email'];
        $customer->phone_number = $validatedData['phone_number'];
        $customer->payment_terms = $validatedData['payment_terms'];
        $customer->credit_days = $validatedData['credit_days'];
        $customer->description = $validatedData['description'];
        $customer->billing_country_id = $validatedData['billing_country_id'];
        $customer->billing_state_id = $validatedData['billing_state_id'];
        $customer->billing_city_id = $validatedData['billing_city_id'];
        $customer->billing_address = $validatedData['billing_address'];
        $customer->gst_number = $validatedData['gst_number'];

        if ($request->has('same_as_billing')) {
            $customer->shipping_country_id = $customer->billing_country_id;
            $customer->shipping_state_id = $customer->billing_state_id;
            $customer->shipping_city_id = $customer->billing_city_id;
            $customer->shipping_address = $customer->billing_address;
        } else {
            $customer->shipping_country_id = $validatedData['shipping_country_id'] ?? null;
            $customer->shipping_state_id = $validatedData['shipping_state_id'] ?? null;
            $customer->shipping_city_id = $validatedData['shipping_city_id'] ?? null;
            $customer->shipping_address = $validatedData['shipping_address'] ?? null;
        }

        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Customer created successfully.');
    }


        public function update(CustomerRequest $request, $id){
        $request->validated();

        $customers = Customer::findOrFail($id);
        $customers->country_id = $request->billing_country_id;
        $customers->state_id = $request->billing_state_id;
        $customers->city_id = $request->billing_city_id;

        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->phone_number = $request->phone_number;
        $customers->payment_terms = $request->payment_terms;
        $customers->credit_days = $request->credit_days;
        $customers->description = $request->description;
        $customers->billing_address = $request->billing_address;
        // $customers->shipping_address = $request->shipping_address;
        $customers->gst_number = $request->gst_number;
        // $customers->assigned_to = $request->assigned_to;

        $customers->update($request->all());



        // $customers->save();

        return redirect()->route('customer.index')->with('status', 'Customer Updated Successfully');
    }



    public function show($id)
    {

            $customers = Customer::with('country','state','city')->findOrFail($id);
            $countries = Country::all();
            $states = State::all();
            $cities = City::all();

        return view('masters.customer.view',compact('customers','countries','states','cities'));
    }

    public function edit($id)
    {
        $customers = Customer::with('country','state','city')->findOrFail($id);
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        return view('masters.customer.edit',compact('customers','countries','states','cities'));
    }

    public function destroy( $id)
    {
        $customers = Customer::findOrFail($id);
        $customers->deleted_at = Carbon::now();
        $customers->save();
        return redirect()->route('customer.index')->with('status','Customer deactivate successfully.');
    }

    public function state($country_id)
{
    $states = State::where('country_id', $country_id)->get();
    return response()->json($states);
}

public function city($state_id)
{
    $cities = City::where('state_id', $state_id)->get();
    return response()->json($cities);
}

}
