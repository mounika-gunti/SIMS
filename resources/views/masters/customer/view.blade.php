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
            <h3 class="mb-0"><b>View Customer Master</b></h3>
        </div>
        <hr>

        <div class="tab-content" id="tabcontent">
            <div class="row mb-4 mt-3">
                <div class="form-group col-md-4">
                    <label for="customer_name"><b>Customer Name*</b></label>
                    <input type="text" class="form-control" id="customer_name" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="email_id"><b>Email Id</b></label>
                    <input type="text" class="form-control" id="email_id" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="phone_number"><b>Phone Number</b></label>
                    <input type="text" class="form-control" id="phone_number" disabled>
                </div>
            </div>
            <div class="row mb-4">
                <div class="form-group col-md-4">
                    <label for="payment terms"><b>Payment Terms</b></label>
                    <input type="text" class="form-control" id="payment terms" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="credit days"><b>Credit Days</b></label>
                    <input type="text" class="form-control" id="credit days" disabled>
                </div>
                <div class="form-group col-md-4">
                    <label for="description"><b>Description</b></label>
                    <textarea class="form-control" id="description" rows="3" disabled></textarea>
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group col-md-4">
                    <label for="country"><b>Country*</b></label>
                    <select id="country" class="form-select" disabled>
                        <option value="">Select Country</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="state"><b>State/Region*</b></label>
                    <select id="state" class="form-select" disabled>
                        <option value="">Select State</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="city"><b>City</b></label>
                    <input type="text" class="form-control" id="city" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group col-md-6">
                    <label for="address"><b>Address</b></label>
                    <textarea class="form-control" id="address" rows="3" disabled></textarea>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-12 d-flex align-items-center">
                    <h5 class="mb-0 me-2">Shipping Address*</h5>
                    <input class="form-check-input" type="checkbox" id="shipping_address">
                    <label class="form-check-label" for="shipping_address"></label>
                    <h5>(Same as Billing Address)</h5>
                </div>
            </div>

            <div class="row mb-3">
                <div class="form-group col-md-4">
                    <label for="country"><b>Country*</b></label>
                    <select id="country" class="form-select" disabled>
                        <option value="">Select Country</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="state"><b>State/Region*</b></label>
                    <select id="state" class="form-select" disabled>
                        <option value="">Select State</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="city"><b>City</b></label>
                    <input type="text" class="form-control" id="city" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group col-md-6">
                    <label for="address"><b>Address</b></label>
                    <textarea class="form-control" id="address" rows="3" disabled></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="gst_registration_number"><b>GST Registration Number</b></label>
                    <input type="text" class="form-control" id="gst_registration_number" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group col-md-3">
                    <label for="services"><b>Services</b></label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gst">
                        <label class="form-check-label" for="gst">
                            GST
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="pt">
                        <label class="form-check-label" for="pt">
                            PT
                        </label>
                    </div>
                </div>
                <div class="form-group col-md-6" style="margin-left: 250px; margin-top:-50px;">
                    <label for=" assigned_to"><b>Assigned To*</b></label>
                    <select id="assigned_to" class="form-select" disabled>
                        <option value="">Select Assigned To</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="form-row mb-4">
        <div class="col-md-12 d-flex justify-content-end">
            <div class="form-group mb-2 mr-3">
                <button type="button" class="btn btn-cancel btn-block">Cancel</button>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
