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

        @csrf
        <div class="tab-content" id="tabcontent">
            <div class="row mb-4 mt-3">
                <div class="form-group col-md-4">
                    <label for="service_name"><b>Service Name*</b></label>
                    <input type="text" class="form-control" id="service_name" name="service_name"
                        placeholder="Enter Service Name" value="{{ $service->name }}">
                    @error('service_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="details"><b>Details</b></label>
                    <textarea class="form-control" id="details" name="details" placeholder="Enter Details" rows="3">
                    {{ $service->details }} </textarea>
                </div>
                <div class="form-group col-md-4">
                    <label for="frequency"><b>Frequency*</b></label>
                    <select id="frequency" name="frequency" class="form-select">
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
                                @php $index = 0; @endphp
                                @foreach (['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august',
                                'september', 'october', 'november', 'december'] as $month)
                                @php
                                $monthKey = strtolower($month);
                                $isSelected = isset($occurrences['monthly'][$monthKey]);
                                $fromDay = $isSelected ? $occurrences['monthly'][$monthKey]['from_day'] : '';
                                $toDay = $isSelected ? $occurrences['monthly'][$monthKey]['to_day'] : '';
                                @endphp
                                <tr data-row_id="{{ $index }}">
                                    <td>
                                        <input type="checkbox" data-row_id="{{ $index }}"
                                            class="form-check-input select_month" {{ $isSelected ? 'checked' : '' }}>
                                    </td>
                                    <td class="month_name" data-row_id="{{ $index }}">{{ ucfirst($month) }}</td>
                                    <td>
                                        <input type="number" data-row_id="{{ $index }}" class="form-control from_day"
                                            min="1" max="31" value="{{ $fromDay }}">
                                    </td>
                                    <td>
                                        <input type="number" data-row_id="{{ $index }}" class="form-control to_day"
                                            min="1" max="31" value="{{ $toDay }}">
                                    </td>
                                </tr>
                                @php $index++; @endphp
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
                                <tr>
                                    <td>
                                        <input type="checkbox" id="quarter_{{ $index }}" name="quarter_name"
                                            value="{{ $index }}" class="form-check-input select_month"
                                            data-row_id="{{ $index }}">
                                    </td>
                                    <td class="quarter_name" data-row_id="{{ $index }}">{{ $label }}</td>
                                    <td>
                                        <select id="month_{{ $index }}" name="from_month[{{ $index }}]"
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
                                        <input type="number" data-row_id="{{ $index }}" class="form-control from_day"
                                            min="1" max="31">
                                    </td>
                                    <td>
                                        <select id="month_{{ $index }}" name="to_month[{{ $index }}]"
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
                                        <input type="number" data-row_id="{{ $index }}" class="form-control to_day"
                                            min="1" max="31">
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
                                'january-june' => 'January-June',
                                'july-december' => 'July-December'
                                ] as $index => $label)
                                <tr>
                                    <td>
                                        <input type="checkbox" id="biannual_{{ $index }}" name="biannual_name"
                                            value="{{ $index }}" class="form-check-input select_month"
                                            data-row_id="{{ $index }}">
                                    </td>
                                    <td class="biannual_name" data-row_id="{{ $index }}">{{ $label }}</td>
                                    <td>
                                        <select id="month_{{ $index }}" name="from_month[{{ $index }}]"
                                            data-row_id="{{ $index }}" class="form-select from_month">
                                            <option value="">Select Month</option>
                                            @if ($index == 'january-june')
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            @elseif ($index == 'july-december')
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" data-row_id="{{ $index }}" class="form-control from_day"
                                            min="1" max="31">
                                    </td>
                                    <td>
                                        <select id="month_{{ $index }}" name="to_month[{{ $index }}]"
                                            class="form-select to_month" data-row_id="{{ $index }}">
                                            <option value="">Select Month</option>
                                            @if ($index == 'january-june')
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            @elseif ($index == 'july-december')
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                            @endif
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" data-row_id="{{ $index }}" class="form-control to_day"
                                            min="1" max="31">
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
                                @foreach (['range_1'] as $index => $range)
                                <tr>
                                    <td>
                                        <input type="date" data-row_id="{{ $index }}" class="form-control from_date">
                                    </td>
                                    <td>
                                        <input type="date" data-row_id="{{ $index }}" class="form-control to_date">
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
                                @foreach ([
                                'january-december' => ['from_month' => 'January', 'from_day' => 1, 'to_month' =>
                                'December', 'to_day' => 31]
                                ] as $index => $dates)
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
                                                {{ $month_value === $dates['from_month'] ? 'selected' : '' }}>
                                                {{ $month_label }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="from_day[{{ $index }}]" class="form-control from_day"
                                            min="1" max="31">

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
                                                {{ $month_value === $dates['to_month'] ? 'selected' : '' }}>
                                                {{ $month_label }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="to_day[{{ $index }}]" class="form-control to_day">
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
                    <button type="submit" class="btn btn-save btn-block" id="save_btn">Update</button>
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
            var selectedFrequency = $('#frequency').val();
            $('.card-wrapper').hide();
            $('#' + selectedFrequency + '-card').show();
        }
        toggleFrequencyCard();
        $('#frequency').on('change', toggleFrequencyCard);
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
</script>
@endsection
