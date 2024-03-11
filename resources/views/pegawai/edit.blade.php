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
                            <h3 class="box-title">Edit Pegawai</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{url('/pegawai-update',$pegawai->id)}}" enctype="multipart/form-data">

                                <div class="col-xs-12">
                                    @csrf
                                    <div class="col-xs-4">

                                        <div class="form-group has-feedback">
                                            <label for="name">Nama :</label>
                                            <input name="name" value="{{$pegawai->name}}" id="name" class="form-control" placeholder="Name" required>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="status">Status :</label>
                                            <select name="status" id="status" class="form-control">
                                                <!-- <option value="">Pilih Status</option> -->
                                                <option value="{{$pegawai->status}}" selected>{{$pegawai->status}}</option>
                                                <option value="Active">Aktif</option>
                                                <option value="Resign">Resign</option>
                                            </select>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="jabatan">Jabatan :</label>
                                            <select name="jabatan" id="jabatan" class="form-control">
                                                <option value="{{$pegawai->jabatan}}" selected>{{$pegawai->jabatan}}</option>

                                                <!-- <option value="">Pilih Jabatan</option> -->
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
                                                <option value="{{$pegawai->jenis_kelamin}}" selected>{{$pegawai->jenis_kelamin}}</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="tempat_lahir">Tempat Lahir : </label>
                                            <input type="text" value="{{$pegawai->tempat_lahir}}" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="tanggal_lahir">Tanggal Lahir : </label>
                                            <input type="date" name="tanggal_lahir" value="{{$pegawai->tanggal_lahir}}" class="form-control" placeholder="Tanggal Lahir">
                                        </div>

                                        <div class="form-group has-feedback">
                                            <label for="status_perkawinan">Status Perkawinan :</label>
                                            <select name="status_perkawinan" id="status_perkawinan" class="form-control">
                                                <option value="{{$pegawai->status_perkawinan}}" selected>{{$pegawai->status_perkawinan}}</option>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Belum Menikah">Belum Menikah</option>

                                            </select>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="no_ktp">Nomor KTP : </label>
                                            <input type="number" value="{{$pegawai->no_ktp}}" name="no_ktp" maxlength="16" class="form-control" placeholder="Masukan Nmor KTP">
                                        </div>

                                    </div>

                                    <div class="col-xs-4">

                                        <div class="form-group has-feedback">
                                            <label for="nip">NIP : </label>
                                            <input type="number" value="{{$pegawai->nip}}" name="nip" class="form-control" placeholder="Masukan Nomor NIP">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="npwp">NPWP : </label>
                                            <input type="text" value="{{$pegawai->npwp}}" name="npwp" class="form-control" placeholder="Masukan Nomor NPWP">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="no_paspor">Paspor : </label>
                                            <input type="text" value="{{$pegawai->no_paspor}}" name="no_paspor" class="form-control" placeholder="Masukan Nomor Paspor">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="tanggal_mulai_tugas">Tanggal Mulai Tugas : </label>
                                            <input type="date" value="{{$pegawai->tanggal_mulai_tugas}}" name="tanggal_mulai_tugas" class="form-control">
                                        </div>

                                        <div class="form-group has-feedback">
                                            <label for="tgl_spk_pertama">Tanggal SPK Pertama : </label>
                                            <input type="date" value="{{$pegawai->tgl_spk_pertama}}" name="tgl_spk_pertama" class="form-control">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="no_hp">Nomor HP : </label>
                                            <input type="text" value="{{$pegawai->no_hp}}" name="no_hp" class="form-control">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="email_kerja">Email Kerja : </label>
                                            <input type="email" value="{{$pegawai->email_kerja}}" name="email_kerja" class="form-control">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="email_pribadi">Email Pribadi: </label>
                                            <input type="email" value="{{$pegawai->email_pribadi}}" name="email_pribadi" class="form-control">
                                        </div>


                                    </div>

                                    <div class="col-xs-4">

                                        <div class="form-group has-feedback">
                                            <label for="alamat_ktp">Alamat KTP : </label>
                                            <input type="text" value="{{$pegawai->alamat_ktp}}" name="alamat_ktp" class="form-control">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="domisili">Domisili : </label>
                                            <input type="text" value="{{$pegawai->domisili}}" name="domisili" class="form-control">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="nuptk">NUPTK : </label>
                                            <input type="number" value="{{$pegawai->nuptk}}" name="nuptk" class="form-control">
                                        </div>

                                        <div class="form-group has-feedback">
                                            <label for="ppg_2022">PPG 2022 :</label>
                                            <select name="ppg_2022" id="ppg_2022" class="form-control">
                                                <option value="{{$pegawai->ppg_2022}}" selected>{{$pegawai->ppg_2022}}</option>
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
                                            <input type="text" value="{{$pegawai->sertifikasi}}" name="sertifikasi" class="form-control">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="inpassing">Inpassing : </label>
                                            <input type="text" value="{{$pegawai->inpassing}}" name="inpassing" class="form-control">
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label for="photo_resmi">Photo Resmi : </label>
                                            <input type="file" value="{{$pegawai->photo_resmi}}" name="photo_resmi" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="box-footer">
                                    <button type="submit" style="width: 20%;" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Detail</h3>
                        </div>
                        <div class="box-body">
                            <form method="POST" action="{{url('/pegawai-storedetail')}}" enctype="multipart/form-data">
                                @csrf
                                <input style="border-radius: 5px;" type="hidden" value="{{$pegawai->id}}" name="id_pegawai" class="form-control" placeholder="">

                                <div class="col-xs-12">

                                    <div class="col-xs-3">

                                        <div class="box box-default">
                                            <div class="box-header with-border">
                                                <h3 class="box-title" style="font-size: 15px;">Penempatan</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group has-feedback">
                                                    <label for="nip">Unit Penempatan : </label>
                                                    <select style="border-radius: 5px;" name="unit_penempatan" id="unit_penempatan" class="form-control">
                                                        <option value="{{$pegawai->penempatan ? $pegawai->penempatan->unit_penempatan : ''}}" selected>{{$pegawai->penempatan ? $pegawai->penempatan->unit_penempatan : ''}}</option>
                                                        <option value="SIT">Staff Yayasan(SIT)</option>
                                                        <option value="K7 SIT">Petugas K7(K7 SIT)</option>
                                                        <option value="SDIT">SD/SDIT</option>
                                                        <option value="SMPIT">SMP/SMPIT</option>
                                                    </select>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="nip">Tahun Mulai : </label>
                                                    <input style="border-radius: 5px;" type="number" value="{{$pegawai->penempatan ? $pegawai->penempatan->tahun_mulai:''}}" name="tahun_mulai" class="form-control" placeholder="">
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="nip">Status Pegawai : </label>
                                                    <select style="border-radius: 5px;" name="status_pegawai" id="unit_penempatan" class="form-control">
                                                        <option value="{{$pegawai->penempatan ? $pegawai->penempatan->status_pegawai : ''}}" selected>{{$pegawai->penempatan ? $pegawai->penempatan->status_pegawai : ''}}</option>
                                                        <option value="GTY">GTY</option>
                                                        <option value="KTY">KTY</option>
                                                    </select>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="nip">Tanggal Pengangkatan : </label>
                                                    <input style="border-radius: 5px;" style="border-radius: 5px;" type="date" value="{{$pegawai->penempatan ? $pegawai->penempatan->tgl_pengangkatan:''}}" name="tanggal_pengangkatan" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-xs-3">

                                        <div class="box box-default">
                                            <div class="box-header with-border">
                                                <h3 class="box-title" style="font-size: 15px;">Pendidikan</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group has-feedback">
                                                    <label for="nip">Pendidikan Terakhir : </label>
                                                    <select style="border-radius: 5px;" name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control">
                                                        <option value="{{$pegawai->pendidikan ? $pegawai->pendidikan->pendidikan_terakhir : ''}}" selected>{{$pegawai->pendidikan ? $pegawai->pendidikan->pendidikan_terakhir : ''}}</option>
                                                        <option value="S3">S3</option>
                                                        <option value="S2">S2</option>
                                                        <option value="S1">S1</option>
                                                        <option value="D3">D3</option>
                                                        <option value="SLTA">SLTA</option>
                                                        <option value="SLTP">SLTP</option>

                                                    </select>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="nip">Jurusan : </label>
                                                    <input style="border-radius: 5px;" type="text" value="{{$pegawai->pendidikan ? $pegawai->pendidikan->jurusan:''}}" name="jurusan" class="form-control" placeholder="">
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="nip">Tahun Lulus : </label>
                                                    <input style="border-radius: 5px;" type="date" value="{{$pegawai->pendidikan ? $pegawai->pendidikan->tahun_lulus:''}}" name="tahun_lulus" class="form-control" placeholder="">
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="nip">Universitas : </label>
                                                    <input style="border-radius: 5px;" type="text" value="{{$pegawai->pendidikan ? $pegawai->pendidikan->universitas:''}}" name="universitas" class="form-control" placeholder="">
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="nip">Alamat : </label>
                                                    <input style="border-radius: 5px;" type="text" value="{{$pegawai->pendidikan ? $pegawai->pendidikan->alamat:''}}" name="alamat" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-3">

                                        <div class="box box-default">
                                            <div class="box-header with-border">
                                                <h3 class="box-title" style="font-size: 15px;">Bank Account</h3>
                                            </div>
                                            <div class="box-body">
                                                <div class="form-group has-feedback">
                                                    <label for="nip">Nama Bank : </label>
                                                    <input style="border-radius: 5px;" type="text" value="{{$pegawai->bank ? $pegawai->bank->nama_bank:''}}" name="nama_bank" class="form-control" placeholder="">
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="nip">No Rekening : </label>
                                                    <input style="border-radius: 5px;" type="number" value="{{$pegawai->bank ? $pegawai->bank->no_rekening:''}}" name="no_rekening" class="form-control" placeholder="">
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="nip">Pemilik : </label>
                                                    <input style="border-radius: 5px;" type="text" value="{{$pegawai->bank ? $pegawai->bank->pemilik:''}}" name="pemilik" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-xs-3">

                                        <div class="box box-default">
                                            <div class="box-header with-border">
                                                <h3 class="box-title" style="font-size: 15px;">Jaminan Sosial</h3>
                                            </div>
                                            <div class="box-body">

                                                <div class="form-group has-feedback">
                                                    <label for="nip">Asuransi PA : </label>
                                                    <select style="border-radius: 5px;" name="asuransi_pa" id="jenis_kelamin" class="form-control">
                                                        @if($pegawai->jaminan)
                                                        <option value="{{$pegawai->jaminan->asuransi_pa }}" selected>{{$pegawai->jaminan->asuransi_pa==1 ? 'Ya' : 'Tidak'}}</option>
                                                        @endif()
                                                        <option value="1">Ya</option>
                                                        <option value="0">Tidak</option>
                                                    </select>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="nip">BPJS Kesehatan : </label>
                                                    <select style="border-radius: 5px;" name="bpjs_kesehatan" id="jenis_kelamin" class="form-control">
                                                        @if($pegawai->jaminan)
                                                        <option value="{{$pegawai->jaminan->bpjs_kesehatan }}" selected>{{$pegawai->jaminan->bpjs_kesehatan==1 ? 'Ya' : 'Tidak'}}</option>
                                                        @endif()
                                                        <option value="1">Ya</option>
                                                        <option value="0">Tidak</option>
                                                    </select>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="nip">BPJS TK : </label>
                                                    <select style="border-radius: 5px;" name="bpjs_tk" id="jenis_kelamin" class="form-control">
                                                        @if($pegawai->jaminan)
                                                        <option value="{{$pegawai->jaminan->bpjs_tk }}" selected>{{$pegawai->jaminan->bpjs_tk==1 ? 'Ya' : 'Tidak'}}</option>
                                                        @endif()
                                                        <option value="1">Ya</option>
                                                        <option value="0">Tidak</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="box-footer">
                                    <button type="submit" style="width: 20%;" class="btn btn-primary">Save</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
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