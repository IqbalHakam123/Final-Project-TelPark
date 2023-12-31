@extends('layouts.app')

@section('content')
<div class="container-sm mt-5">
    <form action="{{ route('rents.store') }}" method="POST">
        @csrf
        <div class="row mb-4 mt-4" style="margin-left: 2%">
            <div class="col-lg-9 col-xl-10">
                <h3 class="mb-3" style="color: #6AB0BE"><b>{{$pageTitle}}</b></h3>
                <p style="color:#979797;font-family: Poppins;font-size: 15px;font-style: normal;font-weight: 500;">{{ $subTitle }}</p>
            </div>
            <div class="col-lg-3 col-xl-2">
                <div class="d-grid gap-2">
                    <a href="{{ route('rents.index')}}" class="btn btn-primary text-white rounded-5"><i class="bi bi-arrow-left-circle me-2"></i>Back</a>
                </div>
            </div>
        </div>
        <div class="card rounded-4 pt-2 p-3 pb-0 border-0" style="margin-left: 2%">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="mb-3 p-5">
                        <h4 style="font-weight: 700; color:#5493A2"> Add Rent</h4>
                    </div>
                    <img src="{{ Vite::asset('resources/images/rent.png')}}" alt="login form" class="img-fluid me-2 mb-0 mt-0" style="width: 80%; margin:10%">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="mb-5 p-4 mt-3">
                        <div class="row">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="col-md-12 col-lg-12 col-sm-12 mb-3 mt-5">
                                <label for="ride" class="form-label">Ride Name</label>
                                <select name="ride" id="rideSelect" class="form-select rounded-5">
                                    <option value="" disabled selected>-- Choose Ride --</option>
                                    @foreach ($rides as $ride)
                                        <option value="{{ $ride->id }}" {{ old('ride') == $ride->id ? 'selected' : '' }}>{{ $ride->name }}</option>
                                    @endforeach
                                </select>
                                @error('ride')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                    <label for="name" class="form-label">Visitor Name</label>
                                    <select name="visitor" id="visitorSelect" class="form-select rounded-5">
                                        <option value="" disabled selected>-- Choose Visitor --</option>
                                        @foreach ($visitors as $visitor)
                                            <option value="{{ $visitor->id }}"
                                                {{ old('name') == $visitor->id ? 'selected' : '' }}>{{ $visitor->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('visitor')
                                        <div class="text-danger"><small>{{ $message }}</small></div>
                                    @enderror
                                </div>
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Lifebuoy Name</label>
                                <select name="lifebuoy" id="lifebuoySelect" class="form-select rounded-5">
                                    <option value="" disabled selected>-- Choose Lifebuoy --</option>
                                </select>
                                @error('lifebuoy')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="borrow" class="form-label">Borrow</label>
                                <input class="form-control @error('borrow') is-invalid @enderror rounded-5" type="time" name="borrow" id="borrow" value="{{ old('borrow') }}" placeholder="Enter Borrow Time">
                                @error('borrow')
                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="deadline" class="form-label">Deadline</label>
                                <input class="form-control @error('deadline') is-invalid @enderror rounded-5" type="time" name="deadline" id="deadline" value="17:00" disabled>
                                @error('deadline')
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="module">
    function fetchLifebuoys() {
        var rideId = $('#rideSelect').val();
        var visitorId = $('#visitorSelect').val();

        // Make an AJAX request to fetch lifebuoys for the selected ride and visitor
        $.ajax({
            url: '/getLifebuoysFromRideAndVisitor/' + visitorId + '/' + rideId,
            method: 'GET',
            success: function (data) {
                var lifebuoySelect = $('#lifebuoySelect');

                // Clear previous options
                lifebuoySelect.empty();

                // Populate lifebuoy options based on the response data
                data.forEach(function (lifebuoy) {
                    lifebuoySelect.append($('<option>', {
                        value: lifebuoy.id,
                        text: lifebuoy.name
                    }));
                });
            },
            error: function (xhr, status, error) {
                console.log(error); // Handle error if needed
            }
        });
    }

    // Bind the fetchLifebuoys function to the change event of ride and visitor selects
    $('#rideSelect, #visitorSelect').change(function () {
        fetchLifebuoys();
    });

    // Fetch lifebuoys initially when the page loads
    fetchLifebuoys();

</script>
@vite('resources/js/app.js')
@endsection
