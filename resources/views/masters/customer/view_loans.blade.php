@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/customer_checklist.css') }}">
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Parties</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Customer</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0"><b>View Loans</b></h3>
        </div>
        <hr>
        <div class="row mb-4">
            <div class="form-group col-md-4">
                <label for="loan_number"><b>Loan No</b></label>
                <input type="text" class="form-control" id="loan_number" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="application_date"><b>Application Date</b></label>
                <input type="date" class="form-control" id="application_date" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="product_type"><b>Product Type</b></label>
                <input type="text" class="form-control" id="product_type" disabled>
            </div>
        </div>
        <div class="row mb-4">
            <div class="form-group col-md-4">
                <label for="applied_amount"><b>Applied Amount</b></label>
                <input type="value" class="form-control" id="applied_amount" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="bank"><b>Bank</b></label>
                <input type="text" class="form-control" id="bank" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="sanctioned_date"><b>Sanctioned Date</b></label>
                <input type="date" class="form-control" id="sanctioned_date" disabled>
            </div>
        </div>
        <div class="row mb-4">
            <div class="form-group col-md-4">
                <label for="sanctioned_amount"><b>Sanctioned Amount</b></label>
                <input type="value" class="form-control" id="sanctioned_amount" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="no_of_disbursement"><b>No of Disbursement</b></label>
                <input type="value" class="form-control" id="no_of_disbursement" disabled>
            </div>
            <div class="form-group col-md-4">
                <label for="total_disbursement_amount"><b>Total Disbursement Amount</b></label>
                <input type="value" class="form-control" id="total_disbursement_amount" disabled>
            </div>
        </div>
        <div class="row mb-4">
            <div class="form-group col-md-4">
                <label for="status"><b>Status</b></label>
                <input type="text" class="form-control" id="status" disabled>
            </div>
        </div>

        <div class="form-row mb-4">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Expected Disbursement Date</th>
                            <th scope="col">Expected Disbursement Amount</th>
                            <th scope="col">Disbursement Date</th>
                            <th scope="col">Disbursement Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>08/02/2024</td>
                            <td>100000</td>
                            <td>8/02/2024</td>
                            <td>100000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="form-row mb-4">
            <div class="col-md-12 d-flex justify-content-end">
                <div class="form-group mb-2 mr-3">
                    <button type="button" class="btn btn-cancel btn-block">Cancel</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
