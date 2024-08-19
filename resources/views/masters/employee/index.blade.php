@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/customer_checklist.css') }}">
@section('title')
Employee
@endsection
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Parties</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Employee Master</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0"><b>Employee Master</b></h3>
            <button type="button" class="btn btn-primary btn-add-checklist"
                onclick="window.location.href='{{ route('employee.create') }}'">
                Add Employee
            </button>
        </div>
        <div class="search-bar flex-grow-1">
            <div class="position-relative">
                <div class="col-lg-5">
                    <input class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text"
                        placeholder="Search by Employee Name, Aadhar Number">
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

                                <th scope="col">Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Branch Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->phone_number }}</td>
                                <td>{{ optional($employee->designation)->name ?? 'N/A' }}</td>
                                <td>{{ optional($employee->branch)->name ?? 'N/A' }}</td>
                                <td>
                                    @if($employee->status == 'active')
                                    <i class="fas fa-check-circle text-success"></i>
                                    @else
                                    <i class="fas fa-times-circle text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('employee.edit', $employee->id) }}"
                                            class="btn btn-edit btn-sm me-2 rounded">
                                            Edit
                                        </a>
                                        <a href="{{ route('employee.show', $employee->id) }}"
                                            class="btn btn-view btn-sm me-2 rounded">
                                            View
                                        </a>
                                        <a href="javascript:;" class="btn btn-deactivate btn-sm rounded">
                                            Deactivate
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
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
