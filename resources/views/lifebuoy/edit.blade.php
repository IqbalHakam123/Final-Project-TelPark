@extends('layouts.app')

@section('content')
<div class="container-sm mt-4">
    <form action="{{ route('lifebuoys.update', ['lifebuoy' => $lifebuoy->id]) }}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row mb-4 mt-4" style="margin-left: 2%">
            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3" style="color:#6AB0BE"><b>{{$pageTitle}}</b></h4>
            </div>
        </div>
        <div class="card rounded-4 pt-2 p-3 pb-0 border-0" style="margin-left:2%">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3 p-5">
                        <h4 style="font-weight:700; color: #5493A2;">Edit Lifebuoy</h4>
                    </div>
                    <img src="{{Vite::asset('resources/images/flamingo.png')}}" alt="login form" class="img-fluid me-2 mb-0 mt-0" style="width:70%; margin:10%">
                </div>
                <div class="col-6">
                    <div class="mb-5 pt-5 mt-3">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ $errors->any() ? old('name') : $lifebuoy->name }}" placeholder="Enter Name">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input class="form-control @error('description') is-invalid @enderror" type="text" name="description" id="description" value="{{ $errors->any() ? old('description') : $lifebuoy->description }}" placeholder="Enter Description" required="">
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input class="form-control @error('stock') is-invalid @enderror" type="text" name="stock" id="stock" value="{{ $errors->any() ? old('stock') : $lifebuoy->stock }}" placeholder="Enter Stock" required="">
                                @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6 d-grid">
                                <a href="{{ route('lifebuoys.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                            </div>
                            <div class="col-md-6 d-grid">
                                <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@vite('resources/js/app.js')
@endsection
