@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/customer_checklist.css') }}">
@section('title')
    Employee
@endsection
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Master</div>
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
                <a class="btn btn-primary btn-add-employee" href='{{ route('employee_master.create') }}'>
                    Add Employee
                </a>
            </div>
            <hr>
            <div class="row gy-3">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Picture</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">WhatsApp Number</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td></td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->phone_number }}</td>
                                    <td>{{ $employee->whatsapp_number }}</td>
                                    <td>
                                        @if ($employee->status == 'active')
                                            <i class="fas fa-check-circle text-success"></i>
                                        @else
                                            <i class="fas fa-times-circle text-danger"></i>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('employee_master.edit', $employee->id) }}"
                                                class="btn btn-edit btn-sm me-2 rounded">
                                                Edit
                                            </a>
                                            <form action="{{ route('employee_master.destroy', $employee->id) }}"
                                                method="Post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-deactivate btn-sm rounded">
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
@endsection
