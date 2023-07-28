@php
    $currentRouteName = Route::currentRouteName();
@endphp


<div id="app">
    <!-- Navbar -->
  <div class="container-fluid p-5">
    <div class="wrapper mx-auto">
        <!-- Sidebar  -->
        <nav id="sidebar" class="bg-white">
            <div class="sidebar-header text-center mt-5">
                <img src="{{Vite::asset('resources/images/nisul-1.png')}}" alt="login form" class="img-fluid me-2" style="width:25%">
                <h3>Tel-Park</h3>
            </div>
            <ul class="list-unstyled CTAs">
                <li>
                    <a href="{{ route('home') }}" class="nav-link align-middle px-0">
                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('visitors.index') }}" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Visitor</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('lifebuoys.index') }}" class="nav-link px-0 align-middle ">
                        <i class="fs-4 bi-life-preserver"></i> <span class="ms-1 d-none d-sm-inline">Lifebuoy</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('rents.index') }}" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-tags-fill"></i> <span class="ms-1 d-none d-sm-inline">Rent</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link px-0 align-middle">
                        <i class="fs-4 bi-clock"></i> <span class="ms-1 d-none d-sm-inline">History</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="article nav-link px-0 align-middle" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fs-4 bi-box-arrow-left"></i>
                    <span class="ms-1 d-none d-sm-inline">Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg bg-white p-4 rounded-4 mx-4 btn" id="navbar">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item" id="sidebarCollapse" class="btn btn-info bg-primary">
                                <div class="row">
                                    <div class="hstack gap-3 text-primary">
                                        <img src="{{Vite::asset('resources/images/actor.png')}}" alt="login form" class="img-fluid" style="width:6%">
                                        <span style="font-weight: bold;"> {{ Auth::user()->name }} </span>
                                        <div class="vr mx-3"></div>
                                        <div class="card bg-light border-0 p-2 rounded-5 text-primary">
                                            {{  now()->toDayDateTimeString() }}
                                        </div>
                                      </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')
        </div>
    </div>
  </div>
</div>
@push('scripts')
    <script type="module">
        $(document).ready(function () {
            $('#navbar').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
@endpush

