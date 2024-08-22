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
            $customers = Customer::with('billingCountry', 'billingState', 'billingCity','shippingCountry', 'shippingState', 'shippingCity')->get();
            return view('masters.customer.index', compact('customers'));
        }


    public function create()
    {
        $customers=Customer::with('country','state','city')->get();
        $countries=Country::all();
        $states=State::all();
        $cities=City::all();

        return view('masters.customer.create',compact('customers','countries','states','cities'));
    }

    public function store(CustomerRequest $request)
    {
        $validatedData = $request->validated();

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


        if ($request->filled('same_as_billing')) {
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


    public function update(CustomerRequest $request, $id)
{
    $validatedData = $request->validated();
    $customer = Customer::findOrFail($id);

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

    if ($request->has('shipping_address')) {
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

    return redirect()->route('customer.index')->with('status', 'Customer Updated Successfully');
}


    public function show($id)
    {
            $customers = Customer::with('billingCountry', 'billingState', 'billingCity', 'shippingCountry', 'shippingState', 'shippingCity')->findOrFail($id);
            $countries = Country::all();
            $states = State::all();
            $cities = City::all();

        return view('masters.customer.view',compact('customers','countries','states','cities'));
    }

    public function edit($id)
    {
        $customers = Customer::with('billingCountry', 'billingState', 'billingCity', 'shippingCountry', 'shippingState', 'shippingCity')->findOrFail($id);

        $countries = Country::all();
        $states = State::all();
        $cities = City::all();

        return view('masters.customer.edit', compact('customers', 'countries', 'states', 'cities'));
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