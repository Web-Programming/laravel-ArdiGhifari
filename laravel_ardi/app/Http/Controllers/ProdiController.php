<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        //  dump($request);
        // echo $request->nama;

        $validateData = $request->validate([
            'nama' => 'required|min:5|max:20',
        ]);
        // dump($validateData);
        // echo $validateData['nama'];

        $prodi = new Prodi();
        $prodi->nama = $validateData['nama'];

        $prodi->save();

        $request->session()->flash('info',"Data Prodi $prodi->nama berhasil disimpan ke database");
    }

    public function index()
    {
        $prodis = Prodi::all();
        return view('prodi.index')->with('prodis', $prodis);
    }

}
