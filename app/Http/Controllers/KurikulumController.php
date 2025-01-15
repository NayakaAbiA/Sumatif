<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    public function dashKurikulum(){
        return view('kurikulum.dashboard');
    }

    public function main(){
        return view('layouts.main');
    }
}
