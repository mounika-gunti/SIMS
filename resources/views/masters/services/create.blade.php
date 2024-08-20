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
            <h3 class="mb-0"><b>Add Service Master</b></h3>
        </div>
        <hr>

        <form action="{{ route('services.store') }}" method="POST">
            @csrf
            <div class="tab-content" id="tabcontent">
                <div class="row mb-4 mt-3">
                    <div class="form-group col-md-4">
                        <label for="service_name"><b>Service Name*</b></label>
                        <input type="text" class="form-control" id="service_name" name="service_name"
                            placeholder="Enter Service Name" required>
                        @error('service_name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="details"><b>Details</b></label>
                        <textarea class="form-control" id="details" name="details" placeholder="Enter Details"
                            rows="3"></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="frequency"><b>Frequency*</b></label>
                        <select id="frequency" name="frequency" class="form-select" required>
                            @error('frequency')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <option value="">Select Frequency</option>
                            <option value="monthly">Monthly</option>
                            <option value="quarterly">Quarterly</option>
                            <option value="biannually">Bi Annually</option>
                            <option value="annually">Annually</option>
                            <option value="one-time">One - Time</option>
                        </select>
                        @error('frequency')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-6 card-wrapper" id="monthly-card" style="display: none;">
                    <div class="card">
                        <div class="card-header text-center">
                            Monthly
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="month" class="form-label">Month Name</label>
                                    <select id="month" name="month_name" class="form-select mb-2">
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
                                    @error('month_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="fromDay" class="form-label">From Day</label>
                                    <input type="number" id="fromDay" name="from_day" class="form-control mb-2" min="1"
                                        max="31" value="1">
                                    <label for="toDay" class="form-label">To Day</label>
                                    <input type="number" id="toDay" name="to_day" class="form-control" min="1" max="31"
                                        value="31">
                                    @error('to_day')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 card-wrapper" id="quarterly-card" style="display: none;">
                    <div class="card">
                        <div class="card-header text-center">
                            Quarterly
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="from_month" class="form-label">From</label>
                                    <select id="from_month" name="from_month" class="form-select mb-2">
                                        <option selected>Select Month</option>
                                        <option value="january-march">January-March</option>
                                        <option value="april-june">April-June</option>
                                        <option value="july-september">July-September</option>
                                        <option value="october-december">October-December</option>
                                    </select>
                                    @error('to_day')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input type="number" id="from_day" name="from_day" class="form-control" min="1"
                                        max="31" value="1">
                                </div>
                                <div class="col-md-6">
                                    <label for="to_month" class="form-label">To</label>
                                    <select id="to_month" name="to_month" class="form-select mb-2">
                                        <option selected>Select Month</option>
                                        <option value="january-march">January-March</option>
                                        <option value="april-june">April-June</option>
                                        <option value="july-september">July-September</option>
                                        <option value="october-december">October-December</option>
                                    </select>
                                    <input type="number" id="from_day" name="from_day" class="form-control" min="1"
                                        max="31" value="31">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 card-wrapper" id="biannually-card" style="display: none;">
                    <div class="card">
                        <div class="card-header text-center">
                            Bi Annually
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="month_name" class="form-label">From</label>
                                    <select id="month_name" name="month_name" class="form-select mb-2">
                                        <option selected>Select Month</option>
                                        <option value="january-june">January-June</option>
                                        <option value="july-december">July-December</option>
                                    </select>
                                    <input type="number" id="from_day" name="from_day" class="form-control" min="1"
                                        max="31" value="1">
                                </div>
                                <div class="col-md-6">
                                    <label for="to_month" class="form-label">To</label>
                                    <select id="to_month" name="to_month" class="form-select mb-2">
                                        <option selected>Select Month</option>
                                        <option value="january-june">January-June</option>
                                        <option value="july-december">July-December</option>
                                    </select>
                                    <input type="number" id="toBiannualDay" name="to_biannual_day" class="form-control"
                                        min="1" max="31" value="31">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 card-wrapper" id="one-time-card" style="display: none;">
                    <div class="card">
                        <div class="card-header text-center">
                            One Time
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-5">
                                    <label for="fromDate" class="form-label">From Date *</label>
                                    <input type="date" class="form-control" id="fromDate" name="from_date" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="toDate" class="form-label">To Date *</label>
                                    <input type="date" class="form-control" id="toDate" name="to_date" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 card-wrapper" id="annually-card" style="display: none;">
                    <div class="card">
                        <div class="card-header text-center">
                            Annual
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="annualFromMonth" class="form-label">From</label>
                                    <select id="annualFromMonth" name="annual_from_month" class="form-select mb-2">
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
                                    <input type="number" id="annualFromDay" name="annual_from_day" class="form-control"
                                        min="1" max="31" value="1">
                                </div>
                                <div class="col-md-6">
                                    <label for="annualToMonth" class="form-label">To</label>
                                    <select id="annualToMonth" name="annual_to_month" class="form-select mb-2">
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
                                    <input type="number" id="annualToDay" name="annual_to_day" class="form-control"
                                        min="1" max="31" value="31">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row mb-4">
                <div class="col-md-12 d-flex justify-content-end">
                    <div class="form-group mb-2 mr-3">
                        <a href="{{ route('services.index') }}" class="btn btn-cancel btn-block">Cancel</a>
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit" class="btn btn-save btn-block">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#frequency').on('change', function() {
            var selectedFrequency = $(this).val();
            $('.card-wrapper').hide();
            if (selectedFrequency) {
                $('#' + selectedFrequency + '-card').show();
            }

            var isRequired = selectedFrequency === 'one-time';
            $('#fromDate').attr('required', isRequired);
            $('#toDate').attr('required', isRequired);
        });
    });
</script>
@endsection
