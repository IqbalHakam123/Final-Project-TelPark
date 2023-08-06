<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History</title>
    <style>
        html {
            font-size: 12px;
        }

        .table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            padding: 0.5rem;
            border: 1px solid black !important;
        }
    </style>
</head>
<body>
    <h1>History</h1>
    <table class="table table-bordered">
        <thead>
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
</body>
</html>
