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
                <li class="breadcrumb-item active" aria-current="page">Service Master</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0"><b>Edit Service Master</b></h3>
        </div>
        <hr>

        <div class="tab-content" id="tabcontent">
            <div class="row mb-4 mt-3">
                <div class="form-group col-md-4">
                    <label for="service_name"><b>Service Name*</b></label>
                    <input type="text" class="form-control" id="service_name" placeholder="Enter Service Name">
                </div>
                <div class="form-group col-md-4">
                    <label for="details"><b>Details</b></label>
                    <textarea class="form-control" id="details" placeholder="Enter Details" rows="3"></textarea>
                </div>
                <div class="form-group col-md-4">
                    <label for="frequency"><b>Frequency*</b></label>
                    <select id="frequency" class="form-select">
                        <option value="">Select Frequency</option>
                        <option value="monthly">Monthly</option>
                        <option value="quarterly">Quarterly</option>
                        <option value="biannually">Bi Annually</option>
                        <option value="annually">Annually</option>
                        <option value="one-time">One - Time</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12 d-flex justify-content-end">
            <div class="form-group mb-2 me-3">
                <button type="button" class="btn btn-cancel">Cancel</button>
            </div>
            <div class="form-group mb-2">
                <button type="submit" class="btn btn-save">Update</button>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center">
                Monthly
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="month" class="form-label">Month Name</label>
                        <select id="month" class="form-select mb-2">
                            <option selected>Select Month</option>
                            <option value="january">January</option>
                            <option value="february">February</option>
                            <option value="march">March</option>
                            <option value="april">April</option>
                            <option value="may">May</option>
                            <option value="june">June</option>
                            <option value="july">July</option>
                            <option value="august">August</option>
                            <option value="september">September</option>
                            <option value="october">October</option>
                            <option value="november">November</option>
                            <option value="december">December</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="fromDay" class="form-label">From Day</label>
                        <input type="number" id="fromDay" class="form-control mb-2" min="1" max="31" value="1">
                        <label for="toDay" class="form-label">To Day</label>
                        <input type="number" id="toDay" class="form-control" min="1" max="31" value="31">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center">
                Quarterly
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="fromMonth" class="form-label">From</label>
                        <select class="form-select mb-2">
                            <option selected>Select Month</option>
                            <option value="">January-March</option>
                            <option value="">April-June</option>
                            <option value="">July-September</option>
                            <option value="">October-December</option>
                        </select>
                        <input type="number" class="form-control" min="1" max="31" value="1">
                    </div>
                    <div class="col-md-6">
                        <label for="toMonth" class="form-label">To</label>
                        <select class="form-select mb-2">
                            <option selected>Select Month</option>
                            <option value="">January-March</option>
                            <option value="">April-June</option>
                            <option value="">July-September</option>
                            <option value="">October-December</option>
                        </select>
                        <input type="number" class="form-control" min="1" max="31" value="31">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    One Time
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label for="fromDate" class="form-label">From Date *</label>
                            <input type="date" class="form-control" id="fromDate">
                        </div>
                        <div class="col-md-5">
                            <label for="toDate" class="form-label">To Date *</label>
                            <input type="date" class="form-control" id="toDate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button type="button" class="btn btn-secondary me-2">Cancel</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Annual
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fromMonth" class="form-label">From</label>
                            <select class="form-select mb-2">
                                <option selected>Select Month</option>
                                <option value="january">Select January</option>
                                <option value="february">February</option>
                                <option value="march">March</option>
                                <option value="april">April</option>
                                <option value="may">May</option>
                                <option value="june">June</option>
                                <option value="july">July</option>
                                <option value="august">August</option>
                                <option value="september">September</option>
                                <option value="october">October</option>
                                <option value="november">November</option>
                                <option value="december">December</option>
                            </select>
                            <input type="number" class="form-control" min="1" max="31" value="1">
                        </div>
                        <div class="col-md-6">
                            <label for="toMonth" class="form-label">To</label>
                            <select class="form-select mb-2">
                                <option selected>Select Month</option>
                                <option value="january">Select January</option>
                                <option value="february">February</option>
                                <option value="march">March</option>
                                <option value="april">April</option>
                                <option value="may">May</option>
                                <option value="june">June</option>
                                <option value="july">July</option>
                                <option value="august">August</option>
                                <option value="september">September</option>
                                <option value="october">October</option>
                                <option value="november">November</option>
                                <option value="december">December</option>
                            </select>
                            <input type="number" class="form-control" min="1" max="31" value="31">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Bi-Annually
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fromMonth" class="form-label">From</label>
                            <select class="form-select mb-2">
                                <option selected>Select Month</option>
                                <option value="">January-June</option>
                                <option value="">July-December</option>
                            </select>
                            <input type="number" class="form-control" min="1" max="31" value="1">
                        </div>
                        <div class="col-md-6">
                            <label for="toMonth" class="form-label">To</label>
                            <select class="form-select mb-2">
                                <option selected>Select Month</option>
                                <option value="">January-June</option>
                                <option value="">July-December</option>
                            </select>
                            <input type="number" class="form-control" min="1" max="31" value="31">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
