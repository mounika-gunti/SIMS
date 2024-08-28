@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/style.css') }}">

@section('title')
Employee
@endsection
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Employee Master</div>
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
            <h3 class="mb-0"><b>Edit Employee Master</b></h3>
        </div>
        <form action="{{ route('employee_master.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="tab-content p-3" id="myedit-TabContent">
                <div class="tab-pane fade show active" id="basicInfo-pane" role="tabpanel"
                    aria-labelledby="basicInfo-tab">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <label for="first_name" class="form-label">Employee Name*</label>
                            <input type="text" class="form-control w-3" name="first_name" id="first_name"
                                value="{{ $employee->first_name }}" placeholder="Enter Employee Name">
                            @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="phone_number" class="form-label">Phone Number*</label>
                            <input type="text" class="form-control w-3" name="phone_number" id="phone_number"
                                value="{{ $employee->phone_number }}" placeholder="Enter Phone Number">
                            @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6">
                            <label for="whatsapp_number" class="form-label">Whatsapp Number</label>
                            <input type="text" class="form-control w-3" name="whatsapp_number" id="whatsapp_number"
                                value="{{ $employee->whatsapp_number }}" placeholder="Enter Whatsapp Number">
                        </div>
                        <div class="col-lg-6">
                            <label for="attach" class="form-label">Attach Profile Picture*</label>
                            <input type="file" class="form-control" name="attach" id="attach">
                        </div>

                        <div class="row gy-3">
                            <div class="form-row mb-4">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <div class="form-group ">
                                        <a href="{{ route('employee_master.index') }}" class="btn btn-cancel btn-block"
                                            id="cancel-basicInfo">Cancel</a>
                                    </div>
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-save btn-block"
                                            id="next-basicInfo">Update</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
