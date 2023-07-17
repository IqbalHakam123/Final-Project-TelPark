@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4 mt-4" style="margin-left: 2%">
        <div class="col-lg-9 col-xl-10 ">
            <h4 class="mb-3" style="color:#6AB0BE;"><b>{{ $pageTitle }}</b></h4>
        </div>
        <div class="col-lg-3 col-xl-2">
            <div class="d-grid gap-2">
                <a href="{{ route('visitors.create') }}" class="btn btn-primary text-white rounded-5"><i class="bi bi-plus-circle me-1"></i> Add</a>
            </div>
        </div>
    </div>

    <div class="table-responsive border rounded-4" style="margin-left: 2%">
        <table class="table table-hover mb-0  bg-white">
            <thead class="table-primary rounded-4">
                <tr >
                    <th style="padding-left:2%">First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($visitors as $visitor)
                    <tr>
                        <td>{{ $visitor->firstname }}</td>
                        <td>{{ $visitor->lastname }}</td>
                        <td>{{ $visitor->phone }}</td>
                        <td>{{ $visitor->age->name }}</td>
                        <td>
                            {{-- ACTIONS SECTION --}}
                            <div class="d-flex">
                                <a href="{{ route('visitors.edit', ['visitor' => $visitor->id]) }}" class="btn btn-outline-primary btn-sm me-2 rounded-5"><i class="bi-pencil-square"></i></a>

                                <div>
                                    <form action="{{ route('visitors.destroy', ['visitor' => $visitor->id]) }}" method="POST">
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
