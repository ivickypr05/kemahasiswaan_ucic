<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Pkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        return view('admin.simbelmawa.pkm.add');
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
            'gambar'   => 'required|mimes:jpeg,jpg,png,gif',
            'pedoman'   => 'required|mimes:pdf,docx,doc,ppt,pptx,xls,xlsx',
            'deskripsi'   => 'required|string|min:3',
            'mulai_tanggal'   => 'required',
            'akhir_tanggal'   => 'required',
        ]);

        $gambar = $request->file('gambar')->store('gambar_pkm', 'public');
        $pedoman = $request->file('pedoman')->store('pedoman_pkm', 'public');

        $validatedData['gambar'] = $gambar;
        $validatedData['pedoman'] = $pedoman;

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
        $rekpkm = Pkm::get();
        $pkm = Pkm::findOrFail($id);
        return view('frontend.simbelmawa.pkm_detail', compact('pkm', 'rekpkm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pkm  $bkm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
            'gambar'   => 'mimes:jpeg,jpg,png,gif',
            'pedoman'   => 'mimes:pdf,docx,doc,ppt,pptx,xls,xlsx',
            'deskripsi'   => 'required|string|min:3',
            'mulai_tanggal'   => 'required',
            'akhir_tanggal'   => 'required',
        ]);

        $pkm = Pkm::find($id);

        // Jika ada file gambar yang diupload, simpan dan update kolom gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('gambar_pkm', 'public');
            File::delete('storage/' .  $pkm->gambar);
            $validatedData['gambar'] = $gambar;
        }

        // Jika ada file pedoman yang diupload, simpan dan update kolom pedoman
        if ($request->hasFile('pedoman')) {
            $pedoman = $request->file('pedoman')->store('pedoman_pkm', 'public');
            File::delete('storage/' .  $pkm->pedoman);
            $validatedData['pedoman'] = $pedoman;
        }

        $pkm->update($validatedData);

        return redirect()->route('pkm-list')->with('toast success', 'PKM berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pkm  $bkm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pkm = Pkm::find($id);
        File::delete('storage/' . $pkm->gambar);
        File::delete('storage/' . $pkm->pedoman);
        $pkm->delete();

        return redirect()->route('pkm-list')->with('toast success', 'PKM berhasil dihapus');
    }

    public function frontPkm()
    {
        $data['pkm'] = Pkm::paginate(3);
        return view('frontend.simbelmawa.pkm', $data);
    }
}
