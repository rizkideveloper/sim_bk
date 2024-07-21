@extends('dashboard.layouts.main')
@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Pengguna</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                                <a href="/user/create" class="btn btn-primary">Tambah</a>

                                @if (session()->has('success'))
                                    <div class="alert alert-success mt-3" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tableUser" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nip }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->role->role }}</td>
                                                <td>
                                                    <a href="/user/{{ $item->id }}/edit" class="btn btn-warning"><i
                                                            class="fas fa-pen "></i></a>
                                                    <form action="/user/{{ $item->id }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger"
                                                            onclick="return confirm('Apakah kamu yakin akan menghapus data ini?')"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- Page specific script -->
    <script>
        $(function() {
            $('#tableUser').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        })
    </script>
@endsection
