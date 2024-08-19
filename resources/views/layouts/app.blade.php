<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="blue-theme">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') | Laravel 11 & Bootstrap 5 Admin Dashboard Template</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ URL::asset('build/images/favicon-32x32.png') }}" type="image/png">

        @include('layouts.head-css')
    </head>

    <body>

        @include('layouts.topbar')

        @include('layouts.sidebar')

        <!--start main wrapper-->
        <main class="main-wrapper">
            <div class="main-content">
                @yield('content')
            </div>
        </main>

        <!--start overlay-->
        <div class="overlay btn-toggle"></div>
        <!--end overlay-->

        @include('layouts.common-scripts')
    </body>
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

</html>
