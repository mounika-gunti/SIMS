@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/customer_checklist.css') }}">
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Masters</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Customer Master</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0"><b>Edit Customer Master</b></h3>
            </div>
            <hr>

            <form action="{{ route('customer.update', $customers->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="tab-content" id="tabcontent">
                    <div class="row mb-4 mt-3">
                        <div class="form-group col-md-4">
                            <label for="customer_name"><b>Customer Name*</b></label>
                            <input type="text" class="form-control" id="customer_name" name="name"
                                value="{{ old('name', $customers->name) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email_id"><b>Email Id</b></label>
                            <input type="email" class="form-control" id="email_id" name="email"
                                value="{{ old('email', $customers->email) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phone_number"><b>Phone Number</b></label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                value="{{ old('phone_number', $customers->phone_number) }}">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="form-group col-md-4">
                            <label for="payment terms"><b>Payment Terms</b></label>
                            <input type="text" class="form-control" id="payment terms" name="payment_terms"
                                value="{{ old('payment_terms', $customers->payment_terms) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="credit days"><b>Credit Days</b></label>
                            <input type="text" class="form-control" id="credit days" name="credit_days"
                                value="{{ old('credit_days', $customers->credit_days) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="description"><b>Description</b></label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="3">{{ $customers->description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-4">
                            <label for="billing_country_id"><b>Country*</b></label>
                            <select class="form-select" name="billing_country_id" name="billing_country_id"
                                id="billing_country_id" required>
                                <option selected disabled>Select Country</option>
                                @foreach ($countries as $con)
                                    <option value="{{ $con->id }}"
                                        {{ $con->id == old('billing_country_id', $customers->billing_country_id) ? 'selected' : '' }}>
                                        {{ $con->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="billing_state_id"><b>State/Region*</b></label>
                            <select class="form-select" name="billing_state_id" name="billing_state_id"
                                id="billing_state_id" required>
                                <option selected disabled>Select State</option>
                                @foreach ($states as $st)
                                    <option value="{{ $st->id }}"
                                        {{ $st->id == old('billing_state_id', $customers->billing_state_id) ? 'selected' : '' }}>
                                        {{ $st->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="billing_city_id"><b>City</b></label>
                            <select class="form-select" name="billing_city_id" value="{{ $customers->billing_city_id }}"
                                id="billing_city_id">
                                <option selected disabled>Select City</option>
                                @foreach ($cities as $ct)
                                    <option value="{{ $ct->id }}"
                                        {{ $ct->id == old('billing_city_id', $customers->billing_city_id) ? 'selected' : '' }}>
                                        {{ $ct->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="form-group col-md-6">
                            <label for="address"><b>Address</b></label>
                            <textarea class="form-control" id="address" name="billing_address" placeholder="Enter Address" rows="3">{{ $customers->billing_address }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12 d-flex align-items-center">
                            <h5 class="mb-0 me-2">Shipping Address*</h5>
                            <input class="form-check-input" name="shipping_address" type="checkbox" id="shipping_address">
                            <label class="form-check-label" for="shipping_address"></label>
                            <h5>(Same as Billing Address)</h5>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="form-group col-md-4">
                            <label for="country"><b>Country*</b></label>
                            <select id="country" class="form-select">
                                <option value="{{ old('shipping_country_id', $customers->shipping_country_id) }}">Select
                                    Country</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="state"><b>State/Region*</b></label>
                            <select id="state" class="form-select">
                                <option value="">Select State</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="city"><b>City</b></label>
                            <select id="city" class="form-select">
                                <option value="">Select City</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-6">
                            <label for="address"><b>Address</b></label>
                            <textarea class="form-control" id="address" placeholder="Enter Address" rows="3"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gst_registration_number"><b>GST Registration Number</b></label>
                            <input type="text" class="form-control" id="gst_registration_number" name="gst_number"
                                value="{{ old('gst_number', $customers->gst_number) }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-3">
                            <label for="services"><b>Services</b></label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gst" name="gst">
                                <label class="form-check-label" for="gst">
                                    GST
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="form-group col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="pt" name="pt">
                                <label class="form-check-label" for="pt">
                                    PT
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-6" style="margin-left: 250px; margin-top:-50px;">
                            <label for=" assigned_to"><b>Assigned To*</b></label>
                            <select id="assigned_to" class="form-select">
                                <option value="">Select Assigned To</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-md-12 d-flex justify-content-end">
                            <div class="form-group mb-2 mr-3">
                                <a href="{{ route('customer.index') }}" class="btn btn-cancel btn-block">Cancel</a>
                            </div>
                            <div class="form-group mb-2">
                                <button type="submit" class="btn btn-save btn-block">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
