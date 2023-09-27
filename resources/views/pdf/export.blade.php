<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rekap Data Buku Besar Biaya - {{ config('app.name') }}</title>
    <style>
        table, th, td {
        border: 1px solid;
        padding: 2px
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Ranking</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)    
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->mahasiswa->nim }}</td>
                <td>{{ $row->mahasiswa->nama }}</td>
                <td>{{ $row->mahasiswa->program_studi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>