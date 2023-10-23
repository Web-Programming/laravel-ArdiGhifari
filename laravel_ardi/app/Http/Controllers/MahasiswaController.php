<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function insert()
    {
        $result = DB::insert('insert into mahasiswas (npm, nama_mahasiswa, tempat_lahir, tanggal lahir,alamat, created_at) values (?, ?, ?, ?, ?, ?)', [
            '1922110006',
            'Ahmad',
            'Palembang',
            '2000-01-01',
            'Jl Rajawali',
            now()
        ]);
        dump($result);
    }

    public function update()
    {
        $result = DB::update('update mahasiswas set nama_mahasiswa = "Ali",
        updated_at = now() where npm = ?', ['1922110006']);
    }

    public function delete()
    {
        $result = DB::delete(
            'delete from mahasiswas where npm = ?',
            ['1922110006']
        );
        dump($result);
    }

    public function select()
    {
        $result = DB::select('select * from mahasiswas');
        dump($result);
    }

    //Single Assignment
    public function insertElq()
    {
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nama_mahasiswa = 'Ardi al Ghifari';
        $mahasiswa->npm = '2226250113';
        $mahasiswa->tempat_lahir = 'Palembang';
        $mahasiswa->tanggal_lahir = date("Y-n-d");
        $mahasiswa->save();
        dump($mahasiswa);
    }

    //Mass Assignment

}
