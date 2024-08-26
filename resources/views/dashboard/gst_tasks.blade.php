@extends('layouts.app')
@extends('layouts.common-scripts')
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
                    <li class="breadcrumb-item active" aria-current="page">GST Tasks</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="mb-0"><b>GST Tasks</b></h3>
            </div>
            <hr>

            <div class="row gy-3">
                <div class="col-lg-12 m-2 mt-3 d-flex">
                    <div class="col-lg-4 ">
                        <div class="input-group ">
                            <select class="form-select" id="inputGroupSelect01">
                                <option selected>Search by Customer Name</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 mx-3">
                        <div class="input-group ">
                            <select class="form-select" id="inputGroupSelect01">
                                <option selected>Search by Month</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sandhya</td>
                                    <td>
                                        <div class="input-group" style="width:140px;">
                                            <select class="form-select" id="inputGroupSelect01">
                                                <option selected>Visited </option>
                                                <option value="1">Visited</option>
                                                <option value="2">Not Visited</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td> <input type="text" class="form-control" style="width:180px;" aria-label=""
                                            aria-describedby="basic-addon2">
                                    </td>
                                    <td><button class="btn btn-sm  btn-save">Save</button></td>
                                </tr>
                                <tr>
                                    <td>Jhothi</td>
                                    <td>
                                        <div class="input-group" style="width:140px;">
                                            <select class="form-select " id="inputGroupSelect01">
                                                <option selected>Not Visited</option>
                                                <option value="1">Visited</option>
                                                <option value="2">Not Visited</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td> <input type="text" class="form-control" style="width:180px;" aria-label=""
                                            aria-describedby="basic-addon2">
                                    </td>
                                    <td><button class="btn btn-sm  btn-save">Save</button></td>
                                </tr>
                                <tr>
                                    <td>Supritha</td>
                                    <td>
                                        <div class="input-group " style="width:140px;">
                                            <select class="form-select" id="notvisited">
                                                <option selected>Not Visited</option>
                                                <option value="1">Visited</option>
                                                <option value="2">Not Visited</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td> <input type="text" class="form-control" style="width:180px;" aria-label=""
                                            aria-describedby="basic-addon2">
                                    </td>
                                    <td><button class="btn btn-sm  btn-save">Save</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3 ">
                    <h3 class="mb-0 mt-3"><b>GST Completed Tasks</b></h3>
                </div>
                <hr>
                <div class="col-lg-12 m-2 mt-3 d-flex">
                    <div class="col-lg-4 ">
                        <div class="input-group ">
                            <select class="form-select" id="inputGroupSelect01">
                                <option selected>Search by Visited or Not Visited</option>
                                <option value="1">Visited</option>
                                <option value="2">Not Visited</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>Sandhya</td>
                                    <td>
                                        <div class="input-group " style="width:140px;">
                                            <select class="form-select" id="visited">
                                                <option selected>Visited</option>
                                                <option value="1">Visited</option>
                                                <option value="2">Not Visited</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td> <input type="text" class="form-control" style="width:180px;" aria-label=""
                                            aria-describedby="basic-addon2">
                                    </td>
                                    <td><button class="btn btn-sm  btn-save">Save</button></td>
                                </tr>
                                <tr>
                                    <td>Jhothi</td>
                                    <td>
                                        <div class="input-group " style="width:140px;">
                                            <select class="form-select" id="notvisited">
                                                <option selected>Not Visited</option>
                                                <option value="1">Visited</option>
                                                <option value="2">Not Visited</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td> <input type="text" class="form-control" style="width:180px;" aria-label=""
                                            aria-describedby="basic-addon2">
                                    </td>
                                    <td><button class="btn btn-sm  btn-save">Save</button></td>
                                </tr>
                                <tr>
                                    <td>Supritha</td>
                                    <td>
                                        <div class="input-group " style="width:140px;">
                                            <select class="form-select" id="notvisited">
                                                <option selected>Not Visited</option>
                                                <option value="1">Visited</option>
                                                <option value="2">Not Visited</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td> <input type="text" class="form-control" style="width:180px;" aria-label=""
                                            aria-describedby="basic-addon2">
                                    </td>
                                    <td><button class="btn btn-sm  btn-save">Save</button></td>
                                </tr>
                            </tbody>
                        </table>


                    </div>



                </div>










            </div>

        </div>
    </div>
@endsection
