@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/style.css') }}">

@section('title')
    Employee Master
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
                <h3 class="mb-0"><b>Add Employee Details</b></h3>
            </div>
            <form action="{{ route('employee_master.store') }}" method="POST" enctype="multipart/form-data"
                id="employee-form">
                @csrf
                <div class="row gy-4">
                    <div class="col-lg-6">
                        <label for="first_name" class="form-label">Employee Name*</label>
                        <input type="text" class="form-control" placeholder="Enter Employee Name" name="first_name"
                            id="first_name">
                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="phone_number" class="form-label">Phone Number*</label>
                        <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone_number"
                            id="phone_number">
                        @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="whatsapp_number" class="form-label">WhatsApp Number</label>
                        <input type="text" class="form-control" placeholder="Enter WhatsApp Number"
                            name="whatsapp_number" id="whatsapp_number">
                    </div>
                    <div class="col-lg-6">
                        <label for="attach" class="form-label">Attach Profile Picture*</label>
                        <input type="file" class="form-control" name="attach" id="attach">
                    </div>

                    <div class="form-row mb-4">
                        <div class="col-md-12 d-flex justify-content-end">
                            <div class="form-group mb-2">
                                <button type="button" onclick="confirmSave(event)"
                                    class="btn btn-save btn-block">Save</button>
                            </div>
                            <div class="form-group mb-2 mr-3">
                                <a href="{{ route('employee_master.index') }}" class="btn btn-cancel btn-block">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function confirmSave(ev) {
        ev.preventDefault();
        swal({
                title: "Employee Added Successfully",
                icon: "success",

                buttons: true,
                dangerMode: false,
            })
            .then((willSave) => {
                if (willSave) {
                    document.getElementById('employee-form').submit();
                }
            });
    }
</script>
