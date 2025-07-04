<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Data KTP PDF</title>
</head>

<body>
    <h3>Data KTP</h3>
    <table border="1" cellspacing="0" cellpadding="2" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Admin</th>
                <th>NIK</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ktp as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->user->name }}</td>
                <td>{{ $data->nik }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>