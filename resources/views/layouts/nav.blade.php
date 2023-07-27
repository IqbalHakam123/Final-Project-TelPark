@php
    $currentRouteName = Route::currentRouteName();
@endphp

<div id="app">
    <!-- Navbar -->
<div class="container-fluid p-5">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-2 col-xl-2 px-sm-2 px-0 p-4 mb-5 bg-body rounded-4 bg-white">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">
                <div class="row">
                    <h4 class="p-3" style="color: #5493A2; font-weight:700">
                        <img src="{{Vite::asset('resources/images/nisul-1.png')}}" alt="login form" class="img-fluid me-2" style="width:15%"> Tel-Park
                    </h4>
                </div>
                <ul class="nav nav-pills flex-column mb-sm-auto  align-items-center align-items-sm-start " id="menu" style="padding:10%;">
                    <li class="nav-item mb-2">
                        <a href="{{ route('home') }}" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('visitors.index') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Visitor</span></a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('lifebuoys.index') }}" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi-life-preserver"></i> <span class="ms-1 d-none d-sm-inline">Lifebuoy</span></a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('rents.index') }}" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-tags-fill"></i> <span class="ms-1 d-none d-sm-inline">Rent</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-clock"></i> <span class="ms-1 d-none d-sm-inline">History</span> </a>
                    </li>
                </ul>
                <hr>
                <div style="color: #5493A2;">
                    <ul>
                        {{-- <li> --}}
                            <a href="{{ route('logout') }}" class="nav-link px-0 align-middle" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fs-4 bi-box-arrow-left"></i>
                                <span class="ms-1 d-none d-sm-inline">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        {{-- </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="container mb-4" style="padding-left: 3%";>
                <div class="card rounded-4 p-3 border-0">
                    <div class="row">
                        <div class="hstack gap-3 text-primary">
                            <img src="{{Vite::asset('resources/images/actor.png')}}" alt="login form" class="img-fluid" style="width:6%">
                            <span style="font-weight: bold;"> Andre Ahmad </span>
                            <div class="vr mx-3"></div>
                            <div class="card bg-light border-0 p-2 rounded-5 text-primary">
                                {{  now()->toDateString() }}
                            </div>
                        </div>
                    </div>
                    {{-- <i class="bi-person-circle me-1"></i> {{ Auth::user()->name }} --}}
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>
</div>
