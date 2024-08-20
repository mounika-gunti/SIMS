<?php

namespace App\Http\Controllers\Masters;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Customer;
use App\Models\Country;
use App\Models\State;
use App\Models\City;


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

    public function store(){

    }

    public function show($id)
    {
        return view('masters.customer.view');
    }

    public function edit()
    {
        return view('masters.customer.edit');
    }

    public function getStates($country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }
    public function getCities($state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }
}
