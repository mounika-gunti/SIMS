@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/product_type.css') }}">

@section('title')
    Product Type
@endsection
@section('content')
    <div class="col-sm-6">
        @if (session('status'))
            <div class="alert alert-success p-1 mb-1" style="min-height: 30px;">
                {{ session('status') }}
            </div>
        @endif
    </div>
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
                <h3 class="mb-0"><b>Product Type</b></h3>
                <a type="submit" href="{{ route('product_type.create') }}"
                    class="btn btn-secondary rounded-pill btn-add-product-type">
                    Product Type
                </a>
            </div>
            <hr>
            <div class="row gy-3">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Product Type</th>
                                <th scope="col">Details</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $prod)
                                <tr>
                                    <td>{{ $prod->name }}</td>
                                    <td>{{ $prod->details }}</td>
                                    <td>
                                        <i class="fas fa-check-circle text-success"></i>
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('product_type.edit', ['id' => $prod->id]) }}"
                                            class="btn btn-sm   rounded-pill me-2 btn-edit">
                                            Edit
                                        </a>
                                        <form action="{{ route('product_type.destroy', ['id' => $prod->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-sm  me-2 rounded-pill  btn-deactivate">Deactivate</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
