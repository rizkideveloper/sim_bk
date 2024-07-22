@extends('dashboard.layouts.main')
@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/laporanMasalah">Laporan Masalah</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <!-- form start -->
                            <form>
                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col-2">
                                            <label for="InputKelas">Kelas</label>
                                        </div>
                                        <div class="col-10">
                                            <input type="text"
                                                value="{{ $kelas->nama_kelas }}-{{ $kelas->nama_urutan }}-{{ $kelas->nama_jurusan }}"
                                                name="kelas" class="form-control" id="InputKelas" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <label for="InputWalikelas">Walikelas</label>
                                        </div>
                                        <div class="col-10">

                                            <input type="text" value="{{ $penanganan_masalah->walikelas->nama }}"
                                                name="walikelas" class="form-control" id="InputWalikelas" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <label for="InputKode">Nama Siswa</label>
                                        </div>
                                        <div class="col-10">

                                            <input type="text" value="{{ $penanganan_masalah->siswa->nama }}"
                                                name="kode" class="form-control" id="InputNama" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <label for="InputMasalah">Masalah</label>
                                        </div>
                                        <div class="col-10">

                                            <input type="text" value="{{ $penanganan_masalah->laporan->masalah }}"
                                                name="masalah" class="form-control" id="InputMasalah" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <label for="InputPenanganan">Penanganan</label>
                                        </div>
                                        <div class="col-10">

                                            <textarea style="resize: none" class="form-control" rows="5" readonly>
                                            {{$penanganan_masalah->penanganan}}
                                            </textarea>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- Page specific script -->
@endsection
