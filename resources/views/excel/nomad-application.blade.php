<table>
    <thead>
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Booking Number</th>
        <th>Flight Number</th>
        <th>Reason</th>
        <th>Deplay</th>
        <th>From</th>
        <th>To</th>
        <th>Date</th>
        <th>Airline</th>
        <th>Status</th>
        <th>Created At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($applications as $application)
        <tr>
            <td>{{ $application->username}}</td>
            <td>{{ $application->email}}</td>
            <td>{{ $application->phone_number}}</td>
            <td>{{ $application->booking_number}}</td>
            <td>{{ $application->flight_number }}</td>
            <td>{{ $application->reason }}</td>
            <td>{{ check($application->reason,$application->delay) }}</td>
            <td>{{ $application->from }}</td>
            <td>{{ $application->to }}</td>
            <td>{{ $application->date }}</td>
            <td>{{ $application->airline }}</td>
            <td>{{ $application->status }}</td>
            <td>{{ $application->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>