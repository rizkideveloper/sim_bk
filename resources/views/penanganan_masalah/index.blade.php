@extends('dashboard.layouts.main')
@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Penanganan Masalah</h1>
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
                                <a href="/penangananMasalah/cetak_pdf" class="btn btn-primary" target="_blank" rel="noopener noreferrer">
                                    <i class="fas fa-solid fa-file-pdf"></i> Download PDF
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tablePenangananMasalah" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Walikelas</th>
                                            <th>Kelas</th>
                                            <th>Nama Siswa</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penanganan_masalah as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ date('d F Y', strtotime($item->created_at)) }}</td>
                                                <td>{{ $item->nama_walikelas }}</td>
                                                <td>{{ $item->nama_kelas }}-{{ $item->nama_urutan }}-{{ $item->nama_jurusan }}
                                                </td>
                                                <td>{{ $item->nama_siswa }}</td>
                                                <td><span
                                                        class="badge {{ $item->status == 'Belum Ditangani' ? 'badge-danger' : ($item->status == 'Sedang Ditangani' ? 'badge-warning' : 'badge-success') }} p-2 rounded-pill ">{{ $item->status }}</span>
                                                </td>
                                                <td>
                                                    @if ($item->status == 'Sedang Ditangani')
                                                        <a href="/penangananMasalah/{{ $item->id_penanganan }}/edit"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fas fa-solid fa-arrow-right"></i>
                                                        </a>
                                                    @else
                                                        
                                                    <a href=" /penangananMasalah/{{ $item->id }}"
                                                        class="btn btn-sm   btn-primary"><i class="fas fa-eye "></i></a>
                                                    @endif

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
            $('#tablePenangananMasalah').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                // columns: [{ width: '5%' }, { width: '5%' }, { width: '25%' }, { width: '50%' }, null]
            });
        })
    </script>
@endsection
