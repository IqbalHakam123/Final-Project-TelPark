@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4 mt-4" style="margin-left: 2%">
        <div class="col-lg-9 col-xl-10 ">
            <h4 class="mb-3" style="color:#6AB0BE;"><b>{{ $pageTitle }}</b></h4>
        </div>
        <div class="col-lg-3 col-xl-6">
            <div class="d-grid gap-2">
                <ul class="list-inline mb-0 float-end">
                    {{-- <li class="list-inline-item">
                        <a href="{{ route('histories.exportExcel') }}" class="btn btn-outline-success rounded-5">
                            <i class="bi bi-file-excel me-1"></i> to Excel
                        </a>
                    </li> --}}
                    <li class="list-inline-item">
                        <a href="{{ route('history.exportPdf') }}" class="btn btn-outline-danger rounded-5">
                            <i class="bi bi-file-pdf me-1"></i> to PDF
                        </a>
                    </li>
                </ul>
                {{-- <a href="{{ route('history.exportExcel') }}" class="btn btn-outline-success">
                    <i class="bi bi-download me-1"></i> to Excel
                </a>
                <a href="{{ route('history.exportPdf') }}" class="btn btn-outline-danger">
                    <i class="bi bi-download me-1"></i> to PDF
                </a> --}}
            </div>
        </div>

    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive border rounded-4" style="margin-left: 2%">
        <table class="table table-hover mb-0  bg-white">
            <thead class="table-primary rounded-4">
                <tr>
                    <th>Ride Name</th>
                    <th>Visitor Name</th>
                    <th>Lifebuoy Name</th>
                    <th>Borrow</th>
                    <th>Return</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($histories as $history)
                    <tr>
                        <td>{{ $history->ride->name }}</td>
                        <td>{{ $history->visitor->name }}</td>
                        <td>{{ $history->lifebuoy->name }}</td>
                        <td>{{ date('h:i:sa', strtotime($history['borrow'])) }}</td>
                        <td>
                            @if ($history->return_rent)
                            {{ $history->return_rent->return }}
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            @if ($history->return_rent)
                                Returned
                            @else
                                Borrowed
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
