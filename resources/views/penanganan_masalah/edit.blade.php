@extends('dashboard.layouts.main')
@section('container')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Penanganan Siswa Bermasalah</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/penangananMasalah">Penanganan Masalah</a></li>
                            <li class="breadcrumb-item active">Form Penanganan Siswa Bermasalah</li>
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
                            <form>
                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col-2">
                                            <label for="InputKelas">Kelas</label>
                                        </div>
                                        <div class="col-10">
                                            <input type="text"
                                                value="{{ $kelas->nama_kelas }}-{{ $kelas->nama_urutan }}-{{ $kelas->nama_jurusan }}"
                                                name="kelas" class="form-control" id="InputKelas" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <label for="InputWalikelas">Walikelas</label>
                                        </div>
                                        <div class="col-10">

                                            <input type="text" value="{{ $penanganan_masalah->walikelas->nama }}"
                                                name="walikelas" class="form-control" id="InputWalikelas" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <label for="InputKode">Nama Siswa</label>
                                        </div>
                                        <div class="col-10">

                                            <input type="text" value="{{ $penanganan_masalah->siswa->nama }}"
                                                name="kode" class="form-control" id="InputNama" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-2">
                                            <label for="InputMasalah">Masalah</label>
                                        </div>
                                        <div class="col-10">

                                            <input type="text" value="{{ $penanganan_masalah->laporan->masalah }}"
                                                name="masalah" class="form-control" id="InputMasalah" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
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

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary card-penangananMasalah">
                            <!-- form start -->
                            <form>
                                <div class="card-body card-body-kategoriMasalah">

                                    <div class="form-group">
                                        <label for="InputKategoriMasalah">Basis Masalah</label>
                                        <select name="kategori_masalah" id="InputKategoriMasalah" class="form-control">

                                            @foreach ($basis_masalah as $item)
                                                <option value="{{ $item->id }}">{{ $item->kode }} -
                                                    {{ $item->masalah }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori_masalah')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                </div>

                                <!-- /.card-body -->
                            </form>
                            <div class="card-footer card-footer-submit ">
                                <button class="btn btn-primary" id="btn-submit">Submit</button>
                            </div>
                            <div class="card-footer card-footer-submit2 " style="display: none">
                                <button class="btn btn-primary" id="btn-submit2">Submit</button>
                            </div>
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

    <!-- Page specific script -->
    <script>
        $(function() {
            $("#InputKategoriMasalah").select2({
                tags: true
            });
        })


        $("#btn-submit").click(function() {

            var kategori_masalah = $("#InputKategoriMasalah").val();
            // console.log(kategori_masalah)
            let token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: "POST",
                url: "/penangananMasalah/check_KategoriMasalah",
                data: {
                    'kategori_masalah': kategori_masalah,
                    'id_penanganan': {{ $penanganan_masalah->id }},
                    '_token': token
                },
                cache: false,
                success: function(data) {
                    if (data.status == 1) {
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Berhasil melakukan penanganan masalah, Silahkan tekan tombol OK',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.href = '/penangananMasalah'
                            }
                        });
                    } else {
                        var input_baru =
                            `
                <div class="form-group kode-group">
                    <label for="InputKode">Kode</label>
                    <input type="text" 
                    name="kode" class="form-control" id="InputKode">
                </div>

                <div class="form-group bobot-group">
                    <label for="InputBobot">Bobot</label>
                    <select name="bobot" id="InputBobot" class="form-control">
                        <option value="">Pilih Bobot</option>
                        <option value="1">1 - Ringan</option>
                        <option value="3">3 - Sedang</option>
                        <option value="5">5 - Berat</option>             
                    </select>
                </div>

                <div class="form-group penanganan-group">
                    <label for="InputPenanganan">Penanganan</label>
                    <textarea class="form-control" name="penanganan" id="InputPenanganan" rows="3" style="resize: none"></textarea>
                </div>
                `

                        $('.card-footer-submit').attr('style', 'display:none')
                        $('.card-footer-submit2').removeAttr('style')
                        $(".card-body-kategoriMasalah").append(input_baru);

                        $('#InputKode').keyup(function() {
                            this.value = this.value.toUpperCase()
                        })


                    }
                }
            });
        })

        $("#btn-submit2").click(function() {
            var masalah = $("#InputKategoriMasalah").val();
            var kode = $("#InputKode").val();
            var bobot = $("#InputBobot").val();
            var penanganan = $("#InputPenanganan").val();

            // console.log(masalah,kode,penanganan)

            let token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type: "PUT",
                url: "/penangananMasalah/" + {{ $penanganan_masalah->id }},
                data: {
                    'masalah': masalah,
                    'kode': kode,
                    'bobot': bobot,
                    'penanganan': penanganan,
                    '_token': token
                },
                cache: false,
                success: function(data) {
                    if (data.status == 402) {
                        if (data.errors.kode) {
                            $('.kode-group').append(
                                `
                                    <small class="text-danger"> 
                                        ` +
                                data.errors.kode + `  
                                    </small>
                                `
                            )
                        }

                        if (data.errors.penanganan) {
                            $('.penanganan-group').append(
                                `
                                    <small class="text-danger"> 
                                        ` +
                                data.errors.penanganan + `  
                                    </small>
                                `
                            )
                        }

                        if (data.errors.bobot) {
                            $('.bobot-group').append(
                                `
                                    <small class="text-danger"> 
                                        ` +
                                data.errors.bobot + `  
                                    </small>
                                `
                            )
                        }
                    } else {

                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Berhasil melakukan penanganan masalah, Silahkan tekan tombol OK',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.href = '/penangananMasalah'
                            }
                        });
                    }
                }
            });
        })
    </script>
@endsection
