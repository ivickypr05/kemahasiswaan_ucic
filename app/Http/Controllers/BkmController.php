<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Bkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bkm'] = Bkm::orderby('id', 'asc')->get();

        return view('admin.organisasi.bkm.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.organisasi.bkm.add');
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
            'nama_kegiatan'   => 'required|string|min:3',
            'deskripsi'   => 'required|min:3',
            'gambar'   => 'required|mimes:jpeg,jpg,png,gif',
            'mulai_tanggal'   => 'required',
            'akhir_tanggal'   => 'required',
        ]);

        $gambar = $request->file('gambar')->store('gambar_bkm', 'public');
        $validatedData['gambar'] = $gambar;

        Bkm::create($validatedData);
        return redirect('/bkm-list')->with('toast_success', 'Kegiatan BKM berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bkm  $bkm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bkm = Bkm::findOrFail($id);
        return view('frontend.organisasi.bkm_detail', compact('bkm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bkm  $bkm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['bkm'] = Bkm::find($id);
        return view('admin.organisasi.bkm.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bkm  $bkm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kegiatan'   => 'required|string|min:3',
            'deskripsi'   => 'required|min:3',
            'gambar'   => 'mimes:jpeg,jpg,png,gif',
            'mulai_tanggal'   => 'required',
            'akhir_tanggal'   => 'required',
        ]);

        $bkm = Bkm::find($id);
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('gambar_bkm', 'public');
            File::delete('storage/' .  $bkm->gambar);
            $validatedData['gambar'] = $gambar;
        }
        $bkm->update($validatedData);


        return redirect()->route('bkm-list')->with('toast_success', 'Kegiatan BKM berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bkm  $bkm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bkm = Bkm::findOrFail($id);
        File::delete('storage/' .  $bkm->gambar);
        $bkm->delete();

        return redirect()->route('bkm-list')->with('toast_success', 'BKM berhasil dihapus');
    }

    public function frontBkm()
    {
        $data['bkm'] = Bkm::get();
        return view('frontend.organisasi.bkm', $data);
    }
}
