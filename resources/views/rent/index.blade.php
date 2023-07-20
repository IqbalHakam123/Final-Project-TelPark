@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4 mt-4" style="margin-left: 2%">
        <div class="col-lg-9 col-xl-10 ">
            <h4 class="mb-3" style="color:#6AB0BE;"><b>{{ $pageTitle }}</b></h4>
        </div>
        <div class="col-lg-3 col-xl-2">
            <div class="d-grid gap-2">
                <a href="{{ route('rents.create') }}" class="btn btn-primary text-white rounded-5"><i class="bi bi-plus-circle me-1"></i> Add</a>
            </div>
        </div>
    </div>

    <div class="table-responsive border rounded-4" style="margin-left: 2%">
        <table class="table table-hover mb-0  bg-white">
            <thead class="table-primary rounded-4">
                <tr>
                    <th>Ride Name</th>
                    <th>Visitor Name</th>
                    <th>Lifebuoy Name</th>
                    <th>Borrow</th>
                    <th>Deadline</th>
                    <th>Return</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rents as $rent)
                    <tr>
                        <td>{{ $rent->ride->name }}</td>
                        <td>{{ $rent->visitor->name }}</td>
                        <td>{{ $rent->lifebuoy->name }}</td>
                        <td>{{ date('h:i:sa', strtotime($rent['borrow'])) }}</td>
                        <td>{{ date('h:i:sa', strtotime($rent['deadline'])) }}</td>
                        <td>
                            @if (empty($rent->return))
                                {{ '-' }}


                            @endif
                                {{ Carbon\Carbon::now() }}

                            {{-- if (empty($rent['return'])) {
                                echo "-";
                            }
                            else {
                                echo date('h:i:sa', strtotime($rent['return'])); --}}

                        </td>
                        <td>
                            {{-- ACTIONS SECTION --}}
                            <div class="d-flex">

                                <div>
                                    {{-- <form action="{{ route('visitors.destroy', ['visitor' => $visitor->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger btn-sm me-2 rounded-5"><i class="bi-trash"></i></button>
                                    </form> --}}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="#" class="btn btn-outline-primary btn-sm me-2 rounded-5"><i class="bi-arrow-return-left"></i></a>

                                <div>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger btn-sm me-2 rounded-5"><i class="bi-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
