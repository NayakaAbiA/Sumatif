<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    //DASHBOARD 
    public function dashKurikulum(){
        return view('kurikulum.dashboard');
    }

    //KISI - KISI 
    public function kisiKurikulum(){
        return view('kurikulum.kisi-kisi.index');
    }

    //KDAFTAR HADIR 
    public function dftrHadirKurikulum(){
        return view('kurikulum.daftar-hadir.index');
    }
}
