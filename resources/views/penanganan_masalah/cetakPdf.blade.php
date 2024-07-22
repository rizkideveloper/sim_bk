<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- <link rel="stylesheet" href="/pdf/pdf.css" type="text/css"> --}}

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table.products {
            font-size: 0.875rem;
        }

        table.penanganan tr {
            background-color: rgb(96 165 250);
        }

        table.penanganan th {
            color: black;
            padding: 0.5rem;
        }

        table tr.items {
            background-color: rgb(241 245 249);
        }

        table tr.items td {
            padding: 0.5rem;
        }
    </style>
</head>

<body>
    <h2>{{ $title }}</h2>
    <p>{{ $tanggal_cetak }}</p>

    <p>Daftar siswa yang sudah dilakukan penanganan masalah SMK Medikacom</p>
    <table class="penanganan">
        <tr>
            <th>No</th>
            <th>Tanggal Penanganan</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Masalah</th>
            <th>Penanganan</th>
        </tr>
        @foreach ($penanganan_masalah as $item)
            <tr class="items">
                <td>{{ $loop->iteration }}</td>
                <td>{{ date('d F Y', strtotime($item->updated_at)) }}</td>
                <td>{{ $item->nama_siswa }}</td>
                <td>{{ $item->nama_kelas }}-{{ $item->nama_urutan }}-{{ $item->nama_jurusan }}</td>
                <td>{{ $item->masalah }}</td>
                <td>{{ $item->penanganan }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
