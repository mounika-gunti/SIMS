<!--plugins-->
<script src="{{ URL::asset('build/js/jquery.min.js') }}"></script>
<!--bootstrap js-->
<script src="{{ URL::asset('build/js/bootstrap.bundle.min.js') }}"></script>

@stack('script')
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
