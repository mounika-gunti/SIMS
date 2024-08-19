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
                <h3 class="mb-0"><b>Add Customer Type</b></h3>
            </div>
            <hr>
            <div class="container mt-3">
                <form action="{{ route('customer_type.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row ">
                        <div class="col-md-6">
                            <label for="customer_type" class="form-label">Customer Type*</label>
                            <input type="text" class="form-control @error('name')is-invalid @enderror"
                                placeholder="Enter Customer Type" name="name">
                            @error('name')
                                <span class="text-danger">*Enter valid Customer Type</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="details" class="form-label">Details</label>
                            <textarea class="form-control" placeholder="Enter details" name="details" rows="5"></textarea>
                        </div>

                        <div class="button-group mt-3 gap-2 d-flex justify-content-end">
                            <a class="btn  btn-secondary rounded-pill text-dark btn-cancel"
                                href="{{ route('customer_type.index') }}">Cancel</a>
                            <button class="btn  btn-secondary rounded-pill text-dark btn-save" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
