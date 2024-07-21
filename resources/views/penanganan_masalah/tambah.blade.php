@extends('dashboard.layouts.main')
@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Tambah</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/penangananMasalah">Penanganan Masalah</a></li>
                            <li class="breadcrumb-item active">Form Tambah</li>
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
                            <form action="/laporanMasalah" method="POST">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="InputNamaSiswa">Nama Siswa</label>
                                        <input type="text" class="form-control">
                                        @error('namaSiswa')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="InputMasalah">Masalah</label>
                                        <input type="text" value="" name="masalah"
                                            class="form-control @error('masalah') is-invalid @enderror" id="InputMasalah">
                                        @error('masalah')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
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
@endsection
