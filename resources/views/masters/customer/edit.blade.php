@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/style.css') }}">

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

        <form action="{{ route('customer.update', $customers->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="tab-content" id="tabcontent">
                <div class="row mb-4 mt-3">
                    <div class="form-group col-md-4">
                        <label for="customer_name"><b>Customer Name*</b></label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $customers->name }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email_id"><b>Email Id</b></label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $customers->email }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="phone_number"><b>Phone Number*</b></label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            value="{{ $customers->phone_number }}">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="form-group col-md-4">
                        <label for="payment_terms"><b>Payment Terms</b></label>
                        <input type="text" class="form-control" id="payment_terms" name="payment_terms"
                            value="{{ $customers->payment_terms }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="credit_days"><b>Credit Days</b></label>
                        <input type="text" class="form-control" id="credit_days" name="credit_days"
                            value="{{ $customers->credit_days }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="description"><b>Description</b></label>
                        <textarea class="form-control" id="description" name="description"
                            placeholder="Enter Description"
                            rows="3">{{ old('description', $customers->description) }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="form-group col-md-4">
                    <label for="billing_country_id"><b>Country*</b></label>
                    <select class="form-select select2" name="billing_country_id" id="billing_country_id" required>
                        <option disabled>Select Country</option>
                        @foreach ($countries as $con)
                        <option value="{{ $con->id }}" @if (old('billing_country_id', $customers->billing_country_id) ==
                            $con->id) selected @endif>
                            {{ $con->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="billing_state_id"><b>State/Region*</b></label>
                    <select class="form-select select2" name="billing_state_id" id="billing_state_id" required>
                        <option disabled>Select State</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="billing_city_id"><b>City*</b></label>
                    <select class="form-select select2" name="billing_city_id" id="billing_city_id">
                        <option disabled>Select City</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="form-group col-md-6">
                    <label for="address"><b>Address*</b></label>
                    <textarea class="form-control" id="billing_address" name="billing_address"
                        placeholder="Enter Address" rows="3">{{ $customers->billing_address }}</textarea>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-12 d-flex align-items-center">
                    <h5 class="mb-0 me-2">Shipping Address*</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="same_as_billing" name="same_as_billing"
                            @if(old('same_as_billing', $customers->billing_address === $customers->shipping_address &&
                        $customers->billing_country_id === $customers->shipping_country_id &&
                        $customers->billing_state_id === $customers->shipping_state_id &&
                        $customers->billing_city_id === $customers->shipping_city_id
                        )) checked @endif>
                        <label class="form-check-label" for="same_as_billing">Same as Billing Address</label>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="form-group col-md-4">
                    <label for="shipping_country_id"><b>Country*</b></label>
                    <select class="form-select" name="shipping_country_id" id="shipping_country_id" required>
                        <option disabled>Select Country</option>
                        @foreach ($countries as $con)
                        <option value="{{ $con->id }}" @if (old('shipping_country_id', $customers->shipping_country_id)
                            == $con->id) selected @endif>
                            {{ $con->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="shipping_state_id"><b>State/Region*</b></label>
                    <select class="form-select" name="shipping_state_id" id="shipping_state_id" required>
                        <option disabled>Select State</option>
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="shipping_city_id"><b>City*</b></label>
                    <select class="form-select" name="shipping_city_id" id="shipping_city_id">
                        <option disabled>Select City</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="form-group col-md-6">
                    <label for="shipping_address_detail"><b>Address</b></label>
                    <textarea class="form-control" id="shipping_address" name="shipping_address"
                        placeholder="Enter Address" rows="3">{{ $customers->shipping_address }}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="gst_registration_number"><b>GST Registration Number</b></label>
                    <input type="text" class="form-control" id="gst_number" name="gst_number"
                        value="{{ $customers->gst_number }}">
                </div>
            </div>
            <div class="row mb-3 d-flex">
                <div class="form-group col-md-6">
                    <label for="services"><b>Services</b></label>
                    <div>
                        @foreach ($services as $service)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $service->id }}" name="services[]"
                                id="service_{{ $service->id }}"
                                {{ $customers->services->contains($service->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="service_{{ $service->id }}">
                                {{ $service->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="assigned_to"><b>Assigned To*</b></label>
                    <select class="form-select" name="assigned_to" id="assigned_to" required>
                        <option value="" disabled selected>Select Assigned To</option>
                        @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}"
                            {{ $employee->id == $customers->assigned_to ? 'selected' : '' }}>
                            {{ $employee->first_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $('#billing_country_id').select2({
        placeholder: "Select Country",
        allowClear: true
    }).val('{{ old('billing_country_id', $customers->billing_country_id) }}').trigger('change');

    $('#billing_state_id').select2({
        placeholder: "Select State",
        allowClear: true
    }).val('{{ old('billing_state_id', $customers->billing_state_id) }}').trigger('change');

    $('#billing_city_id').select2({
        placeholder: "Select City",
        allowClear: true
    }).val('{{ old('billing_city_id', $customers->billing_city_id) }}').trigger('change');

    $('#assigned_to').select2({
        placeholder: "Select Assigned To",
        allowClear: true
    }).val('{{ old('assigned_to', $customers->assigned_to) }}').trigger('change');

    var countryId = $('#billing_country_id').val();
    if (countryId) {
        $.ajax({
            url: "{{ route('get_states', ':id') }}".replace(':id', countryId),
            type: 'GET',
            success: function(states) {
                $('#billing_state_id').empty().append('<option value="">Select State</option>');
                $.each(states, function(key, state) {
                    $('#billing_state_id').append('<option value="' + state.id + '">' + state.name + '</option>');
                });
                $('#billing_state_id').val('{{ old('billing_state_id', $customers->billing_state_id) }}').trigger('change');

                var stateId = $('#billing_state_id').val();
                if (stateId) {
                    $.ajax({
                        url: "{{ route('get_cities', ':id') }}".replace(':id', stateId),
                        type: 'GET',
                        success: function(cities) {
                            $('#billing_city_id').empty().append('<option value="">Select City</option>');
                            $.each(cities, function(key, city) {
                                $('#billing_city_id').append('<option value="' + city.id + '">' + city.name + '</option>');
                            });
                            $('#billing_city_id').val('{{ old('billing_city_id', $customers->billing_city_id) }}').trigger('change');
                        },
                        error: function(xhr, status, error) {
                            console.error("Error loading cities: ", error);
                        }
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Error loading states: ", error);
            }
        });
    }


    $('#shipping_address').change(function() {
        if ($(this).is(':checked')) {
            var billingCountry = $('#billing_country_id').val();
            $('#shipping_country_id').val(billingCountry).trigger('change');

            var billingState = $('#billing_state_id').val();
            $('#shipping_state_id').val(billingState).trigger('change');

            var billingCity = $('#billing_city_id').val();
            $('#shipping_city_id').val(billingCity);

            var billingAddress = $('#billing_address').val();
            $('#shipping_address').val(billingAddress);
        } else {
            $('#shipping_country_id').val('').change();
            $('#shipping_state_id').val('').change();
            $('#shipping_city_id').val('');
            $('#shipping_address').val('');
        }
    });

    $('#shipping_country_id').change(function() {
        var countryId = $(this).val();
        if (countryId) {
            $.ajax({
                url: "{{ route('get_states', ':id') }}".replace(':id', countryId),
                type: 'GET',
                success: function(states) {
                    $('#shipping_state_id').empty().append('<option value="">Select State</option>');
                    $.each(states, function(key, state) {
                        $('#shipping_state_id').append('<option value="' + state.id + '">' + state.name + '</option>');
                    });
                    $('#shipping_state_id').val('{{ old('shipping_state_id', $customers->shipping_state_id) }}').trigger('change');

                    var stateId = $('#shipping_state_id').val();
                    if (stateId) {
                        $.ajax({
                            url: "{{ route('get_cities', ':id') }}".replace(':id', stateId),
                            type: 'GET',
                            success: function(cities) {
                                $('#shipping_city_id').empty().append('<option value="">Select City</option>');
                                $.each(cities, function(key, city) {
                                    $('#shipping_city_id').append('<option value="' + city.id + '">' + city.name + '</option>');
                                });
                                $('#shipping_city_id').val('{{ old('shipping_city_id', $customers->shipping_city_id) }}');
                            },
                            error: function(xhr, status, error) {
                                console.error("Error loading cities: ", error);
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error loading states: ", error);
                }
            });
        }
    });


    $('#same_as_billing').change(function() {
        if ($(this).is(':checked')) {
            $('#shipping_country_id').val($('#billing_country_id').val()).trigger('change');

            $('#shipping_address').val($('#billing_address').val());
        } else {
            $('#shipping_country_id').val('').change();
            $('#shipping_state_id').val('').change();
            $('#shipping_city_id').val('').change();
            $('#shipping_address').val('');
        }
    });
});
</script>
@endsection
