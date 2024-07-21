@extends('dashboard.layouts.main')
@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Basis Permasalahan</h1>
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

                                <a href="/basisPermasalahan/create" class="btn btn-primary">Tambah</a>

                                @if (session()->has('success'))
                                    <div class="alert alert-success mt-3" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tableBasisPermasalahan" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Masalah</th>
                                            <th>Bobot</th>
                                            <th>Penanganan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($basisPermasalahan as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->kode }}</td>
                                                <td>{{ $item->masalah }}</td>
                                                <td>{{ $item->bobot }}</td>
                                                <td>{{ $item->penanganan }}</td>
                                                <td>
                                                    <a href="/basisPermasalahan/{{ $item->id }}/edit"
                                                        class="btn btn-sm btn-warning"><i class="fas fa-pen "></i></a>
                                                    <form action="/basisPermasalahan/{{ $item->id }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Apakah kamu yakin akan menghapus data ini?')"><i
                                                                class="fas fa-trash"></i></button>
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
            $('#tableBasisPermasalahan').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                // "autoWidth": true,
                "responsive": true,
                columns: [{ width: '5%' }, { width: '5%' }, { width: '25%' }, { width: '5%' }, {width: '30%'}, {width: '15%'}, null]
            });
        })
    </script>
@endsection
