<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Data Rumah PDF</title>
</head>

<body>
    <h3>Data Rumah</h3>
    <table border="1" cellspacing="0" cellpadding="2" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Pemilik</th>
                <th>Tipe Rumah</th>
                <th>Harga Rumah</th>
                <th>Lokasi Rumah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rumah as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->user->name ?? '' }}</td>
                    <td>{{ $data->type_rumah }}</td>
                    <td>{{ $data->harga_rumah }}</td>
                    <td>{{ $data->lokasi_rumah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>