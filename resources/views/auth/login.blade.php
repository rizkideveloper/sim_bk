<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIF | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <h5>Sistem Bimbingan dan Konseling SMK MedikaCom</h5>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan Sign In</p>

                @if (session()->has('loginError'))
                    <div class="alert alert-danger mt-3" role="alert">
                        {{ session('loginError') }}
                    </div>
                @endif

                <form action="/login" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                    <div class="input-group mt-2">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                    <div class="row mt-3">
                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/dist/js/adminlte.min.js"></script>
</body>

</html>
