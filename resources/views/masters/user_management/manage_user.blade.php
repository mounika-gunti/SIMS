@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/customer_checklist.css') }}">

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
            <a href="" class="btn btn-primary btn-add-checklist">
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
                                <td>Picture</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('user_management.edit_user', $user->id) }}"
                                            class="btn btn-edit btn-sm me-2 rounded">
                                            Edit
                                        </a>
                                        <form action="{{ route('user_management.delete', ['id' => $user->id]) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-deactivate btn-sm rounded"
                                                onclick="return confirm('Are you sure you want to delete the user?')">
                                                Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('user_management.user_permission') }}"
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


@endsection
