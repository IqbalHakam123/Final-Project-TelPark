<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Belajar Laravel</title>
    @vite('resources/sass/app.scss')
</head>
<body style="background:linear-gradient(271deg, #8EF8FF 0%, #426177 100%);">
    <div class="container" style="padding-top:8%; padding-bottom:8%;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-md-10">
                    <div class="card rounded-5 bg-light" style="width: 100%">
                        <div class="row pb-0">
                            <div class="col-6 col-lg-5 d-flex align-items-center">
                                <img src="{{ Vite::asset('resources/images/nisul-2.png') }}" alt="login form" class="img-fluid" style="width : 50%px">
                            </div>
                            <div class="col-6 col-lg-5 d-flex align-items-center">
                                <div class="container-sm mt-5">
                                    <form method="POST" action="{{route('login')}}">
                                        @csrf
                                        <div class="row justify-content-center">
                                            <div class="text-center">
                                                <div class="mb-3 text-center">
                                                    <div class="row">
                                                        <h4 class="pb-4" style="color: #5493A2; font-weight:700">
                                                            <img src="{{vite::asset('resources/images/nisul-1.png')}}" alt="login form" class="img-fluid me-2" style="width:9%"> Telkom-Park
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email </label>
                                                    <input id="email" class="form-control @error('email') is-invalid @enderror rounded-5" name="email" value="{{old("email")}}" required autocomplete="email" auto placeholder="Enter Your Email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror rounded-5" name="email" required autocomplete="current-password" placeholder="Enter Your Password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-5 mt-5 ">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary rounded-5 text-white"><i class="bi bi-box-arrow-in-right me-2"></i>
                                                        {{__('Sign In')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
{{--
<div class="col-6 col-lg-5 d-flex align-items-center">
    <img src="{{ Vite::asset('resources/images/nisul-2.png') }}" alt="login form" class="img-fluid" style="width : 450px" />
</div> --}}

{{-- <div class="container"> --}}
        {{-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="container-sm mt-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row justify-content-center">
                                <div class="p-5 rounded-3 border col-4 bg-white">
                                    <div class="text-center">
                                        <div class="mb-3 text center">
                                            <i class="bi-hexagon-fill text-primary fs-1 pb"></i>
                                            <h4 class="pb-4">Tel-Park</h4>
                                        </div>
                                    </div>
                                    <hr>
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                                    <div>
                                        <div class=" mb-3">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Your Password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mb-0 mt-5">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary "><i class="bi bi-box-arrow-in-right me-2"></i>
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
