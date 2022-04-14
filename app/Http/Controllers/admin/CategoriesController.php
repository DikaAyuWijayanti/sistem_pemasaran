<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Kategories;
class KategoriesController extends Controller
{
    public function index()
    {

        //Ambil data kategori dari database
        $data = array(
            'kategories' => Kategories::all()
        );
        //menampilkan view
        return view('admin.kategories.index',$data);
    }

    //function menampilkan view tambah data
    public function tambah()
    {
        return view('admin.kategories.tambah');
    }

    public function store(Request $request)
    {
        //Simpan datab ke database    
        Kategories::create([
            'name' => $request->name
        ]);
        
        //lalu reireact ke route admin.categories dengan mengirim flashdata(session) berhasil tambah data untuk manampilkan alert succes tambah data
        return redirect()->route('admin.kategories')->with('status','Berhasil Menambah Kategori');
    }

    public function update($id,Request $request)
    {
        //ambil data sesuai id dari parameter
        $categorie = Kategories::FindOrFail($id);
        //lalu ambil apa aja yang mau diupdate
        $categorie->name = $request->name;

        //lalu simpan perubahan
        $categorie->save();
        return redirect()->route('admin.kategories')->with('status','Berhasil Mengubah Kategori');
    }

    //function menampilkan form edit
    public function edit($id)
    {
        $data = array(
            'categorie' => $categorie = Categories::FindOrFail($id)
        );
        return view('admin.kategories.edit',$data);
    }

    public function delete($id)
    {
        //hapus data sesuai id dari parameter
        Kategories::destroy($id);
        
        return redirect()->route('admin.kategories')->with('status','Berhasil Mengahapus Kategori');
    }
}
