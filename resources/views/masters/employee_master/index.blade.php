@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            <a class="btn btn-primary btn-add" href='{{ route('employee_master.create') }}'>
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
                            <td>
                                @if($employee->image_path)
                                <img src="{{ asset($employee->image_path) }}" alt="Profile Picture"
                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                @else
                                <img src="{{ asset('default-image.png') }}" alt="Default Picture"
                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                @endif
                            </td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->phone_number }}</td>
                            <td>{{ $employee->whatsapp_number }}</td>
                            <td>
                                @if (is_null($employee->deleted_at))
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

                                    @if ($employee->deleted_at == null)
                                    <form id="deactivate-form-{{ $employee->id }}" method="POST"
                                        action="{{ route('employee_master.deactivate', $employee->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-deactivate btn-sm rounded deactivate-btn"
                                            data-id="{{ $employee->id }}"
                                            onclick="confirmDeactivation(event, '{{ $employee->id }}')">Deactivate</button>
                                    </form>
                                    @else
                                    <form id="activate-form-{{ $employee->id }}" method="POST"
                                        action="{{ route('employee_master.activate', $employee->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-activate btn-sm rounded activate-btn"
                                            data-id="{{ $employee->id }}"
                                            onclick="confirmActivation(event, '{{ $employee->id }}')">Activate</button>
                                    </form>
                                    @endif
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    function confirmDeactivation(ev, employeeId) {
            ev.preventDefault();
            swal({
                    title: "Are you sure you want to deactivate this?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDeactivate) => {
                    if (willDeactivate) {
                        document.getElementById('deactivate-form-' + employeeId).submit();
                    }
                });
        }

        function confirmActivation(ev, employeeId) {
            ev.preventDefault();
            swal({
                    title: "Are you sure you want to activate this?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willActivate) => {
                    if (willActivate) {
                        document.getElementById('activate-form-' + employeeId).submit();
                    }
                });
        }
</script>
@endsection
