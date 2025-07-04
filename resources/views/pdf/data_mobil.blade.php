<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Data Mobil PDF</title>
</head>

<body>
    <h3>Data Mobil</h3>
    <table border="1" cellspacing="0" cellpadding="2" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Admin</th>
                <th>Tipe Mobil</th>
                <th>Tahun Pembelian</th>
                <th>Harga Mobil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mobil as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->user->name }}</td>
                <td>{{ $data->type_mobil }}</td>
                <td>{{ $data->tahun_pembelian }}</td>
                <td>{{ $data->harga_mobil }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>