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
            <h3 class="mb-0"><b>View Employee Master</b></h3>
        </div>
        <ul class="nav nav-tabs" id="myedit-Tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active text-white" id="basicInfo-tab" data-bs-toggle="tab" href="#basicInfo-pane"
                    role="tab" aria-controls="basicInfo-pane" aria-selected="true">Basic Info</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-white" id="bankDetails-tab" data-bs-toggle="tab" href="#bankDetails-pane"
                    role="tab" aria-controls="bankDetails-pane" aria-selected="false">Bank Details</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-white" id="emergencyContact-tab" data-bs-toggle="tab"
                    href="#emergencyContact-pane" role="tab" aria-controls="emergencyContact-pane"
                    aria-selected="false">Emergency Contact</a>
            </li>
        </ul>

        <div class="tab-content p-3" id="myedit-TabContent">
            <div class="tab-pane fade show active" id="basicInfo-pane" role="tabpanel" aria-labelledby="basicInfo-tab">
                <div class="row">
                    <div class="col-4">
                        <label for="first_name" class="form-label">Employee Name*</label>
                        <input type="text" class="form-control w-3" name="first_name" id="first_name"
                            value="{{ $employee->first_name }}" disabled>
                    </div>
                    <div class="col-4">
                        <label for="phone_number" class="form-label">Phone Number*</label>
                        <input type="text" class="form-control w-3" name="phone_number" id="phone_number"
                            value="{{ $employee->phone_number }}" disabled>
                    </div>
                    <div class="col-4">
                        <label for="whatsapp_number" class="form-label">Whatsapp Number</label>
                        <input type="text" class="form-control w-3" name="whatsapp_number" id="whatsapp_number"
                            value="{{ $employee->whatsapp_number }}" disabled>
                    </div>
                    <div class="col-4 mt-3">
                        <label for="address" class="form-label">Address*</label>
                        <textarea type="text" class="form-control" aria-label="details" rows="5" name="address"
                            disabled>{{ $employee->address }}</textarea>
                    </div>
                    <div class="col-4 mt-3">
                        <div class="mb-3">
                            <label class="form-label" for="designation_id">Designation*</label>
                            <select class="form-select" id="designation_id" name="designation_id" disabled>
                                @foreach($designations as $designation)
                                <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4 mt-3">
                        <div class="mb-3">
                            <label class="form-label" for="branch_id">Branch*</label>
                            <select class="form-select" id="branch_id" name="branch_id" disabled>
                                @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <h5 class="mb-0 mt-4">Attachment</h5>
                    <div class="row gy-3">
                        <div class="col-md-6">
                            <label for="aadhar_number" class="form-label">Aadhar Number*</label>
                            <input type="text" class="form-control w-3" name="aadhar_number" id="aadhar_number"
                                value="{{ $employee->aadhar_number }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="aadhar_attach_link">Attach Aadhar*</label>
                                <input type="file" class="form-control" id="aadhar_attach_link"
                                    name="aadhar_attach_link">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="pan_number" class="form-label">PAN Number*</label>
                            <input type="text" class="form-control w-3" name="pan_number" id="pan_number"
                                value="{{ $employee->pan_number }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="pan_attach_link">Attach PAN*</label>
                                <input type="file" class="form-control" id="pan_attach_link" name="pan_attach_link">
                            </div>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-md-12 d-flex justify-content-end">
                                <div class="form-group mb-2 mr-3">
                                    <button type="button" class="btn btn-cancel btn-block"
                                        id="cancel-basicInfo">Cancel</button>
                                </div>
                                <div class="form-group mb-2 mr-3">
                                    <button type="button" class="btn btn-cancel btn-block"
                                        id="next-basicInfo">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="bankDetails-pane" role="tabpanel" aria-labelledby="bankDetails-tab">
                <div class="row p-3">
                    <div class="col-md-6 mb-3">
                        <label for="bank_name" class="form-label">Bank Name*</label>
                        <input type="text" class="form-control w-3" name="bank_name" id="bank_name"
                            value="{{ $employee->bank_name }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="branch_name" class="form-label">Branch Name*</label>
                        <input type="text" class="form-control w-3" name="branch_name" id="branch_name"
                            value="{{ $employee->branch_name }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="ifsc" class="form-label">IFSC*</label>
                        <input type="text" class="form-control w-3" name="ifsc" id="ifsc" value="{{ $employee->ifsc }}"
                            disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="account_no" class="form-label">Account Number*</label>
                        <input type="text" class="form-control w-3" name="account_no" id="account_no"
                            value="{{ $employee->account_no }}" disabled>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-md-12 d-flex justify-content-end">
                            <div class="form-group mb-3 mr-3 mt-3">
                                <button type="button" class="btn btn-cancel btn-block"
                                    id="cancel-bankDetails">Cancel</button>
                            </div>
                            <div class="form-group mb-3 mr-3 mt-3">
                                <button type="button" class="btn btn-cancel btn-block"
                                    id="next-bankDetails">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="emergencyContact-pane" role="tabpanel"
                aria-labelledby="emergencyContact-tab">
                <div class="row gy-3 p-3">
                    <div class="col-md-6">
                        <label for="emergency_contact_name" class="form-label">Name*</label>
                        <input type="text" class="form-control w-3" name="emergency_contact_name"
                            id="emergency_contact_name" value="{{ $employee->emergency_contact_name }}" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="emergency_contact_phone_number" class="form-label">Phone Number*</label>
                        <input type="text" class="form-control w-3" name="emergency_contact_phone_number"
                            id="emergency_contact_phone_number" value="{{ $employee->emergency_contact_phone_number }}"
                            disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="emergency_contact_relationship" class="form-label">Relation*</label>
                        <input type="text" class="form-control w-3" name="emergency_contact_relationship"
                            id="emergency_contact_relationship" value="{{ $employee->emergency_contact_relationship }}"
                            disabled>
                    </div>
                    <div class="form-row mb-4">
                        <div class="col-md-12 d-flex justify-content-end">
                            <div class="form-group mb-2 mr-3">
                                <button type="button" class="btn btn-cancel btn-block"
                                    id="cancel-emergencyContact">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        $('#next-basicInfo').click(function () {
            var tab = new bootstrap.Tab($('#bankDetails-tab')[0]);
            tab.show();
        });

        $('#next-bankDetails').click(function () {
            var tab = new bootstrap.Tab($('#emergencyContact-tab')[0]);
            tab.show();
        });
    });
     $('.btn-cancel').on('click', function () {
        window.location.href = "{{ route('employee.index') }}";
    });
</script>
@endsection
