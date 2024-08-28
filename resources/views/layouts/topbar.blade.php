<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="container-fluid">
            <ul class="navbar-nav ms-auto d-flex align-items-center gap-4">
                <li class="nav-item d-flex align-items-center">
                    {{-- <span class="navbar-text" style="color: white; margin-right: 10px;">
                        {{ Auth::user()->username }}
                    </span> --}}
                    <a class="nav-link" href="#" id="user" role="button" aria-expanded="false">
                        <i class="material-icons-outlined" style="font-size: 40px; color: white;">account_circle</i>
                    </a>
                    <a class="nav-link" href="javascript:void(0);"
                        onclick="document.getElementById('logout-form').submit()"
                        style="color: white; margin-left: -10px;">
                        Logout
                    </a>
                    <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>
