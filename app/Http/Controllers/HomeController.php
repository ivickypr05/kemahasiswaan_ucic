<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;
use App\Models\Preakademik;
use App\Models\Prenonakademik;
use App\Models\Bkm;
use App\Models\Ukm;
use App\Models\Hima;
use App\Models\Pkm;
use App\Models\Pkk;
use App\Models\Berita;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beasiswa = Beasiswa::all();
        $preakademik = Preakademik::with('categories')->get();
        $prenonakademik = Prenonakademik::with('categories')->get();
        $bkm = Bkm::all();
        $ukm = Ukm::all();
        $hima = Hima::all();
        $pkm = Pkm::all();
        $pkk = Pkk::all();
        $berita = Berita::all();

        return view('frontend.home', compact('beasiswa', 'preakademik', 'prenonakademik', 'bkm', 'ukm', 'hima', 'pkm', 'pkk', 'berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
