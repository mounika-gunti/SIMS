@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/customer_checklist.css') }}">
@section('title')
Customer
@endsection
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Parties</div>
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
            <button type="button" class="btn btn-primary btn-add-checklist">
                Add Customer
            </button>
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
                                <th scope="col">Aadhar Number</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mounika</td>
                                <td>1234567898</td>
                                <td>1234567890</td>
                                <td>
                                    <i class="fas fa-check-circle text-success"></i>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="" class="btn btn-edit btn-sm me-2 rounded">
                                            Edit
                                        </a>
                                        <a href="" class="btn btn-view btn-sm me-2 rounded">
                                            View
                                        </a>
                                        <a href="javascript:;" class="btn btn-deactivate btn-sm rounded">
                                            Deactivate
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col-12">
                <div id="checklist-container">
                    <div class="pb-3 checklist-item">
                        <div class="input-group">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
            </div>
        </div>
    </div>
</div>
@endsection
