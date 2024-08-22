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

        <div class="tab-content" id="tabcontent">
            <div class="row mb-4 mt-3">
                <div class="form-group col-md-4">
                    <label for="service_name"><b>Service Name*</b></label>
                    <input type="text" class="form-control" id="service_name" name="service_name"
                        placeholder="Enter Service Name">
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
                    <label for="frequency_type"><b>Frequency*</b></label>
                    <select id="frequency_type" name="frequency_type" class="form-select">
                        @error('frequency_type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <option value="">Select Frequency</option>
                        <option value="monthly">Monthly</option>
                        <option value="quarterly">Quarterly</option>
                        <option value="biannually">Bi Annually</option>
                        <option value="annually">Annually</option>
                        <option value="one-time">One-Time</option>
                    </select>
                    @error('frequency_type')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12 card-wrapper" id="monthly-card" style="display: none;">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Monthly</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Month Name</th>
                                    <th>From Day</th>
                                    <th>To Day</th>
                                </tr>
                            </thead>
                            <tbody id="monthly_table">
                                @php
                                $index = 0;
                                @endphp
                                @foreach (['january', 'february', 'march', 'april', 'may', 'june', 'july',
                                'august', 'september', 'october', 'november', 'december'] as $month)
                                <tr data-row_id="{{ $index }}">
                                    <td>
                                        <input type="checkbox" id="month_{{ $month }}" name="months[]"
                                            data-row_id="{{ $index }}" value="{{ $month }}" class="form-check-input">
                                    </td>
                                    <td>{{ ucfirst($month) }}</td>
                                    <td>
                                        <input type="number" id="fromDay_{{ $month }}" name="from_day[{{ $month }}]"
                                            class="form-control" min="1" max="31">
                                    </td>
                                    <td>
                                        <input type="number" id="toDay_{{ $month }}" name="to_day[{{ $month }}]"
                                            class="form-control" min="1" max="31">
                                    </td>
                                </tr>
                                @php
                                $index++;
                                @endphp
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12 card-wrapper" id="quarterly-card" style="display: none;">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Quarterly</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Quarter Name</th>
                                    <th>Select Month</th>
                                    <th>From Day</th>
                                    <th>To Day</th>
                                </tr>
                            </thead>
                            <tbody id="quarterly_table">
                                @foreach ([
                                'january-march' => 'January-March',
                                'april-june' => 'April-June',
                                'july-september' => 'July-September',
                                'october-december' => 'October-December'
                                ] as $value => $label)
                                <tr>s+moFqlXmvCk
                                    <td>
                                        <input type="checkbox" id="quarter_{{ $value }}" name="quarter_name"
                                            value="{{ $value }}" class="form-check-input">
                                    </td>
                                    <td>{{ $label }}</td>
                                    <td>
                                        <select id="month_{{ $value }}" name="month_name[{{ $value }}]"
                                            class="form-select">
                                            <option value="">Select Month</option>
                                            @if ($value == 'january-march')
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            @elseif ($value == 'april-june')
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            @elseif ($value == 'july-september')
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            @elseif ($value == 'october-december')
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" id="fromDay_{{ $value }}" name="from_day[{{ $value }}]"
                                            class="form-control" min="1" max="31">
                                    </td>
                                    <td>
                                        <input type="number" id="toDay_{{ $value }}" name="to_day[{{ $value }}]"
                                            class="form-control" min="1" max="31">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12 card-wrapper" id="biannually-card" style="display: none;">
                <div class="card">
                    <div class="card-header text-center">
                        <h5> Bi Annually</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Biannual Name</th>
                                    <th>Select Month</th>
                                    <th>From Day</th>
                                    <th>To Day</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ([
                                'january-june' => 'January-June',
                                'july-december' => 'July-December'
                                ] as $value => $label)
                                <tr>
                                    <td>
                                        <input type="checkbox" id="biannual_{{ $value }}" name="biannual_name"
                                            value="{{ $value }}" class="form-check-input">
                                    </td>
                                    <td>{{ $label }}</td>
                                    <td>
                                        <select id="month_{{ $value }}" name="month_name[{{ $value }}]"
                                            class="form-select">
                                            <option value="">Select Month</option>
                                            @if ($value == 'january-june')
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            @elseif ($value == 'july-december')
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="November">October</option>
                                            <option value="June">November</option>
                                            <option value="December">December</option>
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" id="fromDay_{{ $value }}" name="from_day[{{ $value }}]"
                                            class="form-control" min="1" max="31">
                                    </td>
                                    <td>
                                        <input type="number" id="toDay_{{ $value }}" name="to_day[{{ $value }}]"
                                            class="form-control" min="1" max="31">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12 card-wrapper" id="one-time-card" style="display: none;">
                <div class="card">
                    <div class="card-header text-center">
                        <h5> One Time</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (['range_1'] as $index => $range)
                                <tr>
                                    <td>
                                        <input type="date" id="fromDate_{{ $index }}" name="from_day[{{ $index }}]"
                                            class="form-control">
                                    </td>
                                    <td>
                                        <input type="date" id="toDate_{{ $index }}" name="to_day[{{ $index }}]"
                                            class="form-control">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="row mb-4">
            <div class="col-md-12 card-wrapper" id="annually-card" style="display: none;">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Annually</h5>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>From Month</th>
                                    <th>From Day</th>
                                    <th>To Month</th>
                                    <th>To Day</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ([
                                'january-december' => ['from_month' => 'January', 'from_day' => 1, 'to_month' =>
                                'December', 'to_day' => 31]
                                ] as $value => $dates)
                                <tr>
                                    <td>
                                        <input type="checkbox" id="annual_{{ $value }}" name="annual_names"
                                            value="{{ $value }}" class="form-check-input">
                                    </td>
                                    <td>
                                        <select id="fromMonth_{{ $value }}" name="from_month[{{ $value }}]"
                                            class="form-select mb-2">
                                            <option value="">Select Month</option>
                                            @foreach ([
                                            'january' => 'January',
                                            'february' => 'February',
                                            'march' => 'March',
                                            'april' => 'April',
                                            'may' => 'May',
                                            'june' => 'June',
                                            'july' => 'July',
                                            'august' => 'August',
                                            'september' => 'September',
                                            'october' => 'October',
                                            'november' => 'November',
                                            'december' => 'December'
                                            ] as $month_value => $month_label)
                                            <option value="{{ $month_value }}"
                                                {{ $month_value === $dates['from_month'] ? 'selected' : '' }}>
                                                {{ $month_label }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" id="toDay_{{ $value }}" name="to_day[{{ $value }}]"
                                            class="form-control" min="1" max="31" value="{{ $dates['to_day'] }}">
                                    </td>
                                    <td>
                                        <select id="toMonth_{{ $value }}" name="to_month[{{ $value }}]"
                                            class="form-select mb-2">
                                            <option value="">Select Month</option>
                                            @foreach ([
                                            'january' => 'January',
                                            'february' => 'February',
                                            'march' => 'March',
                                            'april' => 'April',
                                            'may' => 'May',
                                            'june' => 'June',
                                            'july' => 'July',
                                            'august' => 'August',
                                            'september' => 'September',
                                            'october' => 'October',
                                            'november' => 'November',
                                            'december' => 'December'
                                            ] as $month_value => $month_label)
                                            <option value="{{ $month_value }}"
                                                {{ $month_value === $dates['to_month'] ? 'selected' : '' }}>
                                                {{ $month_label }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" id="toDay_{{ $value }}" name="to_day[{{ $value }}]"
                                            class="form-control" min="1" max="31" value="{{ $dates['to_day'] }}">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

<script>
    $(document).ready(function() {
    $('#frequency_type').on('change', function() {
        var selectedType = $(this).val();
        $('.card-wrapper').hide();
        if (selectedType) {
            $('#' + selectedType + '-card').show();
        }
    });
var monthly_type_list = [];
function updateMonthlyList() {
    monthly_type_list = [];
    $('#monthly_table input:checked').each(function() {
        var row_id = $(this).data('row_id');
        var month_name = $(this).closest('tr').find('td').eq(1).text().trim();
        var from_day = $(this).closest('tr').find('.from_day').val();
        var to_day = $(this).closest('tr').find('.to_day').val();

        monthly_type_list.push({
            month_name: month_name,
            from_day: from_day,
            to_day: to_day
        });
    });
}

$(document).on('change', 'input:checkbox, input.from_day, input.to_day', function() {
    updateMonthlyList();
});

$('#save_btn').click(function(e) {
    e.preventDefault();
    var frequency_type = $('#frequency_type').val();
    if (frequency_type === "monthly") {
        $.ajax({
            url: '{{ route('services.storeMonthly') }}',
            method: 'POST',
            data: { monthly_type_list: monthly_type_list, _token: '{{ csrf_token() }}' },
            success: function(response) {
                window.location.href = response.redirect_url;
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
});

var quarterly_type_list = [];
function updateQuarterlyList() {
    quarterly_type_list = [];
    $('#quarterly_table input:checked').each(function() {
        var row_id = $(this).data('row_id');
        var quarter_name = $(this).closest('tr').find('td').eq(2).text().trim();
        var from_day = $(this).closest('tr').find('.from_day').val();
        var to_day = $(this).closest('tr').find('.to_day').val();

        quarterly_type_list.push({
            quarter_name: quarter_name,
            from_day: from_day,
            to_day: to_day
        });
    });
}

$(document).on('change', 'input:checkbox, input.from_day, input.to_day', function() {
    updateQuarterlyList();
});

$('#save_btn').click(function(e) {
    e.preventDefault();
    var frequency_type = $('#frequency_type').val();
    if (frequency_type === "quarterly") {
        $.ajax({
            url: '{{ route('services.storeQuarterly') }}',
            method: 'POST',
            data: { quarterly_type_list: quarterly_type_list, _token: '{{ csrf_token() }}' },
            success: function(response) {
                window.location.href = response.redirect_url;
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
});
});
</script>
@endsection
