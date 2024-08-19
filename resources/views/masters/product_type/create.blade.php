@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/product_type.css') }}">
@section('title')
    Product Type
@endsection
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Master</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Product Type</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0"><b>Add Product Type</b></h3>
            </div>
            <hr>
            <form action="{{ route('product_type.store') }}" method="POST">
                @csrf
                <div class="row g-4 p-3">
                    <div class="col-6">
                        <label for="productType" class="mb-2">Product Type*</label>
                        <input type="text" class="form-control @error('name')is-invalid @enderror" name="name"
                            placeholder="Enter Product Type" aria-label="Product Type">
                        @error('name')
                            <span class="text-danger">*Enter valid Product Type</span>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="details" class="mb-2">Details</label>
                        <textarea type="text" class="form-control" name="details" placeholder="Enter Details" aria-label="details"
                            rows="5"></textarea>
                    </div>
                </div>
                <div class="float-end mt-3 mx-3">
                    <a href="{{ route('product_type.index') }}"
                        class="btn  btn-secondary rounded-pill mx-3 text-dark btn-cancel" type="submit">Cancel</a>
                    <button class="btn  btn-secondary rounded-pill text-dark btn-save" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
