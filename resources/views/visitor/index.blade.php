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
                <a href="{{ route('visitors.create') }}" class="btn btn-primary text-white rounded-5"><i class="bi bi-plus-circle me-1"></i> Add</a>
            </div>
        </div>
    </div>

    <div class="table-responsive" style="margin-left: 2%">
        <table class="table table-hover mb-0  bg-white border rounded-4 datatable" id='visitorTable'>
            <thead class="table-primary rounded-4">
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Age</th>
                    <th>Identity Card</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($visitors as $visitor)
                    <tr>
                        <td>{{ $visitor->name }}</td>
                        <td>{{ $visitor->phone }}</td>
                        <td>{{ $visitor->age->name }}</td>
                        <td>
                            @if ($visitor->original_filename)
                                <a href="{{ route('visitors.downloadFile', ['visitorId' => $visitor->id]) }}" class="btn btn-outline-primary btn-sm rounded-5">
                                    <i class="bi bi-download me-1"></i> Download ID
                                </a>
                            @else
                                None
                            @endif

                            </td>
                        <td>
                            {{-- ACTIONS SECTION --}}
                            <div class="d-flex">
                                <a href="{{ route('visitors.edit', ['visitor' => $visitor->id]) }}" class="btn btn-outline-primary btn-sm me-2 rounded-5"><i class="bi-pencil-square"></i></a>

                                <div>
                                    <form action="{{ route('visitors.destroy', ['visitor' => $visitor->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger btn-sm me-2 rounded-5 btn-delete" data-name="{{ $visitor->name }}"><i class="bi-trash"></i></button>
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
    <script type='module'>
        $(document).ready(function() {
            $('#visitorTable').DataTable();
            $(".datatable").on("click", ".btn-delete", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Are you sure want to delete\n" + name + "?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-primary",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        })

    </script>
@endpush
