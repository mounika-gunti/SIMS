@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/my_dashboard.css') }}">
@section('title')
    My Dashboard
@endsection
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">My Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0"><b>My Dashboard</b></h3>
            </div>
            <hr>
            <div class="col-lg-12">
                <div class="card d-flex mx-auto " style="width: 20rem; height: 8rem">
                    <div class="card-body card-assign text-center ">
                        <h4>Assigned Customer</h4>
                        <h5>2</h5>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-6 mt-3 ">
                    <div class="card d-flex mx-auto" style="width: 20rem;">
                        <div class="card-body card-gst text-center  ">
                            <h4>GST</h4>
                            <h5>30</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-3">
                    <div class="card d-flex mx-auto" style="width: 20rem;">
                        <div class="card-body card-pt text-center ">
                            <h4>PT</h4>
                            <h5>40</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
