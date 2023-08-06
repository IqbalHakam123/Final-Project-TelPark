<table>
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
