@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/customer_checklist.css') }}">
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Masters</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Customer Master</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0"><b>View Customer Master</b></h3>
        </div>
        <hr>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active text-white" id="basic-info-tab" data-bs-toggle="tab" href="#basic-info"
                    role="tab" aria-controls="basic-info" aria-selected="true">Basic Info</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-white" id="kyc-tab" data-bs-toggle="tab" href="#kyc" role="tab"
                    aria-controls="kyc" aria-selected="false">KYC</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-white" id="loans-tab" data-bs-toggle="tab" href="#loans" role="tab"
                    aria-controls="loans" aria-selected="false">Loans</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="basic-info" role="tabpanel" aria-labelledby="basic-info-tab">
                <div class="row mb-4 mt-3">
                    <div class="form-group col-md-5">
                        <label for="aadhar_number"><b>Enter Aadhar Number</b></label>
                        <input type="text" class="form-control" id="aadhar_number" disabled>
                    </div>
                    <div class="form-group col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-proceed btn-block">Proceed</button>
                    </div>
                </div>
                <div class="row mb-4 mt-3">
                    <div class="form-group col-md-3">
                        <label for="name"><b>Name*</b></label>
                        <input type="text" class="form-control" id="name" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="phone_number"><b>Phone Number*</b></label>
                        <input type="text" class="form-control" id="phone_number" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="whatsapp_number"><b>Whatsapp Number</b></label>
                        <input type="text" class="form-control" id="whatsapp_number" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="form-group col-md-5">
                        <label for="address"><b>Details</b></label>
                        <textarea class="form-control" id="address" rows="3" disabled></textarea>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="alternate_number"><b>Alternate Contact Number*</b></label>
                        <input type="text" class="form-control" id="alternate_number" disabled>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="kyc" role="tabpanel" aria-labelledby="kyc-tab">
                <div class="row mb-4 mt-3">
                    <div class="form-group col-md-5">
                        <label for="aadhar_number"><b>Aadhar Number</b></label>
                        <input type="text" class="form-control" id="aadhar_number" disabled>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="aadhar_attachment"><b>Attach Aadhar</b></label>
                        <input type="file" class="form-control" id="aadhar_attachment" disabled>
                    </div>
                </div>
                <div class="row mb-4 mt-3">
                    <div class="form-group col-md-5">
                        <label for="pan_number"><b>PAN Number</b></label>
                        <input type="text" class="form-control" id="pan_number" disabled>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="pan_attachment"><b>Attach PAN</b></label>
                        <input type="file" class="form-control" id="pan_attachment" disabled>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="loans" role="tabpanel" aria-labelledby="loans-tab">
                <div class="row gy-3">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Product Type</th>
                                        <th scope="col">Loan Number</th>
                                        <th scope="col">Bank</th>
                                        <th scope="col">Employee</th>
                                        <th scope="col">Reffered By</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Home Loan</td>
                                        <td>1234567</td>
                                        <td>SBI</td>
                                        <td>Mounika</td>
                                        <td>Deepak</td>
                                        <td>10000</td>
                                        <td>
                                            <i class="fas fa-check-circle text-success"></i>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="" class="btn btn-view btn-sm me-2 rounded">
                                                    View
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row mb-4">
            <div class="col-md-12 d-flex justify-content-end">
                <div class="form-group mb-2 mr-3">
                    <button type="button" class="btn btn-cancel btn-block">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
