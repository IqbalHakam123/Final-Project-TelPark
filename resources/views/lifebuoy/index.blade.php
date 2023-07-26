@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row mb-4 mt-4" style="margin-left: 2%">
        <div class="col-lg-9 col-xl-10 ">
            <h4 class="mb-3" style="color:#6AB0BE;"><b>{{ $pageTitle }}</b></h4>
        </div>
        <div class="col-lg-3 col-xl-2">
            <div class="d-grid gap-2">
                <a href="{{ route('lifebuoys.create') }}" class="btn btn-primary text-white rounded-5"><i class="bi bi-plus-circle me-1"></i> Add</a>
            </div>
        </div>
    </div>

    <div class="table-responsive border rounded-4" style="margin-left: 2%">
        <table class="table table-hover mb-0 bg-white datatable" id="lifebuoyTable">
            <thead class="table-primary rounded-4">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Stock</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lifebuoys as $lifebuoy)
                    <tr>
                        <td>{{ $lifebuoy->name }}
                            (
                                @foreach($lifebuoy->rides as $key => $ride)
                                    {{ $ride->name }}@if(!$loop->last),@endif
                                @endforeach
                            )
                        </td>
                        <td>{{ $lifebuoy->description }}</td>
                        <td>{{ $lifebuoy->stock }}</td>
                        <td>
                            {{-- ACTIONS SECTION --}}
                            <div class="d-flex">
                                <a href="{{ route('lifebuoys.edit', ['lifebuoy' => $lifebuoy->id]) }}" class="btn btn-outline-primary btn-sm me-2 rounded-5"><i class="bi-pencil-square"></i></a>

                                <div>
                                    <form action="{{ route('lifebuoys.destroy', ['lifebuoy' => $lifebuoy->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger btn-sm me-2 rounded-5 btn-delete" data-name="{{ $lifebuoy->name }}"><i class="bi-trash"></i></button>
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
@push('scripts')
    <script type="module">
        $(document).ready(function() {
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
        });
    </script>
@endpush
@endsection
