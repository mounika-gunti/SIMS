@extends('layouts.app')
@section('title')
Dashboard
@endsection
@section('content')

<div class="row">
    <div class="col-xxl-8 d-flex align-items-stretch">
        <div class="card w-100 overflow-hidden rounded-4">
            <div class="card-body position-relative p-4">
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<!--plugins-->
<script src="{{ URL::asset('build/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ URL::asset('build/plugins/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ URL::asset('build/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('build/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('build/plugins/peity/jquery.peity.min.js') }}"></script>
<script>
    $(".data-attributes span").peity("donut")
</script>
<script src="{{ URL::asset('build/js/main.js') }}"></script>
<script src="{{ URL::asset('build/js/dashboard1.js') }}"></script>
<script>
    new PerfectScrollbar(".user-list")
</script>
@endpush
