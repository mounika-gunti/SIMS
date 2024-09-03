@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/style.css') }}">

@section('title')
Reports
@endsection

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Masters</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Reports</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0"><b>Completed Reports</b></h3>
            <a href="{{ route('reports.export') }}" class="btn btn-primary btn-add">
                Export to Excel
            </a>
        </div>
        <hr>
        <div class="tab-content" id="tabcontent">
            <form id="searchForm" action="{{ route('reports.completed') }}" method="GET">
                <div class="row mb-4 mt-3 align-items-end">
                    <div class="form-group col-md-3">
                        <label for="month"><b>Month*</b></label>
                        <select id="month" name="month" class="form-select">
                            @error('month')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <option value="">Select Month</option>
                            <option value="january" {{ request('month') == 'january' ? 'selected' : '' }}>January
                            </option>
                            <option value="february" {{ request('month') == 'february' ? 'selected' : '' }}>February
                            </option>
                            <option value="march" {{ request('month') == 'march' ? 'selected' : '' }}>March</option>
                            <option value="april" {{ request('month') == 'april' ? 'selected' : '' }}>April</option>
                            <option value="may" {{ request('month') == 'may' ? 'selected' : '' }}>May</option>
                            <option value="june" {{ request('month') == 'june' ? 'selected' : '' }}>June</option>
                            <option value="july" {{ request('month') == 'july' ? 'selected' : '' }}>July</option>
                            <option value="august" {{ request('month') == 'august' ? 'selected' : '' }}>August</option>
                            <option value="september" {{ request('month') == 'september' ? 'selected' : '' }}>September
                            </option>
                            <option value="october" {{ request('month') == 'october' ? 'selected' : '' }}>October
                            </option>
                            <option value="november" {{ request('month') == 'november' ? 'selected' : '' }}>November
                            </option>
                            <option value="december" {{ request('month') == 'december' ? 'selected' : '' }}>December
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="year"><b>Year*</b></label>
                        <select id="year" name="year" class="form-select">
                            <option value="">Select Year</option>
                            @foreach($years as $year)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="service_name"><b>Service Name*</b></label>
                        <select id="service_name" name="service_name" class="form-select">
                            <option value="">Select Service</option>
                            @foreach($services as $service)
                            <option value="{{ $service->id }}"
                                {{ request('service_name') == $service->id ? 'selected' : '' }}>
                                {{ $service->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-primary btn-add">
                            Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row gy-3">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="reportsTable" class="table table-striped d-none">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Month</th>
                                <th scope="col">Year</th>
                                <th scope="col">Service</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Done By</th>
                                <th scope="col">Completed On</th>
                                <th scope="col">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reports as $report)
                            <tr>
                                <td>{{ $report->from_date->format('F') }}</td>
                                <td>{{ $report->from_date->format('Y') }}</td>
                                <td>{{ $report->service->name }}</td>
                                <td>{{ $report->customer->name }}</td>
                                <td>{{ optional($report->employee)->first_name ?? 'N/A' }}
                                <td>{{ $report->action_on ? $report->action_on->format('d M Y') : 'N/A' }}</td>
                                <td>{{ $report->status_remarks ?? 'N/A' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No records found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const reportsTable = $('#reportsTable');
        const searchForm = $('#searchForm');

        searchForm.on('submit', function(e) {
            const month = $('#month').val();
            const year = $('#year').val();
            const serviceName = $('#service_name').val();

            if ((month === "" && year === "" && serviceName === ""))
             {
                e.preventDefault();
                alert('Please Select both Month & Year or Service Name to search.');
            }
        });

        const hasSearchParams = searchForm.find('select').toArray().some(select => $(select).val() !== "");

        if (hasSearchParams) {
            reportsTable.removeClass('d-none');
        } else {
            reportsTable.addClass('d-none');
        }
    });
</script>
@endsection
