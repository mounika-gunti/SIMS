@extends('layouts.app')
@extends('layouts.common-scripts')
<link rel="stylesheet" href="{{ asset('build/css/customer_checklist.css') }}">

@section('title')
User Management
@endsection

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
            <h3 class="mb-0"><b>User Permission</b></h3>
        </div>
        <hr>
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <form id="userManagementForm">
                        <input type="hidden" id="user_id" name="user_id" value="{{ $id }}">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col"><input type="checkbox" class="check_all_menu"></th>

                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">All</th>
                                        <th scope="col">Add</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">View</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="user_permission_table">
                                    <!-- Table rows will be populated here via JavaScript -->
                                </tbody>
                            </table>
                        </div>
                        <div class="form-row mb-4">
                            <div class="col-md-12 d-flex justify-content-end">
                                <div class="form-group mb-2 mr-3">
                                    <a href="{{ route('user_management.manage_user') }}"
                                        class="btn btn-cancel btn-block">Cancel</a>
                                </div>
                                <div class="form-group mb-2">
                                    <button type="submit" class="btn btn-save btn-block">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

    $('.check_all_menu').on('change', function() {
        var isChecked = $(this).is(':checked');
        $('#user_permission_table input[type="checkbox"]').prop('checked', isChecked);
    });

    $(document).on('change', '.checkbox-container input[type="checkbox"]', function() {
        var isChecked = $(this).is(':checked');
        var row = $(this).closest('tr');
        row.find('input[type="checkbox"]').prop('checked', isChecked);
    });

    var user_id = $('#user_id').val();
    $.ajax({
        type: 'GET',
        url: '{{ route('user_management.fetch_user_menus') }}',
        data: { user_id: user_id },
        success: function(response) {
            var rowsHtml = '';
            $.each(response, function(index, row) {
                var menuChecked = row.is_alloted == 1 ? 'checked' : '';
                var addChecked = row.add == 1 ? 'checked' : '';
                var allChecked = row.all == 1 ? 'checked' : '';
                var editChecked = row.edit == 1 ? 'checked' : '';
                var viewChecked = row.view == 1 ? 'checked' : '';
                var deleteChecked = row.delete == 1 ? 'checked' : '';

                rowsHtml += `
                    <tr>
                        <td class="checkbox-container"><input type="checkbox" ${menuChecked}></td>
                        <td style="display: none;">${row.menu_id}</td>
                        <td>${row.menu_name}</td>
                        <td>${row.menu_address}</td>
                        <td class="checkbox-container"><input type="checkbox" ${allChecked}></td>
                        <td class="checkbox-container"><input type="checkbox" ${addChecked}></td>
                        <td class="checkbox-container"><input type="checkbox" ${editChecked}></td>
                        <td class="checkbox-container"><input type="checkbox" ${viewChecked}></td>
                        <td class="checkbox-container"><input type="checkbox" ${deleteChecked}></td>
                    </tr>
                `;
            });
            $('#user_permission_table').html(rowsHtml);
        }
    });

    $('#userManagementForm').on('submit', function(event) {
        event.preventDefault();

        var user_id = $('#user_id').val();
        var user_menus = [];

        $('#user_permission_table tr').each(function() {
            var row = $(this);
            var is_alloted = row.find('td:eq(0) input[type="checkbox"]').prop('checked') ? 1 : 0;
            var menu_id = row.find('td:eq(1)').text().trim();
            var all = row.find('td:eq(4) input[type="checkbox"]').prop('checked') ? 1 : 0;
            var add = row.find('td:eq(5) input[type="checkbox"]').prop('checked') ? 1 : 0;
            var edit = row.find('td:eq(6) input[type="checkbox"]').prop('checked') ? 1 : 0;
            var view = row.find('td:eq(7) input[type="checkbox"]').prop('checked') ? 1 : 0;
            var deleteChecked = row.find('td:eq(8) input[type="checkbox"]').prop('checked') ? 1 : 0;

            user_menus.push({
                menu_id: menu_id,
                is_alloted: is_alloted,
                all: all,
                add: add,
                edit: edit,
                view: view,
                delete: deleteChecked,
            });
        });

        var requestData = {
            user_menus: user_menus,
            user_id: user_id,
            _token: '{{ csrf_token() }}'
        };

        $.ajax({
            type: 'POST',
            url: '{{ route('user_management.update_user', ':id') }}'.replace(':id', user_id),
            data: requestData,
            success: function(response) {
                if (response.success) {
                    window.location.href = '{{ route('user_management.manage_user') }}';
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    $.each(xhr.responseJSON.errors, function(field, messages) {
                        const errorMessage = messages.join('<br>');
                        $('#' + field + '_error').html(errorMessage).show();
                    });
                }
            }
        });
    });
});

</script>
@endsection
