<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class PegawaiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $currentDate = Carbon::now();
        $getData = Pegawai::with(['penempatan', 'pendidikan', 'bank', 'jaminan','resign'])->get();
        $mapData=[];
        foreach ($getData as $key => $value) {
            $dateOfBirth = Carbon::createFromFormat('Y-m-d', $value->tanggal_lahir);
            if ($value->jaminan) {
                $asuransiPa=$value->jaminan->asuransi_pa==1?'Ya':'Tidak';
                $bpjsKesehatan=$value->jaminan->bpjs_kesehatan==1?'Ya':'Tidak';
                $bpjsTk=$value->jaminan->bpjs_tk==1?'Ya':'Tidak';
            }
            $mapData[]=[
                'no' => $key + 1,
                'nama'=>$value->name,
                'status'=>$value->status,
                'jenis_kelamin'=>$value->jenis_kelamin,
                'tempat_lahir'=>$value->tempat_lahir,
                'tanggal_lahir'=>$value->tanggal_lahir,
                'usia_sekarang'=>$dateOfBirth->diffInYears($currentDate),
                'status_perkawinan'=>$value->status_perkawinan,
                'pendidikan_terakhir'=>$value->pendidikan ? $value->pendidikan->pendidikan_terakhir:'',
                'jurusan'=>$value->pendidikan ? $value->pendidikan->jurusan:'',
                'universitas'=>$value->pendidikan ? $value->pendidikan->universitas:'',
                'no_ktp'=>$value->no_ktp,
                'nip'=>$value->nip,
                'npwp'=>$value->npwp,
                'no_pasport'=>$value->no_paspor,
                'tmt'=>$value->tanggal_mulai_tugas,
                'tgl_spk_pertama'=>$value->tgl_spk_pertama,
                'no_hp'=>$value->no_hp,
                'email_kerja'=>$value->email_kerja,
                'email_pribadi'=>$value->email_pribadi,
                'alamat_ktp'=>$value->alamat_ktp,
                'alamat_domisili'=>$value->domisili,
                'nama_bank'=>$value->bank ? $value->bank->nama_bank:'',
                'no_rekening'=>$value->bank ? $value->bank->no_rekening. 'AN/'.$value->bank->pemilik:'',
                'unit_penempatan'=>$value->penempatan ? $value->penempatan->unit_penempatan:'',
                'tahun_mulai'=>$value->penempatan ? $value->penempatan->tahun_mulai:'',
                'status_pegawai'=>$value->penempatan ? $value->penempatan->status_pegawai:'',
                'tgl_pengangkatan'=>$value->penempatan ? $value->penempatan->tgl_pengangkatan:'',
                'tgl_resign'=>$value->resign? $value->resign->tgl_resign:'',
                'usia_resign'=>$value->resign? $value->resign->tgl_resign:'',
                'masa_kerja_resign'=>$value->resign? $value->resign->tgl_resign:'',
                'asuransi_pa'=>$value->jaminan? $asuransiPa:'',
                'bpjs_kesehatan'=>$value->jaminan? $bpjsKesehatan:'',
                'bpjs_tk'=>$value->jaminan? $bpjsTk:'',
                'nuptk'=>$value->nuptk,
                'ppg_2022'=>$value->ppg_2022,
                'sertifikasi'=>$value->sertifikasi,
                'inpassing'=>$value->inpassing,
                'photi_resmi'=>$value->photo_resmi,

            ];
        }
        $collection = collect($mapData);
        return $collection;
    }

    public function headings(): array
    {
        $header = [
            [
                'NO',
                'NAMA PEGAWAI',
                'STATUS',
                'JENIS KELAMIN ',
                'TEMPAT LAHIR',
                'TANGGAL LAHIR',
                'USIA SEKARANG',
                'STATUS PERKAWINAN',
                'PENDIDIKAN TERAKHIR',
                'JURUSAN',
                'UNIVERSITAS',
                'NO KTP',
                'NIP',
                'NPWP',
                'NO PASPOR',
                'TANGGAL MULAI TUGAS',
                'TGL SPK PERTAMA',
                'NO HP',
                'EMAIL KERJA',
                'EMAIL PRIBADI',
                'ALAMAT KTP',
                'DOMISILI',
                'NAMA BANK',
                'NO REKENING',
                'UNIT PENEMPATAN',
                'TAHUN MULAI',
                'STATUS PEGAWAI',
                'TGL PENGANGKATAN',
                'TGL RESIGN',
                'USIA RESIGN',
                'MASA KERJA',
                'ASURANSI PA',
                'BPJS KESEHATAN',
                'BPJS TK',
                'NUPTK',
                'PPG 2022',
                'SERTIFIKASI',
                'INPASSING',
                'PHOTO RESMI',
            ]
        ];

        return $header;
    }
}
