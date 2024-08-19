@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/customer_checklist.css') }}">
@section('title')
Dashboard
@endsection
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Masters</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">User Managament</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0"><b>User Management</b></h3>
            <button type="button" class="btn btn-primary btn-add-checklist">
                Save
            </button>
        </div>
        <hr>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <form>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col"><input type="checkbox"></th>
                                        <th scope="col">Main</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">All</th>
                                        <th scope="col">Add</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="checkbox-container"><input type="checkbox" checked></td>
                                        <td>Masters</td>
                                        <td>Customer Type</td>
                                        <td>masters/customer_type</td>
                                        <td class="checkbox-container"><input type="checkbox" checked></td>
                                        <td class="checkbox-container"><input type="checkbox" checked></td>
                                        <td class="checkbox-container"><input type="checkbox" checked></td>
                                        <td class="checkbox-container"><input type="checkbox" checked></td>
                                        <td class="checkbox-container"><input type="checkbox" checked></td>
                                    </tr>
                                    <tr>
                                        <td class="checkbox-container"><input type="checkbox"></td>
                                        <td>User Management</td>
                                        <td>Add User</td>
                                        <td>user_management/user</td>
                                        <td class="checkbox-container"><input type="checkbox"></td>
                                        <td class="checkbox-container"><input type="checkbox" checked></td>
                                        <td class="checkbox-container"><input type="checkbox"></td>
                                        <td class="checkbox-container"><input type="checkbox" checked></td>
                                        <td class="checkbox-container"><input type="checkbox"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
