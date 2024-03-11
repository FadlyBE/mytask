@extends('layouts.master')

@section('title')
Admin List
@endsection

@section('content')

@if(Auth::user()->role_id == 1)
<!-- DataTales Example -->
<div class="content-wrapper" style="border-radius: 7px">
    <div class="card-header">
        <section class="content-header">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tambah Pegawai</h3>
                        </div>
                        <div class="box-body">
                            <!-- <div class="row"> -->
                                <div class="col-xs-12">
                                    <form method="POST" action="{{route('pegawai.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-xs-4">

                                            <div class="form-group has-feedback">
                                                <label for="name">Nama :</label>
                                                <input name="name" id="name" class="form-control" placeholder="Name" required>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="status">Status :</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="">Pilih Status</option>
                                                    <option value="Active">Aktif</option>
                                                    <option value="Resign">Resign</option>
                                                </select>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="jabatan">Jabatan :</label>
                                                <select name="jabatan" id="jabatan" class="form-control">
                                                    <option value="">Pilih Jabatan</option>
                                                    <option value="OB">OB</option>
                                                    <option value="Operator">Operator</option>
                                                    <option value="Guru">Guru</option>
                                                    <option value="TU">TU</option>
                                                    <option value="Scurity">Scurity</option>
                                                    <option value="Administrator">Admin</option>

                                                </select>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="jenis_kelamin">Jenis Kelamin :</label>
                                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="tempat_lahir">Tempat Lahir : </label>
                                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="tanggal_lahir">Tanggal Lahir : </label>
                                                <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir">
                                            </div>

                                            <div class="form-group has-feedback">
                                                <label for="status_perkawinan">Status Perkawinan :</label>
                                                <select name="status_perkawinan" id="status_perkawinan" class="form-control">
                                                    <option value="">Pilih Status Perkawinan</option>
                                                    <option value="Menikah">Menikah</option>
                                                    <option value="Belum Menikah">Belum Menikah</option>
                                                </select>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="no_ktp">Nomor KTP : </label>
                                                <input type="number" name="no_ktp" maxlength="16" class="form-control" placeholder="Masukan Nmor KTP">
                                            </div>

                                        </div>

                                        <div class="col-xs-4">



                                            <div class="form-group has-feedback">
                                                <label for="nip">NIP : </label>
                                                <input type="number" name="nip" maxlength="8" class="form-control" placeholder="Masukan Nomor NIP">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="npwp">NPWP : </label>
                                                <input type="text" name="npwp" class="form-control" placeholder="Masukan Nomor NPWP">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="no_paspor">Paspor : </label>
                                                <input type="text" name="no_paspor" class="form-control" placeholder="Masukan Nomor Paspor">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="tanggal_mulai_tugas">Tanggal Mulai Tugas : </label>
                                                <input type="date" name="tanggal_mulai_tugas" class="form-control">
                                            </div>

                                            <div class="form-group has-feedback">
                                                <label for="tgl_spk_pertama">Tanggal SPK Pertama : </label>
                                                <input type="date" name="tgl_spk_pertama" class="form-control">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="no_hp">Nomor HP : </label>
                                                <input type="text" name="no_hp" class="form-control">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="email_kerja">Email Kerja : </label>
                                                <input type="email" name="email_kerja" class="form-control">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="email_pribadi">Email Pribadi: </label>
                                                <input type="email" name="email_pribadi" class="form-control">
                                            </div>


                                        </div>

                                        <div class="col-xs-4">

                                            <div class="form-group has-feedback">
                                                <label for="alamat_ktp">Alamat KTP : </label>
                                                <input type="text" name="alamat_ktp" class="form-control">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="domisili">Domisili : </label>
                                                <input type="text" name="domisili" class="form-control">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="nuptk">NUPTK : </label>
                                                <input type="number" name="nuptk" class="form-control">
                                            </div>

                                            <div class="form-group has-feedback">
                                                <label for="ppg_2022">PPG 2022 :</label>
                                                <select name="ppg_2022" id="ppg_2022" class="form-control">
                                                    <option value="">Pilih PPG 2022</option>
                                                    <option value="Lulus">Lulus</option>
                                                    <option value="Pengajuan">Pegajuan</option>
                                                    <option value="Pra PPG">Pra PPG</option>
                                                    <option value="Pra PPG">Pra PPG</option>
                                                    <option value="Pengajuan">Pegajuan</option>
                                                    <option value="Lulus">Lulus</option>
                                                    <option value="Ditolak">Ditolak</option>
                                                </select>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="sertifikasi">Sertifikasi : </label>
                                                <input type="text" name="sertifikasi" class="form-control">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="inpassing">Inpassing : </label>
                                                <input type="text" name="inpassing" class="form-control">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="photo_resmi">Photo Resmi : </label>
                                                <input type="file" name="photo_resmi" class="form-control">
                                            </div>
                                        </div>


                                </div>

                                <div class="box-footer">
                                    <button type="submit" style="width: 20%;" class="btn btn-primary">Save</button>
                                </div>
                                </form>

                            <!-- </div> -->
                        </div>
                    </div>

                </div>
            </div>
    </div>
    </section>
</div>
</div>

<!-- Modal master to edit and update-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="border-radius: 7px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            </div>
            <div class="modal-body">
                <div id="page" class="p-2"></div>
            </div>
        </div>
    </div>
</div>
@else()
<div class="content-wrapper" style="background-color: red;border-radius: 7px">
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Oops! Anda tidak memiliki hak akses halaman ini.</h3>

                <p>
                    kami tidak dapat menampilkan halaman yang anda minta. sementara itu, anda dapat <a href="{{url('/home')}}">kembali ke Dashboard</a> atau tekan tombol di bawah ini
                </p>


                <a href="{{url('/home')}}" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-dashboard"></i>
                    Kembali
                </a>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
</div>
@endif()

@endsection


@push('scripts')
@endpush