
@extends('layouts.app')

@section('content')
    <div class="container-sm mt-5">
        <form action="{{ route('rents.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi-person-circle fs-1"></i>
                        <h4>Create Rent</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="ride" class="form-label">Ride Name</label>
                            <select name="ride" id="ride" class="form-select">
                                @foreach ($rides as $ride)
                                    <option value="{{ $ride->id }}" {{ old('ride') == $ride->id ? 'selected' : '' }}>{{ $ride->name }}</option>
                                @endforeach
                            </select>
                            @error('ride')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <select name="visitor" id="name" class="form-select">
                                @foreach ($visitors as $visitor)
                                    <option value="{{ $visitor->id }}" {{ old('name') == $visitor->id ? 'selected' : '' }}>{{ $visitor->name }}</option>
                                @endforeach
                            </select>
                            @error('visitor')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Lifebuoy Name</label>
                            <select name="lifebuoy" id="name" class="form-select">
                                @foreach ($lifebuoys as $lifebuoy)
                                    <option value="{{ $lifebuoy->id }}" {{ old('name') == $lifebuoy->id ? 'selected' : '' }}>{{ $lifebuoy->name }}</option>
                                @endforeach
                            </select>
                            @error('lifebuoy')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="borrow" class="form-label">Borrow</label>
                            <input class="form-control @error('borrow') is-invalid @enderror" type="time" name="borrow" id="borrow" value="{{ old('borrow') }}" placeholder="Enter Borrow Time">
                            @error('borrow')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="deadline" class="form-label">Deadline</label>
                            <input class="form-control @error('deadline') is-invalid @enderror" type="time" name="deadline" id="deadline" value="{{ old('deadline') }}" placeholder="Enter Deadline">
                            @error('deadline')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('visitors.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
