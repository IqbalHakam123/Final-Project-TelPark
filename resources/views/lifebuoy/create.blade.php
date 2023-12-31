@extends('layouts.app')

@section('content')
<div class="container-sm mt-5">
    <form action="{{ route('lifebuoys.store') }}" method="POST">
        @csrf
        <div class="row mb-4 mt-4" style="margin-left: 2%">
            <div class="col-lg-9 col-xl-10">
                <h3 class="mb-3" style="color:#6AB0BE"><b>{{$pageTitle}}</b></h3>
                <p style="color:#979797;font-family: Poppins;font-size: 15px;font-style: normal;font-weight: 500;">{{ $subTitle }}</p>
            </div>
            <div class="col-lg-3 col-xl-2">
                <div class="d-grid gap-2">
                    <a href="{{ route('lifebuoys.index')}}" class="btn btn-primary text-white rounded-5"><i class="bi bi-arrow-left-circle me-2"></i>Back</a>
                </div>
            </div>
        </div>
        <div class="card rounded-4 pt-2 p-3 pb-0 border-0" style="margin-left:2%">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="mb-3 p-5">
                        <h4 style="font-weight:700; color: #5493A2;">Create Lifebuoy</h4>
                    </div>
                    <img src="{{Vite::asset('resources/images/flamingo.png')}}" alt="login form" class="img-fluid me-2 mb-0 mt-0" style="width:70%; margin:10%">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="mb-5 p-5 mt-3">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 mb-3 mt-5 ">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror rounded-5" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Name">
                                @error('name')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="rides[]" class="form-label selectpicker me-3">Pilih Wahana</label>
                                <select name="rides[]" id="rides[]" class="form-select rounded-5 selectpicker col-lg-12" multiple>
                                    @foreach ($rides as $ride)
                                        <option value="{{ $ride->id }}" {{ old('name') == $ride->id ? 'selected' : '' }}>{{ $ride->name }}</option>
                                    @endforeach
                                </select>
                                @error('rides[]')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="age" class="form-label">Age</label>
                                <select name="age" id="age" class="form-select rounded-5">
                                    @foreach ($ages as $age)
                                        <option value="{{ $age->id }}" {{ old('age') == $age->id ? 'selected' : '' }}>{{ $age->code.' - '.$age->name }}</option>
                                    @endforeach
                                </select>
                                @error('age')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input class="form-control @error('description') is-invalid @enderror rounded-5" type="text" name="description" id="description" value="{{ old('description') }}" placeholder="Enter Description">
                                @error('description')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input class="form-control @error('stock') is-invalid @enderror rounded-5" type="text" name="stock" id="stock" value="{{ old('stock') }}" placeholder="Enter Stock">
                                @error('stock')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12 d-grid">
                                <button type="submit" class="btn btn-primary btn-lg mt-3 rounded-5 text-white"><i class="bi-check-circle me-2"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

<script>
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>
@endsection
