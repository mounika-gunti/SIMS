@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/style.css') }}">
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
            <h3 class="mb-0"><b>View User</b></h3>
        </div>
        <hr>
        <div class="row mb-4">
            <div class="form-group col-md-5">
                <label for="display_name"><b>Display Name*</b></label>
                <input type="text" class="form-control" id="display_name" value="{{ $user->first_name }}" disabled>
            </div>
        </div>

        <div class="row mb-4">
            <div class="form-group col-md-5">
                <label for="username"><b>User Name*</b></label>
                <input type="text" class="form-control" id="username" value="{{ $user->username }}" disabled>
            </div>
        </div>

        <div class="form-row mb-4">
            <div class="col-md-12 d-flex justify-content-end">
                <div class="form-group mb-2 mr-3">
                    <a href="{{ route('user_management.index') }}" class="btn btn-cancel btn-block">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
