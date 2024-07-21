<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIF | {{ $title }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">

    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">

        @include('dashboard.partials.navbar')
        @include('dashboard.partials.sidebar')
        @yield('container')

        <footer class="main-footer">
            <strong>Copyright &copy; 2024 SMK MedikaCom</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.1.0
            </div>
        </footer>
    </div>

    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- Select2 -->
    <script src="/assets/plugins/select2/js/select2.full.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- AdminLTE App -->
    <script src="/assets/dist/js/adminlte.js"></script>

</body>

</html>
