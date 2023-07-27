@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4 mt-4" style="margin-left: 2%">
        <div class="col-lg-9 col-xl-10 ">
            <h3 class="mb-3" style="color:#6AB0BE;"><b>{{ $pageTitle }}</b></h3>
            <p style="color:#979797;font-family: Poppins;font-size: 15px;font-style: normal;font-weight: 500;">{{ $subTitle }}</p>
            </div>
        <div class="col-lg-3 col-xl-2">
            <div class="d-grid gap-2">
                <a href="{{ route('rents.create') }}" class="btn btn-primary text-white rounded-5"><i class="bi bi-plus-circle me-1"></i> Add</a>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive rounded-4" style="margin-left: 2%">
        <table class="table table-hover mb-0  bg-white datatable" id="rentTable">
            <thead class="table-primary rounded-4">
                <tr>
                    <th>Ride Name</th>
                    <th>Visitor Name</th>
                    <th>Lifebuoy Name</th>
                    <th>Borrow</th>
                    <th>Deadline</th>
                    <th>Return</th>
                    <th>Status</th>
                    <th>Action</th>
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
                            @if ($rent->return_rent)
                            {{ $rent->return_rent->return }}
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            @if ($rent->return_rent)
                                Returned
                            @else
                                Borrowed
                            @endif
                        </td>
                        <td>
                            {{-- ACTIONS SECTION --}}
                            <div class="row">
                                <div class="col-6">
                                    <form action="{{ route('rents.return', $rent->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <button type="submit" @class(['btn', 'btn-outline-primary', 'btn-sm', 'me-2', 'rounded-5', 'd-none' => $rent->return_rent])>
                                            <i class="bi-arrow-return-left"></i>
                                        </button>
                                    </form>
                                </div>

                                <div class="col-6">
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

@push('scripts')
<script type="module">
    $(document).ready(function() {
        $('#rentTable').DataTable();
    });
</script>
@endpush
