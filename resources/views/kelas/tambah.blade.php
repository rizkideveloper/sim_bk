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
                            <li class="breadcrumb-item"><a href="/kelas">Data Kelas</a></li>
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
                            <form action="/kelas" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="InputNama">Nama Kelas</label>
                                        <select name="nama" id="InputNama"
                                            class="form-control @error('nama') is-invalid @enderror">
                                            <option value="">Pilih Nama Kelas</option>
                                            @foreach ($nama_kelas as $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                        @error('nama')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="InputJurusan">Jurusan </label>
                                        <select name="jurusan" id="InputJurusan"
                                            class="form-control @error('jurusan') is-invalid @enderror">
                                            <option value="">Pilih Jurusan</option>
                                            @foreach ($jurusan as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama}}</option>
                                            @endforeach
                                        </select>
                                        @error('jurusan')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="InputUrutan">Urutan Kelas</label>
                                        <input type="text" value="{{ old('urutan') }}" name="urutan"
                                            class="form-control @error('urutan') is-invalid @enderror" id="InputUrutan">
                                        @error('urutan')
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
