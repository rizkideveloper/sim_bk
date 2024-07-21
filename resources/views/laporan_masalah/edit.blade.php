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
                            <li class="breadcrumb-item"><a href="/basisPermasalahan">Basis Permasalahan</a></li>
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
                            <form action="/basisPermasalahan/{{ $basisPermasalahan->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="InputKode">Kode</label>
                                        <input type="text" value="{{ $basisPermasalahan->kode }}" name="kode"
                                            class="form-control @error('kode') is-invalid @enderror" id="InputNama">
                                        @error('kode')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputMasalah">Masalah</label>
                                        <input type="text" value="{{ $basisPermasalahan->masalah }}" name="masalah" class="form-control @error('masalah') is-invalid @enderror"  id="InputMasalah">
                                        @error('masalah')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputPenanganan">Penanganan</label>
                                        <textarea class="form-control @error('penanganan') is-invalid @enderror" name="penanganan" id="InputPenanganan"  rows="3" style="resize: none">{{ $basisPermasalahan->penanganan }}</textarea>
                                        @error('penanganan')
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
