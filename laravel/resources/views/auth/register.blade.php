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
                                    <form method="POST" action="{{route('register')}}">
                                        @csrf
                                        <div class="row justify-content-center">
                                            <div class="text-center">
                                                <div class="mb-3 text-center">
                                                    <div class="row">
                                                        <h4 class="pb-4" style="color: #5493A2; font-weight:700">
                                                            <img src="{{vite::asset('resources/images/nisul-1.png')}}" alt="login form" class="img-fluid me-2" style="width:9%"> Register
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>

                                                <div class="mb-3">
                                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror rounded-5" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email" class="form-label">{{ __('Email Address') }}</label>

                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror rounded-5" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="password" class="form-label">{{ __('Password') }}</label>

                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror rounded-5" name="password" required autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="rmb-3">
                                                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

                                                    <input id="password-confirm" type="password" class="form-control rounded-5" name="password_confirmation" required autocomplete="new-password">
                                                </div>

                                            </div>

                                            <div class="mb-5 mt-5">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary rounded-5 text-white"><i class="bi bi-box-arrow-in-right me-2"></i>
                                                        {{__('Register')}}
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
