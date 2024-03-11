<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
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

class HomeController extends Controller
{
    public function index()
    {
        $countResignData = count(Resign::all());
        $countallPegawai = count(Pegawai::all());


        $maleCount = Pegawai::where('jenis_kelamin', 'Laki-Laki')->count();
        $femaleCount = Pegawai::where('jenis_kelamin', 'Perempuan')->count();

        $totalCount = $maleCount + $femaleCount;

        $malePercentage = $totalCount > 0 ? ($maleCount / $totalCount) * 100 : 0;
        $femalePercentage = $totalCount > 0 ? ($femaleCount / $totalCount) * 100 : 0;

        $employees = Pegawai::all();

        $ageRanges = [
            '0-20' => 0,
            '21-30' => 0,
            '31-40' => 0,
            '41-50' => 0,
            '51+' => 0,
        ];

        foreach ($employees as $employee) {
            $age = \Carbon\Carbon::parse($employee->tanggal_lahir)->age;
            if ($age <= 20) {
                $ageRanges['0-20']++;
            } elseif ($age <= 30) {
                $ageRanges['21-30']++;
            } elseif ($age <= 40) {
                $ageRanges['31-40']++;
            } elseif ($age <= 50) {
                $ageRanges['41-50']++;
            } else {
                $ageRanges['51+']++;
            }
        }

    
        $experienceRanges = [
            '0-1 year' => 0,
            '1-3 years' => 0,
            '3-5 years' => 0,
            '5-10 years' => 0,
            '10+ years' => 0,
        ];
        
        // Hitung lama bekerja masing-masing pegawai dan tambahkan ke dalam rentang yang sesuai
        foreach ($employees as $employee) {
            $hireDate = \Carbon\Carbon::parse($employee->tanggal_mulai_tugas);
            $yearsOfWork = $hireDate->diffInYears(\Carbon\Carbon::now());
            
            if ($yearsOfWork <= 1) {
                $experienceRanges['0-1 year']++;
            } elseif ($yearsOfWork <= 3) {
                $experienceRanges['1-3 years']++;
            } elseif ($yearsOfWork <= 5) {
                $experienceRanges['3-5 years']++;
            } elseif ($yearsOfWork <= 10) {
                $experienceRanges['5-10 years']++;
            } else {
                $experienceRanges['10+ years']++;
            }
        }
        return view('dashboard', compact('malePercentage', 'femalePercentage', 'countResignData', 'countallPegawai','ageRanges','experienceRanges'));
    }
}
