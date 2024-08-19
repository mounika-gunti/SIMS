<!--start sidebar-->

<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        {{-- <div class="logo-icon">
            <img src="http://127.0.0.1:8001/build/images/logo-icon.png" class="logo-img" alt="">
        </div> --}}
        <div class="logo-name flex-grow-1">
            <h5 class="mb-0">Quick Loans</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
            <li>
                <a href="http://127.0.0.1:8000/dashboard" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">widgets</i>
                    </div>
                    <div class="menu-title">Masters</div>
                </a>
                <ul>
                    <li><a href="{{ route('customer_type.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Customer Type</a>
                    </li>
                    <li><a href="{{ route('product_type.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Product Type</a>
                    </li>
                    <li><a href="{{ route('customer_checklist.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Customer Type Checklist</a>
                    </li>
                    <li><a href="{{ route('product_checklist.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Product Type Checklist</a>
                    </li>
                    <li><a href="{{ route('document_type.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Document Type</a>
                    </li>
                    <li><a href="{{ route('designation.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Designation Master</a>
                    </li>
                    <li><a href="{{ route('branch.index') }}"><i class="material-icons-outlined">arrow_right</i>Branch
                            Master</a>
                    </li>
                    <li><a href="{{ route('reporting_hierarchy.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Reporting Hierarchy</a>
                    </li>
                    <li><a href="{{ route('configuration.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Configuration</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">apps</i>
                    </div>
                    <div class="menu-title">Bank Details</div>
                </a>
                <ul>
                    <li><a href="{{ route('associated_banks.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Associated Banks</a>
                    </li>
                    <li><a href="{{ route('bank_documents.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Bank Documents</a>
                    </li>
                    <li><a href="{{ route('bank_target.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Bank Target</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">shopping_bag</i>
                    </div>
                    <div class="menu-title">Parties</div>
                </a>
                <ul>
                    <li><a href="{{ route('referrer_details.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Referrer Details</a>
                    </li>
                    <li><a href="{{ route('employee.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Employee/Staff Master</a>
                    </li>
                    <li><a href="{{ route('customer.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Customer</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">fitbit</i>
                    </div>
                    <div class="menu-title">Target</div>
                </a>
                <ul>
                    <li><a href="{{ route('employee_target.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Employee/Staff Target</a>
                    </li>
                    <li><a href="{{ route('designation_target.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Designation Target</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">view_agenda</i>
                    </div>
                    <div class="menu-title">Loans</div>
                </a>
                <ul>
                    <li><a href="{{ route('manage_loans.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Manage Loans</a>
                    </li>
                    <li><a href="{{ route('manage_disbursement.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Manage Disbursement</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">person</i>
                    </div>
                    <div class="menu-title">User Management</div>
                </a>
                <ul>
                    <li><a href="{{ route('user_management.index') }}"><i
                                class="material-icons-outlined">arrow_right</i>Add User</a>
                    </li>
                    <li><a href="{{ route('user_management.manage_user') }}"><i
                                class="material-icons-outlined">arrow_right</i>Manage User</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!--end navigation-->
    </div>
</aside>
<!--end sidebar-->
