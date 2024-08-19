@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/customer_type.css') }}">
@section('title')
    Customer Type
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
                <h3 class="mb-0"><b>Customer Type</b></h3>
                <a href="{{ route('customer_type.create') }}" class="btn btn-secondary rounded-pill btn-add-customer-type">
                    Customer Type
                </a>
            </div>
            <hr>
            <div class="row gy-3">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Customer Type</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $cust)
                                    <tr>
                                        <td>{{ $cust->name }}</td>
                                        <td>{{ $cust->details }}</td>
                                        <td></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('customer_type.edit', ['id' => $cust->id]) }}"
                                                    class="btn  btn-sm btn-secondary me-2 rounded-pill btn-edit">
                                                    Edit
                                                </a>
                                                <form action="{{ route('customer_type.destroy', ['id' => $cust->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn  btn-sm btn-secondary me-2 rounded-pill btn-deactivate">
                                                        Deactivate
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
