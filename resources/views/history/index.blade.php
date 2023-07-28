@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4 mt-4" style="margin-left: 2%">
        <div class="col-lg-9 col-xl-10 ">
            <h4 class="mb-3" style="color:#6AB0BE;"><b>{{ $pageTitle }}</b></h4>
        </div>
    </div>
    <div class="col-lg-3 col-xl-6">
        <ul class="list-inline mb-0 float-end">
            <li class="list-inline-item">
                <a href="{{ route('histories.exportExcel')}}" class="btn btn-outline-success">
                    <i class="bi bi-download me-1">to Excel</i>
                </a>
            </li>
        </ul>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive rounded-4" style="margin-left: 2%">
        <table class="table table-hover mb-0  bg-white border datatable" id="historyTable">
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

@push('scripts')
<script type="module">
    $(document).ready(function() {
        $('#historyTable').DataTable();
    });
</script>
@endpush
