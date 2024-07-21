@extends('dashboard.layouts.main')
@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Laporan Masalah</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 float-sm-right">
                       <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">{{ $kelas->nama }}-{{ $kelas->urutan }}-{{ $kelas->jurusan->nama }}</li>
                        </ol>
                    </div>

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

                                <a href="/laporanMasalah/create" class="btn btn-primary">Tambah</a>

                                @if (session()->has('success'))
                                    <div class="alert alert-success mt-3" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tableLaporanMasalah" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Nama Siswa</th>
                                            <th>Masalah</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($laporan_masalah as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->created_at->format('d F Y') }}</td>
                                                <td>{{ $item->siswa->nama }}</td>
                                                <td>{{ $item->masalah }}</td>
                                                <td><span class="badge {{ $item->status=='Belum Ditangani'? 'badge-danger':($item->status=='Sedang Ditangani'?'badge-warning':'badge-success') }} p-2 rounded-pill ">{{ $item->status }}</span></td>
                                                <td>
                                                    
                                                    @if ($item->status == 'Belum Ditangani')
                                                        <form action="/laporanMasalah/{{ $item->id }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Apakah kamu yakin akan menghapus data ini?')"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                    <a href="/laporanMasalah/kirimLaporan/{{ $item->id }}/{{ $item->siswa_id }}"
                                                        class="btn btn-sm   btn-primary" onclick="return confirm('Apakah kamu yakin akan mengirim data ini ke penaganan masalah?')"><i class="fas fa-paper-plane "></i></a>
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
            $('#tableLaporanMasalah').DataTable({
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
