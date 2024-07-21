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
                            <li class="breadcrumb-item"><a href="/walikelas">Data WaliKelas</a></li>
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
                            <form action="/walikelas/{{ $walikelas->walikelas_id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="InputNip">NIP</label>
                                        <input type="text" name="nip" value="{{ $walikelas->nip }}"
                                            class="form-control @error('nip') is-invalid @enderror" id="InputNip">
                                        @error('nip')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputNama">Nama</label>
                                        <input type="text" name="nama" value="{{ $walikelas->nama_walikelas }}"
                                            class="form-control @error('nama') is-invalid @enderror" id="InputNama">
                                        @error('nama')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="InputJK">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="InputJK"
                                            class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            @foreach ($jk as $item)
                                                <option {{ ($item == $walikelas->jenis_kelamin)?"selected":"" }} value="{{$item}}">{{$item}}</option>
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
                                        <input type="text" name="alamat" value="{{ $walikelas->alamat }}"
                                            class="form-control @error('alamat') is-invalid @enderror" id="InputAlamat">
                                        @error('alamat')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputNoTelp">No Telp</label>
                                        <input type="number" name="no_telp" value="{{ $walikelas->no_telp }}"
                                            class="form-control @error('no_telp') is-invalid @enderror" id="InputNoTelp">
                                        @error('no_telp')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="InputKelas">Walikelas</label>
                                        <select name="kelas_id" id="InputKelas"
                                            class="form-control @error('kelas') is-invalid @enderror">
                                            <option value="">Pilih Kelas</option>
                                            @foreach ($kelas as $item)
                                                <option {{ ($item->id == $walikelas->kelas_id)?"selected":"" }} value="{{ $item->id }}">
                                                    {{ $item->nama }}-{{ $item->urutan }}-{{ $item->jurusan->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kelas')
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
