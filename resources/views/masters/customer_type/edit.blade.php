@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/customer_type.css') }}">
@section('title')
    Customer Type
@endsection
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Masters</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Customer Type</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0"><b>Edit Customer Type</b></h3>
            </div>
            <hr>

            <div class="container mt-3">
                <form action="{{ route('customer_type.update', [$customer->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row ">
                        <div class="col-md-6">
                            <label for="customer_type" class="form-label">Customer Type*</label>
                            <input type="text" class="form-control" placeholder="Individual" name="name"
                                value="{{ old('name', $customer->name) }}">
                        </div>

                        <div class="col-md-6">
                            <label for="details" class="form-label">Details</label>
                            <textarea class="form-control" placeholder="Individual" name="details" rows="5">{{ old('details', $customer->details) }}</textarea>
                        </div>

                        <div class="button-group  mt-3 gap-2 d-flex justify-content-end">
                            <a href="{{ route('customer_type.index') }}"
                                class="btn btn-secondary rounded-pill text-dark btn-cancel">Cancel</a>
                            <button type="submit"
                                class="btn  btn-secondary rounded-pill text-dark  btn-Update">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
