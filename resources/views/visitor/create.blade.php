@extends('layouts.app')

@section('content')
<div class="container-sm mt-5">
    <form action="{{ route('visitors.store') }}" method="POST">
        @csrf
        <div class="row mb-4 mt-4" style="margin-left: 2%">
            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3" style="color: #6AB0BE"><b>{{$pageTitle}}</b></h4>
            </div>
        </div>
        <div class="card rounded-4 pt-2 p-3 pb-0 border-0" style="margin-left: 2%">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3 p-5">
                        <h4 style="font-weight: 700; color:#5493A2"> Add Visitor</h4>
                    </div>
                    <img src="{{ Vite::asset('resources/images/actor-2.png')}}" alt="login form" class="img-fluid me-2 mb-0 mt-0" style="width: 60%; margin:10%">
                </div>
                <div class="col-6">
                    <div class="mb-5 p-5 mt-3">
                        <div class="row">
                            <div class="col-md-12 mb-3 mt-5">
                                <label for="name" class="form-label">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Name">
                                @error('name')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Enter Phone">
                                @error('phone')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="age" class="form-label">Age</label>
                                <select name="age" id="age" class="form-select">
                                    @foreach ($ages as $age)
                                        <option value="{{ $age->id }}" {{ old('age') == $age->id ? 'selected' : '' }}>{{ $age->code.' - '.$age->name }}</option>
                                    @endforeach
                                </select>
                                @error('age')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6 d-grid">
                                <a href="{{ route('visitors.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
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
