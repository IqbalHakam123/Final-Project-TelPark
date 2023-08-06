@extends('layouts.app')

@section('content')
    <div class="container" style="padding-left: 3%";>
        <h3 style="color: #5493A2; font-weight:700">{{ $pageTitle }}</h3>
        <p style="color:#979797;font-family: Poppins;font-size: 15px;font-style: normal;font-weight: 500;">{{ $subTitle }}</p>
        <div class="card rounded-4 p-3 mb-4 border-0">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{Vite::asset('resources/images/image1.png')}}" class="d-block w-100" alt="..." style="width:100%;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{Vite::asset('resources/images/image2.png')}}" class="d-block w-100" alt="..." style="width:100%">
                        </div>
                        <div class="carousel-item">
                            <img src="{{Vite::asset('resources/images/image3.png')}}" class="d-block w-100" alt="..." style="width:100%">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
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
    @yield('content')
@endsection
