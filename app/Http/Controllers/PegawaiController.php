<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    User,
    RoleUser,
    Pegawai,
    BankAccount,
    JaminanSosial,
    Pendidikan,
    Penempatan,
    Resign
};
use RealRashid\SweetAlert\Facades\Alert;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;
use Exception;
use App\Exports\PegawaiExport;
use Excel;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();

        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pegawai = new Pegawai;
        $pegawai->name = $request->name;
        $pegawai->status = $request->status;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->tempat_lahir = $request->tempat_lahir;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->status_perkawinan = $request->status_perkawinan;
        $pegawai->no_ktp = $request->no_ktp;
        $pegawai->nip = $request->nip;
        $pegawai->npwp = $request->npwp;
        $pegawai->no_paspor = $request->no_paspor;
        $pegawai->tanggal_mulai_tugas = $request->tanggal_mulai_tugas;
        $pegawai->tgl_spk_pertama = $request->tgl_spk_pertama;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->email_kerja = $request->email_kerja;
        $pegawai->email_pribadi = $request->email_pribadi;
        $pegawai->alamat_ktp = $request->alamat_ktp;
        $pegawai->domisili = $request->domisili;
        $pegawai->nuptk = $request->nuptk;
        $pegawai->ppg_2022 = $request->ppg_2022;
        $pegawai->sertifikasi = $request->sertifikasi;
        $pegawai->inpassing = $request->inpassing;
        $pegawai->photo_resmi = $request->photo_resmi;
        $pegawai->save();

        return redirect()->route('pegawai.edit',  $pegawai->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::with(['penempatan', 'pendidikan', 'bank', 'jaminan','resign'])->where('id', $id)->first();
        return view('pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->name = $request->name;
        $pegawai->status = $request->status;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->tempat_lahir = $request->tempat_lahir;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->status_perkawinan = $request->status_perkawinan;
        $pegawai->no_ktp = $request->no_ktp;
        $pegawai->nip = $request->nip;
        $pegawai->npwp = $request->npwp;
        $pegawai->no_paspor = $request->no_paspor;
        $pegawai->tanggal_mulai_tugas = $request->tanggal_mulai_tugas;
        $pegawai->tgl_spk_pertama = $request->tgl_spk_pertama;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->email_kerja = $request->email_kerja;
        $pegawai->email_pribadi = $request->email_pribadi;
        $pegawai->alamat_ktp = $request->alamat_ktp;
        $pegawai->domisili = $request->domisili;
        $pegawai->nuptk = $request->nuptk;
        $pegawai->ppg_2022 = $request->ppg_2022;
        $pegawai->sertifikasi = $request->sertifikasi;
        $pegawai->inpassing = $request->inpassing;
        $pegawai->photo_resmi = $request->photo_resmi;
        $pegawai->save();

        return redirect()->route('pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getPegawai=Pegawai::find($id);
        $getPenempatan = Penempatan::where('pegawai_id', $id)->first();
        if ($getPenempatan) {
            $getPenempatan->delete();
        }
        $getPendidikan = Pendidikan::where('pegawai_id', $id)->first();
        if ($getPendidikan) {
            $getPendidikan->delete();
        }
        $getBankAccount = BankAccount::where('pegawai_id', $id)->first();
        if ($getBankAccount) {
            $getBankAccount->delete();
        }
        $getJaminanSosial = JaminanSosial::where('pegawai_id', $id)->first();
        if ($getJaminanSosial) {
            $getJaminanSosial->delete();
        }
        $getResign = Resign::where('pegawai_id', $id)->first();
        if ($getResign) {
            $getResign->delete();
        }
        $getPegawai->delete();
        
        Alert::success('Success', 'Data Deleted');
        return redirect()->back();


    }

    public function storedetail(Request $request)
    {
        DB::beginTransaction();
        try {
        $id = $request->id_pegawai;
        $getPenempatan = Penempatan::where('pegawai_id', $id)->first();
        if ($getPenempatan) {
            $getPenempatan->unit_penempatan = $request->unit_penempatan;
            $getPenempatan->tahun_mulai = $request->tahun_mulai;
            $getPenempatan->status_pegawai = $request->status_pegawai;
            $getPenempatan->tgl_pengangkatan = $request->tanggal_pengangkatan;
            $getPenempatan->save();
        } else {
            $penempatan = new Penempatan();
            $penempatan->pegawai_id = $id;
            $penempatan->unit_penempatan = $request->unit_penempatan;
            $penempatan->tahun_mulai = $request->tahun_mulai;
            $penempatan->status_pegawai = $request->status_pegawai;
            $penempatan->tgl_pengangkatan = $request->tanggal_pengangkatan;
            $penempatan->save();
        }
        $getPendidikan = Pendidikan::where('pegawai_id', $id)->first();
        if ($getPendidikan) {
            $getPendidikan->pendidikan_terakhir = $request->pendidikan_terakhir;
            $getPendidikan->tahun_lulus = $request->tahun_lulus;
            $getPendidikan->jurusan = $request->jurusan;
            $getPendidikan->universitas = $request->universitas;
            $getPendidikan->alamat = $request->alamat;
            $getPendidikan->save();
        } else {
            $pendidikan = new Pendidikan();
            $pendidikan->pegawai_id = $id;
            $pendidikan->pendidikan_terakhir = $request->pendidikan_terakhir;
            $pendidikan->tahun_lulus = $request->tahun_lulus;
            $pendidikan->jurusan = $request->jurusan;
            $pendidikan->universitas = $request->universitas;
            $pendidikan->alamat = $request->alamat;
            $pendidikan->save();
        }
        $getBankAccount = BankAccount::where('pegawai_id', $id)->first();
        if ($getBankAccount) {
            $getBankAccount->nama_bank = $request->nama_bank;
            $getBankAccount->no_rekening = $request->no_rekening;
            $getBankAccount->pemilik = $request->pemilik;
            $getBankAccount->save();
        }else{
            $bankAcount = new BankAccount();
            $bankAcount->pegawai_id = $id;
            $bankAcount->nama_bank = $request->nama_bank;
            $bankAcount->no_rekening = $request->no_rekening;
            $bankAcount->pemilik = $request->pemilik;
            $bankAcount->save();
        }
        $getJaminanSosial = JaminanSosial::where('pegawai_id', $id)->first();
        if ($getJaminanSosial) {
            $getJaminanSosial->asuransi_pa = $request->asuransi_pa;
            $getJaminanSosial->bpjs_kesehatan = $request->bpjs_kesehatan;
            $getJaminanSosial->bpjs_tk = $request->bpjs_tk;
            $getJaminanSosial->save();
        }else{
            $jaminanSosial = new JaminanSosial();
            $jaminanSosial->pegawai_id = $id;
            $jaminanSosial->asuransi_pa = $request->asuransi_pa;
            $jaminanSosial->bpjs_kesehatan = $request->bpjs_kesehatan;
            $jaminanSosial->bpjs_tk = $request->bpjs_tk;
            $jaminanSosial->save();
        }
        
        Alert::success('Success', 'Data Updated');
        DB::commit();
        return redirect()->back();

    } catch (Exception $exception) {
        Alert::error('Failed', $exception->getMessage());
        DB::rollBack();
        return redirect()->back();
    }
      
        return redirect()->route('pegawai.index');
    }

    public function export() 
    {
        return Excel::download(new PegawaiExport, 'pegawai.xlsx');
    }
}
