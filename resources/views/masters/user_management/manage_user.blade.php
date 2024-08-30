@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/style.css') }}">

@section('title')
Manage User
@endsection

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Masters</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">User Management</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0"><b>Manage User</b></h3>
            <a href="{{ route('user_management.export_users') }}" class="btn btn-primary btn-add">
                Export to Excel
            </a>
        </div>
        <div class="search-bar flex-grow-1">
            <div class="position-relative">
                <div class="col-lg-5">
                    <input class="form-control rounded-5 px-5 search-control d-lg-block d-none" type="text"
                        placeholder="Search User Name">
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
                                <th scope="col">SI No</th>
                                <th scope="col">Display Name</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Profile Picture</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    @if($user->image_path)
                                    <img src="{{ asset($user->image_path) }}" alt="Profile Picture"
                                        style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                    @else
                                    <img src="{{ asset('default-image.png') }}" alt="Default Picture"
                                        style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
                                    @endif
                                </td>
                                <td>
                                    <div class="d-inline">
                                        <a href="{{ route('user_management.edit_user', $user->id) }}"
                                            class="btn btn-edit btn-sm me-2 rounded">
                                            Edit
                                        </a>
                                        @if($user->deleted_at == null)
                                        <form id="deactivate-form-{{ $user->id }}" method="POST"
                                            action="{{ route('user.deactivate', $user->id) }}" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="button"
                                                class="btn btn-deactivate btn-sm rounded deactivate-btn"
                                                data-id="{{ $user->id }}">Deactivate</button>
                                        </form>
                                        @else
                                        <form id="activate-form-{{ $user->id }}" method="POST"
                                            action="{{ route('user.activate', $user->id) }}" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="button" class="btn btn-activate btn-sm rounded activate-btn"
                                                data-id="{{ $user->id }}">Activate</button>
                                        </form>
                                        @endif
                                        <a href="{{ route('user_management.user_permission', ['id' => $user->id]) }}"
                                            class="btn btn-view btn-sm me-2 rounded">
                                            User Permission
                                        </a>
                                        <a href="{{ route('user_management.change_password', $user->id) }}"
                                            class="btn btn-view btn-sm me-2 rounded">
                                            Change Password
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
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('.deactivate-btn').click(function(){
            var userId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to deactivate this user!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, deactivate it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deactivate-form-' + userId).submit();
                }
            });
        });

        $('.activate-btn').click(function(){
            var userId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to activate this user!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, activate it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#activate-form-' + userId).submit();
                }
            });
        });
    });
</script>
@endsection
