<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Data Asset PDF</title>
</head>

<body>
    <h3>Data Asset</h3>
    <table border="1" cellspacing="0" cellpadding="2" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Asset</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asset as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama_asset }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>