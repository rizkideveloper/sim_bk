<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ $_SERVER['DOCUMENT_ROOT'] }}/assets/dist/css/adminlte.min.css">
    <style>
        
        h1,
        h3,
        h4,
        h5,
        h6 {
            text-align: center;
        }

        #text-header {
            margin-left: 100px;
        }

        .garis1 {
            border-top: 3px solid black;
            height: 2px;
            width: 100%;
            border-bottom: 1px solid black;
        }

        .tanggal {
            margin-left: 75%;
        }

        .nama-sekolah {
            font-size: 40px;
        }
    </style>
</head>

<body>

    <header>
        <div class="row">
            <table>
                <tr>
                    <td>
                        <div id="img" class="col-md-6">
                            <img src="{{ $_SERVER['DOCUMENT_ROOT'] }}/assets/dist/img/logo.jpg" alt="AdminLTE Logo"
                                id="logo" width="120" height="120">
                        </div>
                    </td>
                    <td>
                        <div id="text-header" class="col-md-6">
                            <h3 class="nama-sekolah"> <strong>SMK Medikacom Bandung</strong></h3>
                            <h6 class="alamatlogo">
                                Jl. Rancabolang Soekarno-Hatta No. 10B</h6>
                        </div>
                    </td>
                </tr>
            </table>


        </div>
    </header>

    <hr class="garis1">
    <div class="row">

        <p class="tanggal">
            Bandung, {{ $tanggal_cetak }}
        </p>


        <p>Daftar siswa yang sudah dilakukan penanganan masalah SMK Medikacom</p>
        <table class="table table-striped">
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
    </div>




</body>

</html>
