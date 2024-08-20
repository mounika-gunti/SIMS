@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/customer_checklist.css') }}">
@section('title')
Services
@endsection
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Masters</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Service Master</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0"><b>Service Master</b></h3>
            <button type="button" class="btn btn-primary btn-add-checklist me-2"
                onclick="window.location.href='{{ route('services.create') }}'">
                Add Service
            </button>
        </div>
        <hr>
        <div class="row gy-3">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Service Name</th>
                                <th scope="col">Details</th>
                                <th scope="col">Frequency</th>
                                <th scope="col">Duration From</th>
                                <th scope="col">Duration To</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mounika</td>
                                <td>1234567898</td>
                                <td>India</td>
                                <td>Karnataka</td>
                                <td>Bangalore</td>
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
