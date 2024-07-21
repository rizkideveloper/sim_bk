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
                            <li class="breadcrumb-item"><a href="/user">Data Pengguna</a></li>
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
                            <form action="/user" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="InputNip">NIP</label>
                                        <input type="number" value="{{ old('nip') }}" name="nip"
                                            class="form-control @error('nip') is-invalid @enderror" id="InputNip">
                                        @error('nip')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputNama">Nama</label>
                                        <input type="text" value="{{ old('nama') }}" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror" id="InputNama">
                                        @error('nama')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputEmail">Email</label>
                                        <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror"  id="InputEmail">
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
                                                <option value="{{ $item->id }}">{{ $item->role }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="InputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="InputPassword1">
                                        @error('password')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="InputPassword2">Confirm Password</label>
                                        <input type="password" name="password_confirm" class="form-control @error('password_confirm') is-invalid @enderror"
                                            id="InputPassword2">
                                        @error('password_confirm')
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

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2({
                tags: true
            })

        })
    </script>
@endsection
