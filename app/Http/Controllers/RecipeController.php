<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Recipe;
use Session;
use Auth;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $id = Auth::user()->id;
        $recipes = Recipe::with('user')->where('id','=',$id)->orderBy('kode','DESC')->paginate(6);
        $count = Recipe::with('user')->where('id','=',$id)->count();

        return view('read.v_resep',compact('recipes','count'));
    }

    public function create()
    {
        return view('create.c_resep');
    }

    public function store(Request $request)
    {
        $recipe = new Recipe;
        $recipe->id = $request->id;
        $recipe->nama_resep = $request->nama_resep;
        $recipe->slug_nama = Str::slug($request->get('nama_resep'));

        $file = $request->file('foto');
        $filename = $file->getClientOriginalName();
        $request->file('foto')->move('img/resep/',$filename);

        $recipe->foto = $filename;
        $recipe->bahan = $request->bahan;
        $recipe->langkah = $request->langkah;
        $recipe->estimasi = $request->estimasi;
        
        $sukses = $recipe->save();

        if ($sukses) {
            Session::flash('message', 'Berhasil :) Data berhasil disimpan!');
            return redirect('/recipe');
        } else {
            Session::flash('message', 'Upps :( Data gagal disimpan!');
            return redirect('/recipe');
        }
    }

    public function edit($kode)
    {
        $recipes = Recipe::where('kode',$kode)->get();
        return view('update.u_resep', compact('recipes'));
    }

    public function update(Request $request, $kode)
    {
        $update = Recipe::where('kode',$kode)->first();
        $update->id = $request['id'];
        $update->nama_resep = $request['nama_resep'];

        if ($request->file('foto') == "") {
            $update->foto = $update->foto; 
        } else {
            $file = 'img/resep/'.$update->foto;
            if (is_file($file)) {
                unlink($file);
            }
            $file = $request->file('foto');
            $filename = $file->getClientOriginalName();
            $request->file('foto')->move('img/resep/',$filename);
            $update->foto = $filename; 
        }

        $update->bahan = $request['bahan'];
        $update->langkah = $request['langkah'];
        $update->estimasi = $request['estimasi'];

        $sukses = $update->save();

        if ($sukses) {
            Session::flash('message', 'Berhasil :) Data berhasil diubah!');
            return redirect('/recipe');
        } else {
            Session::flash('message', 'Upps :( Data gagal diubah!');
            return redirect('/recipe');
        }
    }

    public function destroy($kode)
    {
        $hapus = Recipe::find($kode);
        $file = 'img/resep/'.$hapus->foto;
        if (is_file($file)) {
            unlink($file);
        }

        $sukses = $hapus->delete();
        
        if ($sukses) {
            Session::flash('message', 'Berhasil :) Data berhasil dihapus!');
            return redirect('/recipe');
        } else {
            Session::flash('message', 'Upps :( Data gagal dihapus!');
            return redirect('/recipe');
        }
    }

    public function autocomplete(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $id = Auth::user()->id;
            $data = Recipe::select("kode","nama_resep")
                    ->where("nama_resep","LIKE","%".$cari."%","AND",'id','=',$id)
                    ->get();
            return response()->json($data);            
        }        
    }

    public function search(Request $request)
    {
       $cari = $request->cari;
       $id = Auth::user()->id;
       $recipes = Recipe::with('user')->where("nama_resep","LIKE","%".$cari."%")->paginate();
       $count = Recipe::with('user')->where('id','=',$id)->count();
       
       return view('read.v_resep',compact('recipes','count'));        
    }
}
