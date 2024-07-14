<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Perankingan Siswa - {{ config('app.name') }}</title>
    <style>
        table,
        th,
        td {
            border-collapse: collapse;
            border: 1px solid;
            padding: 2px;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Ranking</th>
                <th>No Reg</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Asal Kelas</th>
                <th>Nilai</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td style="padding: 2px;text-align: center">{{ $loop->iteration }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->mahasiswa->no_reg }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->mahasiswa->nama }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->mahasiswa->jenis_kelamin }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->mahasiswa->asal_kelas }}</td>
                    <td style="padding: 2px;text-align: center">{{ $row->nilai }}</td>
                    <td style="padding: 2px;text-align: center;white-space: nowrap;">
                        @for ($i = 0; $i < count($quota); $i++)
                            @if ($loop->iteration >= $quota[$i]['start'] && $loop->iteration <= $quota[$i]['end'])
                                Lulus {{ $jurusan->where('id', $quota[$i]['id'])->first()?->nama }}
                            @endif
                        @endfor
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
