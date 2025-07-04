<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Data User PDF</title>
</head>
<body>
    <h3>Data User</h3>
    <table border="1" cellspacing="0" cellpadding="2" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Email</th>
                <th>Gambar</th>
                <th>Asset</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->ktp->nik ?? '' }}</td>
                <td>{{ $data->email }}</td>
                <td>
                    <img src="{{ asset('storage/profil_foto/'. $data->image) }}" alt="profil" width="75">
                </td>
                <td>
                    @if (count($data->asset) == 0)
                        <ul>
                            <li>Belum ada asset</li>
                        </ul>
                    @else
                        <ul>
                            @foreach ($data->asset as $row)
                                <li>{{ $row->nama_asset }}</li>
                            @endforeach
                        </ul>
                    @endif
                </td>
                <td>{{ count($data->asset) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>