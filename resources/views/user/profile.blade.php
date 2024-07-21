@extends('dashboard.layouts.main')
@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>My Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">My Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="/assets/dist/img/user2.jpg"
                                        alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ auth()->user()->nama }}</h3>

                                <p class="text-muted text-center">{{ $user_role->role }}</p>

                                <p class="text-muted text-center">{{ auth()->user()->email }}</p>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card card-primary card-outline">

                            <div class="card-body">
                                @if (session()->has('changePasswordError'))
                                    <div class="alert alert-danger mt-3" role="alert">
                                        {{ session('changePasswordError') }}
                                    </div>
                                @endif
                                @if (session()->has('changePasswordSuccess'))
                                    <div class="alert alert-success mt-3" role="alert">
                                        {{ session('changePasswordSuccess') }}
                                    </div>
                                @endif
                                <form action="/user/changePassword" method="post" class="form-horizontal">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group row">
                                        <label for="inputPasswordLama" class="col-sm-3 col-form-label">Password Lama</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password_lama" class="form-control"
                                                id="inputPasswordLama">
                                            @error('password_lama')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPasswordBaru" class="col-sm-3 col-form-label">Password Baru</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="password_baru" class="form-control"
                                                id="inputPasswordBaru">
                                            @error('password_baru')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputKonfirmasiPassword" class="col-sm-3 col-form-label">Konfirmasi
                                            Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" name="konfirmasi_password" class="form-control"
                                                id="inputKonfirmasiPassword">
                                            @error('konfirmasi_password')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
