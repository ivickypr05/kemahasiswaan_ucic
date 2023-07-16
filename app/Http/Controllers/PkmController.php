<?php

namespace App\Http\Controllers;

use App\Models\Pkm;
use Illuminate\Http\Request;
use DB;
use File;

class PkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'PKM';
        $data['breadcumb'] = 'PKM';
        $data['pkm'] = Pkm::orderby('id', 'asc')->get();

        return view('admin.simbelmawa.pkm.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'PKM';
        $data['breadcumb'] = 'PKM';

        return view('admin.simbelmawa.pkm.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul'   => 'required|string|min:3',
            'deskripsi'   => 'required|string|min:3',
            'gambar'   => 'required',
            'mulai_tanggal'   => 'required',
            'akhir_tanggal'   => 'required',
        ]);

        $gambar = $request->file('gambar')->store('gambar_pkm', 'public');
        $validatedData['gambar'] = $gambar;

        Pkm::create($validatedData);
        return redirect('/pkm-list')->with('toast_success', 'PKM berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pkm  $bkm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pkm = Pkm::findOrFail($id);
        return view('frontend.simbelmawa.pkm_detail', compact('pkm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pkm  $bkm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title'] = 'PKM';
        $data['breadcumb'] = 'PKM';
        $data['pkm'] = Pkm::find($id);

        return view('admin.simbelmawa.pkm.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pkm  $bkm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'judul'   => 'required|string|min:3',
            'deskripsi'   => 'required|string|min:3',
            'gambar'   => 'required|mimes:jpeg,jpg,png,gif',
            'mulai_tanggal'   => 'required',
            'akhir_tanggal'   => 'required',
        ]);

        $pkm = Pkm::find($id);
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('pkm_gambar', 'public');
            File::delete('storage/' .  $pkm->gambar);
            $validatedData['gambar'] = $gambar;
        }
        $pkm->update($validatedData);


        return redirect()->route('pkm-list')->with(['success' => ' successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pkm  $bkm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $pkm = Pkm::findOrFail($id);
            if ($pkm->avatar) {
                $image_path = public_path('img/pkm/'.$pkm->avatar); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $pkm->delete();
        });
        
        return redirect()->route('pkm-list')->with(['success' => ' successfully!']);
    }

    public function frontPkm(){
        $data['page_title'] = 'PKM';
        $data['breadcumb'] = 'PKM';
        $data['pkm'] = Pkm::get();

        return view('frontend.simbelmawa.pkm', $data);
    }
}
