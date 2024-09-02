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

        <form id="update_form">
            <div class="tab-content" id="tabcontent">
                <div class="row mb-4 mt-3">
                    <div class="form-group col-md-4">
                        <label for="name"><b>Service Name*</b></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Service Name"
                            value="{{ $service->name }}">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="details"><b>Details</b></label>
                        <textarea class="form-control" id="details" name="details" placeholder="Enter Details" rows="3">
                        {{ $service->details }} </textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="frequency_type"><b>Frequency*</b></label>
                        <select id="frequency_type" name="frequency_type" class="form-select">
                            @error('frequency')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <option value="">Select Frequency</option>
                            <option value="monthly" {{ $service->frequency === 'monthly' ? 'selected' : '' }}>Monthly
                            </option>
                            <option value="quarterly" {{ $service->frequency === 'quarterly' ? 'selected' : '' }}>
                                Quarterly</option>
                            <option value="biannually" {{ $service->frequency === 'biannually' ? 'selected' : '' }}>Bi
                                Annually</option>
                            <option value="annually" {{ $service->frequency === 'annually' ? 'selected' : '' }}>
                                Annually</option>
                            <option value="onetime" {{ $service->frequency === 'onetime' ? 'selected' : '' }}>One-Time
                            </option>
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
                                    @foreach (['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august',
                                    'september', 'october', 'november', 'december'] as $month)
                                    @php
                                    $monthKey = strtolower($month);
                                    $isSelected = isset($occurences['monthly'][ucfirst($month)]);
                                    $fromDay = $isSelected ? $occurences['monthly'][ucfirst($month)]['from_day'] : '';
                                    $toDay = $isSelected ? $occurences['monthly'][ucfirst($month)]['to_day'] : '';
                                    @endphp
                                    <tr data-row_id="{{ $loop->index }}">
                                        <td>
                                            <input type="checkbox" data-row_id="{{ $loop->index }}"
                                                class="form-check-input select_month"
                                                {{ $isSelected ? 'checked' : '' }}>
                                        </td>
                                        <td class="month_name" data-row_id="{{ $loop->index }}">{{ ucfirst($month) }}
                                        </td>
                                        <td>
                                            <input type="number" name="from_day[{{ $loop->index }}]"
                                                data-row_id="{{ $loop->index }}" class="form-control from_day" min="1"
                                                max="31" value="{{ $fromDay }}">
                                        </td>
                                        <td>
                                            <input type="number" name="to_day[{{ $loop->index }}]"
                                                data-row_id="{{ $loop->index }}" class="form-control to_day" min="1"
                                                max="31" value="{{ $toDay }}">
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
                                        <th>From Month</th>
                                        <th>From Day</th>
                                        <th>To Month</th>
                                        <th>To Day</th>
                                    </tr>
                                </thead>

                                <tbody id="quarterly_table">
                                    @foreach ([
                                    'january-march' => 'January-March',
                                    'april-june' => 'April-June',
                                    'july-september' => 'July-September',
                                    'october-december' => 'October-December'
                                    ] as $index => $label)
                                    @php
                                    $isSelected = isset($occurences['quarterly'][$label]);
                                    $fromMonth = $isSelected ? $occurences['quarterly'][$label]['from_month'] : '';
                                    $fromDay = $isSelected ? $occurences['quarterly'][$label]['from_day'] : '';
                                    $toMonth = $isSelected ? $occurences['quarterly'][$label]['to_month'] : '';
                                    $toDay = $isSelected ? $occurences['quarterly'][$label]['to_day'] : '';
                                    @endphp
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="quarter_{{ $index }}"
                                                name="quarter_name[{{ $index }}]" value="{{ $index }}"
                                                class="form-check-input select_month" data-row_id="{{ $index }}"
                                                {{ $isSelected ? 'checked' : '' }}>
                                        </td>
                                        <td class="quarter_name">{{ $label }}</td>
                                        <td>
                                            <select id="from_month_{{ $index }}" name="from_month[{{ $index }}]"
                                                data-row_id="{{ $index }}" class="form-select from_month">
                                                <option value="">Select Month</option>
                                                @if ($index == 'january-march')
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                @elseif ($index == 'april-june')
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                @elseif ($index == 'july-september')
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                @elseif ($index == 'october-december')
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="from_day[{{ $index }}]"
                                                class="form-control from_day" min="1" max="31" value="{{ $fromDay }}"
                                                data-row_id="{{ $index }}">
                                        </td>
                                        <td>
                                            <select id="to_month_{{ $index }}" name="to_month[{{ $index }}]"
                                                data-row_id="{{ $index }}" class="form-select to_month">
                                                <option value="">Select Month</option>
                                                @if ($index == 'january-march')
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                @elseif ($index == 'april-june')
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                @elseif ($index == 'july-september')
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                @elseif ($index == 'october-december')
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="to_day[{{ $index }}]" class="form-control to_day"
                                                min="1" max="31" value="{{ $toDay }}" data-row_id="{{ $index }}">
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
                                        <th>From Month</th>
                                        <th>From Day</th>
                                        <th>To Month</th>
                                        <th>To Day</th>
                                    </tr>
                                </thead>
                                <tbody id="biannually_table">
                                    @foreach ([
                                    'first' => 'January-June',
                                    'second' => 'July-December'
                                    ] as $index => $label)
                                    @php
                                    $isSelected = isset($occurences['biannually'][$index]);
                                    $fromMonth = $isSelected ? $occurences['biannually'][$index]['from_month'] : '';
                                    $fromDay = $isSelected ? $occurences['biannually'][$index]['from_day'] : '';
                                    $toMonth = $isSelected ? $occurences['biannually'][$index]['to_month'] : '';
                                    $toDay = $isSelected ? $occurences['biannually'][$index]['to_day'] : '';
                                    @endphp
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="biannual_{{ $index }}"
                                                name="biannually_type_list[{{ $index }}][biannual_name]"
                                                value="{{ $index }}" class="form-check-input select_month"
                                                data-row_id="{{ $index }}" {{ $isSelected ? 'checked' : '' }}>
                                        </td>
                                        <td class="biannual_name">{{ $label }}</td>
                                        <td>
                                            <select id="from_month_{{ $index }}"
                                                name="biannually_type_list[{{ $index }}][from_month]"
                                                data-row_id="{{ $index }}" class="form-select from_month">
                                                <option value="">Select Month</option>
                                                @foreach ([
                                                'January' => 'January',
                                                'February' => 'February',
                                                'March' => 'March',
                                                'April' => 'April',
                                                'May' => 'May',
                                                'June' => 'June',
                                                'July' => 'July',
                                                'August' => 'August',
                                                'September' => 'September',
                                                'October' => 'October',
                                                'November' => 'November',
                                                'December' => 'December'
                                                ] as $month_value => $month_label)
                                                <option value="{{ $month_value }}"
                                                    {{ $month_value === $fromMonth ? 'selected' : '' }}>
                                                    {{ $month_label }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="biannually_type_list[{{ $index }}][from_day]"
                                                class="form-control from_day" min="1" max="31" value="{{ $fromDay }}">
                                        </td>
                                        <td>
                                            <select id="to_month_{{ $index }}"
                                                name="biannually_type_list[{{ $index }}][to_month]"
                                                class="form-select to_month">
                                                <option value="">Select Month</option>
                                                @foreach ([
                                                'January' => 'January',
                                                'February' => 'February',
                                                'March' => 'March',
                                                'April' => 'April',
                                                'May' => 'May',
                                                'June' => 'June',
                                                'July' => 'July',
                                                'August' => 'August',
                                                'September' => 'September',
                                                'October' => 'October',
                                                'November' => 'November',
                                                'December' => 'December'
                                                ] as $month_value => $month_label)
                                                <option value="{{ $month_value }}"
                                                    {{ $month_value === $toMonth ? 'selected' : '' }}>
                                                    {{ $month_label }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="biannually_type_list[{{ $index }}][to_day]"
                                                class="form-control to_day" min="1" max="31" value="{{ $toDay }}">
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
                <div class="col-md-12 card-wrapper" id="onetime-card" style="display: none;">
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
                                <tbody id="onetime_table">
                                    @foreach ($occurences['onetime'] as $index => $service_occurence)
                                    <tr>
                                        <td>
                                            <input type="date" data-row_id="{{ $index }}" class="form-control from_date"
                                                value="{{ $service_occurence['from_date'] ?? '' }}">
                                        </td>
                                        <td>
                                            <input type="date" data-row_id="{{ $index }}" class="form-control to_date"
                                                value="{{ $service_occurence['to_date'] ?? '' }}">
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
                                        <th>From Month</th>
                                        <th>From Day</th>
                                        <th>To Month</th>
                                        <th>To Day</th>
                                    </tr>
                                </thead>
                                <tbody id="annually_table">
                                    @foreach ($occurences['annually'] as $index => $dates)
                                    <tr>
                                        <td>
                                            <select name="from_month[{{ $index }}]" class="form-select from_month"
                                                data-row_id="{{ $index }}">
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
                                                    {{ $month_value === strtolower($dates['from_month']) ? 'selected' : '' }}>
                                                    {{ $month_label }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="from_day[{{ $index }}]"
                                                class="form-control from_day" min="1" max="31"
                                                value="{{ $dates['from_day'] ?? '' }}">
                                        </td>
                                        <td>
                                            <select name="to_month[{{ $index }}]" class="form-select to_month"
                                                data-row_id="{{ $index }}">
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
                                                    {{ $month_value === strtolower($dates['to_month']) ? 'selected' : '' }}>
                                                    {{ $month_label }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="to_day[{{ $index }}]" class="form-control to_day"
                                                min="1" max="31" value="{{ $dates['to_day'] ?? '' }}">
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
                        <button type="button" class="btn btn-save btn-block" id="save_btn">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        function toggleFrequencyCard() {
            var selectedFrequency = $('#frequency_type').val();
            $('.card-wrapper').hide();
            $('#' + selectedFrequency + '-card').show();
        }
        toggleFrequencyCard();
        $('#frequency_type').on('change', toggleFrequencyCard);
        function setInitialFieldValues() {
            $('.card-wrapper').each(function() {
                $(this).find('input[type="checkbox"]').each(function() {

                    if ($(this).data('checked') === true) {
                        $(this).prop('checked', true);
                    }
                });

                $(this).find('input[type="text"]').each(function() {
                    var inputValue = $(this).data('value');
                    if (inputValue) {
                        $(this).val(inputValue);
                    }
                });
            });
        }
        setInitialFieldValues();
    });


    var monthly_type_list = [];

   function updateMonthlyList() {
    monthly_type_list = [];
    $('#monthly_table .select_month:checked').each(function() {
        var row_id = $(this).data('row_id');
        var month_name = $(`.month_name[data-row_id="${row_id}"]`).text().trim();
        var from_day = $(`.from_day[data-row_id="${row_id}"]`).val();
        var to_day = $(`.to_day[data-row_id="${row_id}"]`).val();

        if (from_day && to_day) { // Add a check to ensure valid day values
            monthly_type_list.push({
                month_name: month_name,
                from_day: from_day,
                to_day: to_day
            });
        }
    });
    console.log("monthly:", monthly_type_list);
}

 $(document).on('change', 'input:checkbox, input.from_day, input.to_day', function() {
    updateMonthlyList();
});
$('#save_btn').click(function(e) {
    e.preventDefault();
    var name = $('#name').val();
    var details = $('#details').val();
    var frequency_type = $('#frequency_type').val();

    if (frequency_type === "monthly") {
        console.log("Sending data:", {
            name: name,
            details: details,
            frequency_type: frequency_type,
            monthly_type_list: monthly_type_list,
            _token: '{{ csrf_token() }}'
        });

        $.ajax({
            url: '{{ route('services.updateMonthly', $service->id) }}',
            method: 'POST',
            data: {
                name: name,
                details: details,
                frequency_type: frequency_type,
                monthly_type_list: monthly_type_list,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log("Success:", response);
                window.location.href = '{{ route('services.index') }}';
            },
            error: function(xhr) {
                console.log("Error:", xhr.responseText);
            }
        });
    }
});


var quarterly_type_list = [];
function updateQuarterlyList() {
    quarterly_type_list = [];
    $('#quarterly_table .select_month:checked').each(function() {
        var row_id = $(this).attr('data-row_id');
        var quarter_name = $(this).closest('tr').find('.quarter_name').text().trim();
        var from_month = $(`select.from_month[data-row_id="${row_id}"]`).val();
        var to_month = $(`select.to_month[data-row_id="${row_id}"]`).val();
        var from_day = $(`input.from_day[data-row_id="${row_id}"]`).val();
        var to_day = $(`input.to_day[data-row_id="${row_id}"]`).val();

        quarterly_type_list.push({
            quarter_name: quarter_name,
            from_day: from_day,
            to_day: to_day,
            from_month: from_month,
            to_month: to_month,
        });
    });
    console.log("quarterly:", quarterly_type_list);
}

$(document).on('change', 'input:checkbox, input.from_day, input.to_day, select.from_month, select.to_month', function() {
    updateQuarterlyList();
});


$('#save_btn').click(function(e) {
    e.preventDefault();
    var name = $('#name').val();
    var details = $('#details').val();
    var frequency_type = $('#frequency_type').val();
    if (frequency_type === "quarterly") {
        $.ajax({
            url: '{{ route('services.updateQuarterly', $service->id) }}',
            method: 'POST',
            data: {
                name: name,
                details: details,
                frequency_type: frequency_type,
                quarterly_type_list: quarterly_type_list,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                window.location.href = '{{ route('services.index') }}';
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
});


var biannually_type_list = [];
function updateBiannuallyList() {
    biannually_type_list = [];
    $('#biannually_table .select_month:checked').each(function() {
        var row_id = $(this).data('row_id');
          var biannual_name = row_id === 'january-june' ? 'first' : 'second';
        var from_month = $(`select.from_month[data-row_id="${row_id}"]`).val();
        var to_month = $(`select.to_month[data-row_id="${row_id}"]`).val();
        var from_day = $(`input.from_day[data-row_id="${row_id}"]`).val();
        var to_day = $(`input.to_day[data-row_id="${row_id}"]`).val();

        biannually_type_list.push({
            biannual_name: biannual_name,
            from_day: from_day,
            to_day: to_day,
            from_month: from_month,
            to_month: to_month,
        });
    });
    console.log("biannually:", biannually_type_list);
}

$(document).on('change', 'input:checkbox, input.from_day, input.to_day, select.from_month, select.to_month', function() {
    updateBiannuallyList();
});

$('#save_btn').click(function(e) {
    e.preventDefault();
    console.log('Saving biannually data...');
    var name = $('#name').val();
    var details = $('#details').val();
    var frequency_type = $('#frequency_type').val();
    console.log('Frequency Type:', frequency_type);

    if (frequency_type === "biannually") {
        $.ajax({
            url: '{{ route('services.updateBiAnnually', $service->id) }}',
            method: 'POST',
            data: {
                name: name,
                details: details,
                frequency_type: frequency_type,
                biannually_type_list: biannually_type_list,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log('Success:', response);
                window.location.href = '{{ route('services.index') }}';
            },
            error: function(xhr) {
                console.log('Error:', xhr.responseText);
            }
        });
    }
});

var annually_type_list = [];
function updateAnnuallyList() {
    annually_type_list = [];
    $('#annually_table tr').each(function() {
        var row_id = $(this).find('.from_month').data('row_id');
        var from_month = $(this).find('.from_month').val();
        var to_month = $(this).find('.to_month').val();
        var from_day = $(this).find('.from_day').val();
        var to_day = $(this).find('.to_day').val();

        annually_type_list.push({
            from_day: from_day,
            to_day: to_day,
            from_month: from_month,
            to_month: to_month,
        });
    });
    console.log("annually:", annually_type_list);
}

$(document).on('change', 'input.from_day, input.to_day, select.from_month, select.to_month', function() {
    updateAnnuallyList();
});

$('#save_btn').click(function(e) {
    e.preventDefault();
    var name = $('#name').val();
    var details = $('#details').val();
    var frequency_type = $('#frequency_type').val();

    if (frequency_type === "annually") {
        $.ajax({
            url: '{{ route('services.updateAnnually', $service->id) }}',
            method: 'POST',
            data: {
                name: name,
                details: details,
                frequency_type: frequency_type,
                annually_type_list: annually_type_list,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log('Success:', response);
                window.location.href = '{{ route('services.index') }}';
            },
            error: function(xhr) {
                console.log('Error:', xhr.responseText);
            }
        });
    }
});

var onetime_type_list = [];
function updateonetimeList() {
    onetime_type_list = [];
    $('#onetime_table tr').each(function() {
        var row_id = $(this).find('.from_date').data('row_id');
        var from_date = $(this).find('.from_date').val();
        var to_date = $(this).find('.to_date').val();

            onetime_type_list.push({
                from_date: from_date,
                to_date: to_date,
            });
    });
    console.log("onetime:", onetime_type_list);
}

$(document).on('change', 'input.from_date, input.to_date', function() {
    updateonetimeList();
});

$('#save_btn').click(function(e) {
    e.preventDefault();
    var name = $('#name').val();
    var details = $('#details').val();
    var frequency_type = $('#frequency_type').val();

    if (frequency_type === "onetime") {
    $.ajax({
    url: '{{ route('services.updateOneTime', $service->id) }}',
    method: 'POST',
    data: JSON.stringify({
        name: name,
        details: details,
        frequency_type: frequency_type,
        onetime_type_list: onetime_type_list,
        _token: '{{ csrf_token() }}'
    }),
    contentType: 'application/json',
    success: function(response) {
        window.location.href = '{{ route('services.index') }}';
    },
    error: function(xhr) {
        console.log(xhr.responseText);
    }
});
    }
});
</script>

@endsection
