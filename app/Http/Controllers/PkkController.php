<?php

namespace App\Http\Controllers;

use App\Models\Pkk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PkkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pkk'] = Pkk::orderby('id', 'asc')->get();

        return view('admin.simbelmawa.pkk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.simbelmawa.pkk.add');
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

        $gambar = $request->file('gambar')->store('gambar_pkk', 'public');
        $pedoman = $request->file('pedoman')->store('pedoman_pkk', 'public');

        $validatedData['gambar'] = $gambar;
        $validatedData['pedoman'] = $pedoman;

        Pkk::create($validatedData);
        return redirect('/pkk-list')->with('toast_success', 'Dtata PPK berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pkk  $bkm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rekpkk = Pkk::get();
        $pkk = Pkk::findOrFail($id);
        return view('frontend.simbelmawa.pkk_detail', compact('pkk', 'rekpkk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pkk  $bkm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pkk'] = Pkk::find($id);
        return view('admin.simbelmawa.pkk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pkk  $bkm
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


        $pkk = Pkk::findOrFail($id);

        // Jika ada file gambar yang diupload, simpan dan update kolom gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('gambar_pkk', 'public');
            File::delete('storage/' .  $pkk->gambar);
            $validatedData['gambar'] = $gambar;
        }

        // Jika ada file pedoman yang diupload, simpan dan update kolom pedoman
        if ($request->hasFile('pedoman')) {
            $pedoman = $request->file('pedoman')->store('pedoman_pkk', 'public');
            File::delete('storage/' .  $pkk->pedoman);
            $validatedData['pedoman'] = $pedoman;
        }

        $pkk->update($validatedData);

        return redirect()->route('pkk-list')->with('toast_success', 'Data PPK berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pkk  $bkm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pkk = Pkk::find($id);
        File::delete('storage/' . $pkk->gambar);
        File::delete('storage/' . $pkk->pedoman);

        $pkk->delete();


        return redirect()->route('pkk-list')->with('toast_success', 'Data PPK berhasil dihapus');
    }

    public function frontPkk()
    {
        $data['pkk'] = Pkk::paginate(5);
        return view('frontend.simbelmawa.pkk', $data);
    }
}
