@extends('layouts.app')

@section('content')
    <div class="container" style="padding-left: 3%";>
        <h3 style="color: #5493A2; font-weight:700">Dashboard </h3>
        <p style="color:#979797;font-family: Poppins;font-size: 10px;font-style: normal;font-weight: 400;">Home / Dashboard </p>
        <div class="card rounded-4 p-3 mb-4 border-0">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-1 rounded-3" src="{{Vite::asset('resources/images/nisul-3.png')}}" alt="First slide" style="width:100%">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="..." alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="..." alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card rounded-4 p-4 mb-4 border-0">
                    <p style="color:#979797;font-family: Poppins;font-size: 15px;font-style: normal;font-weight: 400;">Number of</p>
                    <h3 style="color: #5493A2; font-weight:700">Lifebuoys </h3>
                    <p class="bi bi-life-preserver" style="font-size:40px; color: #5493A2;"><b class="mx-3">{{ $lifebuoy_count }}</b></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card rounded-4 p-4 mb-4 border-0">
                    <p style="color:#979797;font-family: Poppins;font-size: 15px;font-style: normal;font-weight: 400;">Number of</p>
                    <h3 style="color: #5493A2; font-weight:700">Visitors </h3>
                    <p class="bi bi-people-fill" style="font-size:40px; color: #5493A2;"><b class="mx-3">{{ $visitor_count }}</b></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card rounded-4 p-4 mb-4 border-0">
                    <p style="color:#979797;font-family: Poppins;font-size: 15px;font-style: normal;font-weight: 400;">Number of</p>
                    <h3 style="color: #5493A2; font-weight:700">Rents </h3>

                    <p class="bi bi-tags-fill" style="font-size:40px; color: #5493A2;"><b class="mx-3">{{ $rent_count }}</b></p>
                </div>
            </div>
        </div>
    </div>
                    <p class="bi bi-tags-fill" style="font-size:40px; color: #5493A2;"><b class="mx-3">45</b></p>
                    {{-- <i class="bi bi-tags-fill" style="font-size:40px; color: #5493A2;"><b>ggg</b></i> --}}
    @yield('content')
@endsection
