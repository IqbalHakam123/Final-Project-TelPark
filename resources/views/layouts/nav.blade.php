@php
    $currentRouteName = Route::currentRouteName();
@endphp


<div id="app">
    <!-- Navbar -->
  <div class="container-fluid p-5">

      <div class="row flex-nowrap">

          <div class="col-auto col-md-2 col-xl-2 px-sm-2 px-0 p-4 mb-5 bg-body rounded-4 bg-white">
              <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <div class="row">
                    <h4 class="p-3" style="color: #5493A2; font-weight:700">
                        <img src="{{Vite::asset('resources/images/nisul-1.png')}}" alt="login form" class="img-fluid me-2" style="width:15%"> Tel-Park
                    </h4>
                </div>
                  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu" style="padding:10%">
                      <li class="nav-item">
                          <a href="{{ route('home') }}" class="nav-link align-middle px-0">
                              <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('visitors.index') }}" class="nav-link px-0 align-middle">
                              <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Visitor</span></a>
                      </li>
                      <li>
                          <a href="{{ route('lifebuoys.index') }}" class="nav-link px-0 align-middle ">
                              <i class="fs-4 bi-life-preserver"></i> <span class="ms-1 d-none d-sm-inline">Lifebuoy</span></a>
                      </li>
                      <li>
                          <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                              <i class="fs-4 bi-tags-fill"></i> <span class="ms-1 d-none d-sm-inline">Products</span> </a>
                              <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                          </ul>
                      </li>
                      <li>
                          <a href="#" class="nav-link px-0 align-middle">
                              <i class="fs-4 bi-clock"></i> <span class="ms-1 d-none d-sm-inline">History</span> </a>
                      </li>
                  </ul>
              </div>
          </div>
          <div class="col-lg-10">
              <div class="container mb-4" style="padding-left: 3%";>
                  <div class="card rounded-4 pt-2 p-3 pb-0 border-0">
                    <div class="row">
                        <h6 style="color: #5493A2; font-weight:600">
                            <img src="{{Vite::asset('resources/images/actor.png')}}" alt="login form" class="img-fluid me-2" style="width:6%"> Andre Ahmad
                        </h6>
                    </div>
                      {{-- <i class="bi-person-circle me-1"></i> {{ Auth::user()->name }} --}}
                  </div>
              </div>
              @yield('content')
          </div>
      </div>
  </div>
</div>
