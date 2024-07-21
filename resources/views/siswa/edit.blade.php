@extends('dashboard.layouts.main')
@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/siswa">Data Siswa</a></li>
                            <li class="breadcrumb-item active">Form Edit</li>
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
                            <form action="/siswa/{{ $siswa->siswa_id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="InputNama">Nama</label>
                                        <input type="text" name="nama" value="{{ $siswa->nama_siswa }}"
                                            class="form-control @error('nama') is-invalid @enderror" id="InputNama">
                                        @error('nama')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="InputJK">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="InputJK" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            @foreach ($jenis_kelamin as $item)
                                                <option {{ ($item == $siswa->jenis_kelamin)?"selected":"" }} value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @error('jenis_kelamin')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="InputAlamat">Alamat</label>
                                        <input type="text" name="alamat" value="{{ $siswa->alamat }}"
                                            class="form-control @error('alamat') is-invalid @enderror" id="InputAlamat">
                                        @error('alamat')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="InputNoTelp">No Telpon</label>
                                        <input type="text" name="no_telp" value="{{ $siswa->no_telp }}"
                                            class="form-control @error('no_telp') is-invalid @enderror" id="InputNoTelp">
                                        @error('no_telp')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="InputKelas">Kelas</label>
                                        <select name="kelas_id" id="InputKelas" class="form-control @error('kelas_id') is-invalid @enderror">
                                            <option value="">Pilih Kelas</option>
                                            @foreach ($kelas as $item)
                                                <option {{ ($item->id == $siswa->kelas_id)?"selected":"" }} value="{{ $item->id }}">{{ $item->nama }}-{{ $item->urutan }}-{{
                                                $item->jurusan->nama}}</option>
                                            @endforeach
                                        </select>
                                        @error('kelas_id')
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
