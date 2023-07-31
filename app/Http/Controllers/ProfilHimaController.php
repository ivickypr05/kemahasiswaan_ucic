<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilHimaController extends Controller
{
    public function himatif()
    {
        return view('frontend.organisasi.profil.himatif');
    }
    public function himasi()
    {
        return view('frontend.organisasi.profil.himasi');
    }
    public function himadkv()
    {
        return view('frontend.organisasi.profil.himadkv');
    }
    public function himaku()
    {
        return view('frontend.organisasi.profil.himaku');
    }
    public function himajemen()
    {
        return view('frontend.organisasi.profil.himajemen');
    }
    public function himaka()
    {
        return view('frontend.organisasi.profil.himaka');
    }
    public function himami()
    {
        return view('frontend.organisasi.profil.himami');
    }
    public function himabis()
    {
        return view('frontend.organisasi.profil.himabis');
    }
}
