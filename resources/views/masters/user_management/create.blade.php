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
                <li class="breadcrumb-item active" aria-current="page">User Management</li>
            </ol>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0"><b>Add User</b></h3>
        </div>
        <hr>
        <form action="{{ route('user_management.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="first_name"><b>Display Name*</b></label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            placeholder="Enter Display Name" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="username"><b>User Name*</b></label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter Username" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="password"><b>Password*</b></label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter Password" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="password_confirmation"><b>Confirm Password*</b></label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" placeholder="Enter Confirm Password" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="image_path" class="form-label">Attach Profile Picture*</label>
                        <input type="file" class="form-control" name="image_path" id="image_path"
                            onchange="previewImage()">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <img id="profileImagePreview" src="#" alt="Profile Image Preview"
                            style="display: none; max-width: 100%; max-height: 100%; border: 1px solid #ddd; padding: 5px; margin-left:100px;">
                    </div>
                </div>
            </div>
            <div class="form-row mb-4">
                <div class="col-md-12 d-flex justify-content-end">
                    <div class="form-group mb-2 mr-3">
                        <a href="{{ route('user_management.index') }}" class="btn btn-cancel btn-block">Cancel</a>
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit" class="btn btn-save btn-block">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function previewImage() {
        var file = document.getElementById("image_path").files[0];
        var reader = new FileReader();
        reader.onload = function(e) {
            var preview = document.getElementById("profileImagePreview");
            preview.src = e.target.result;
            preview.style.display = "block";
        }
        reader.readAsDataURL(file);
    }

    $(document).ready(function() {
        @if (session('success'))
            Swal.fire({
                title: 'Success!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif
    });
</script>
@endsection
