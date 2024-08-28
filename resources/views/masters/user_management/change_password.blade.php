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
            <h3 class="mb-0"><b>Change Password</b></h3>
        </div>
        <hr>

        <form id="changePasswordForm" action="{{ route('user_management.update_password', ['id' => $id]) }}"
            method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-4">
                <div class="form-group col-md-5">
                    <label for="new_password"><b>New Password*</b></label>
                    <input type="password" class="form-control" id="new_password" name="new_password"
                        placeholder="Enter New Password">
                </div>
                @error('new_password')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="row mb-4">
                <div class="form-group col-md-5">
                    <label for="new_password_confirmation"><b>Confirm Password*</b></label>
                    <input type="password" class="form-control" id="new_password_confirmation"
                        name="new_password_confirmation" placeholder="Confirm New Password">
                </div>
                @error('new_password_confirmation')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-row mb-4">
                <div class="col-md-12 d-flex justify-content-end">
                    <div class="form-group mb-2 mr-3">
                        <a href="{{ route('user_management.manage_user') }}" class="btn btn-cancel btn-block">Cancel</a>
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit" class="btn btn-save btn-block">Update</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('changePasswordForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var form = this;
            var formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Password changed successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = '{{ route('user_management.manage_user') }}';
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: data.message || 'An error occurred.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while changing the password.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        });
    });
</script>
@endsection
