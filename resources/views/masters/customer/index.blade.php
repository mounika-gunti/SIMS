@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/customer_checklist.css') }}">
@section('title')
    Customer
@endsection
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
                <h3 class="mb-0"><b>Customer Master</b></h3>
                <a href="{{ route('customer.create') }}" class="btn btn-primary btn-add-checklist">
                    Add Customer
                </a>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative">
                    <div class="col-lg-5">
                        <input class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text"
                            placeholder="Search by Customer Name, Aadhar Number">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row gy-3">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Service Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->phone_number }}</td>

                                        <td>
                                            @if ($customer->services->isNotEmpty())
                                                @foreach ($customer->services as $service)
                                                    {{ $service->name }}{{ !$loop->last ? ', ' : '' }}
                                                @endforeach
                                            @else
                                                N/A
                                            @endif
                                        </td>

                                        <td>
                                            <i class="fas fa-check-circle text-success"></i>
                                        </td>

                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('customer.edit', $customer->id) }}"
                                                    class="btn btn-edit btn-sm me-2 rounded">
                                                    Edit
                                                </a>
                                                <a href="{{ route('customer.show', $customer->id) }}"
                                                    class="btn btn-view btn-sm me-2 rounded">
                                                    View
                                                </a>
                                                <form action="{{ route('customer.destroy', $customer->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-deactivate btn-sm rounded">
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
