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
                            <li class="breadcrumb-item"><a href="/user">Data Pengguna</a></li>
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
                            <form action="/user/{{ $user->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="InputNip">NIP</label>
                                        <input type="number" value="{{ $user->nip }}" name="nip"
                                            class="form-control @error('nip') is-invalid @enderror" id="InputNip">
                                        @error('nip')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputNama">Nama</label>
                                        <input type="text" name="nama" value="{{ $user->nama }}"
                                            class="form-control @error('nama') is-invalid @enderror" id="InputNama">
                                        @error('nama')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail">Email</label>
                                        <input type="email" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror"  id="InputEmail">
                                        @error('email')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputRole">Role</label>
                                        <select name="role" id="InputRole" class="form-control @error('role') is-invalid @enderror">
                                            <option value="">Pilih Role</option>
                                            @foreach ($role as $item)
                                                <option {{ ($item->id == $user->role_id)?"selected ":"" }} value="{{ $item->id }}">{{ $item->role }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
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
