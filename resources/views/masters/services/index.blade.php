@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                            <tr>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->details }}</td>
                                <td>{{ $service->frequency }}</td>
                                <td>
                                    @if($service->deleted_at == null)
                                    <i class="fas fa-check-circle text-success"></i>
                                    @else
                                    <i class="fas fa-times-circle text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('services.edit', $service->id) }}"
                                            class="btn btn-edit btn-sm me-2 rounded">
                                            Edit
                                        </a>
                                        <a href="{{ route('services.show', $service->id) }}"
                                            class="btn btn-view btn-sm me-2 rounded">
                                            View
                                        </a>
                                        @if($service->deleted_at == null)
                                        <form id="deactivate-form-{{ $service->id }}" method="POST"
                                            action="{{ route('service.deactivate', $service->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <!-- Ensure method matches your route's expected method -->
                                            <button type="button"
                                                class="btn btn-deactivate btn-sm rounded deactivate-btn"
                                                data-id="{{ $service->id }}">Deactivate</button>
                                        </form>
                                        @else
                                        <form id="activate-form-{{ $service->id }}" method="POST"
                                            action="{{ route('service.activate', $service->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <!-- Ensure method matches your route's expected method -->
                                            <button type="button" class="btn btn-activate btn-sm rounded activate-btn"
                                                data-id="{{ $service->id }}">Activate</button>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('.deactivate-btn').click(function(){
            var serviceId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to deactivate this service!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, deactivate it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deactivate-form-' + serviceId).submit();
                }
            });
        });

        $('.activate-btn').click(function(){
            var serviceId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to activate this service!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, activate it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#activate-form-' + serviceId).submit();
                }
            });
        });
    });
</script>
@endsection
