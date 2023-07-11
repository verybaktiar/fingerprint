<!DOCTYPE html>
<html>
<head>
    <title>Fingerprint Solution X100C</title>
</head>
<body>
    <h1>Fingerprint Solution X100C</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Fingerprint ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->fingerprint_id }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
