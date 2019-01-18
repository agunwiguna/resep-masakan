<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class HomeController extends Controller
{
 
    public function index()
    {
        $recipes = Recipe::with('user')->orderBy('kode','DESC')->limit(3)->get();            
        return view('welcome',compact('recipes'));
    }

    public function readmore()
    {
        $recipes = Recipe::with('user')->orderBy('kode','DESC')->paginate(9);
        return view('read.v_readmore',compact('recipes'));
    }

    public function detail($slug)
    {
        $recipes = Recipe::with('user')->where('slug_nama',$slug)->get();
        return view('detail.d_resep', compact('recipes'));
    }

    public function cari(Request $request)
    {
       $cari = $request->cari;
       $recipes = Recipe::with('user')->where("nama_resep","LIKE","%".$cari."%")->paginate();
       
       return view('read.v_readmore',compact('recipes')); 
    }

}
