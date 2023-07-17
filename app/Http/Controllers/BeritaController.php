<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['breadcumb'] = 'Berita';
        $data['berita'] = Berita::get();
        return view('admin.berita.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['breadcumb'] = 'Berita';
        return view('admin.berita.add', $data);
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
            'title'   => 'required|string|min:3',
            'content'   => 'required|string|min:3',
            'gambar'   => 'required',
            'dari_tanggal'   => 'required',
            'sampai_tanggal'   => 'required',
        ]);

        $gambar = $request->file('gambar')->store('gambar_berita', 'public');
        $validatedData['gambar'] = $gambar;

        Berita::create($validatedData);
        return redirect('/berita-list')->with('toast_success', 'Berita berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::find($id);
        return view('frontend.berita.detail', compact('berita'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['breadcumb'] = 'Berita';
        $data['berita'] = Berita::find($id);
        return view('admin.berita.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title'   => 'required|string|min:3',
            'content'   => 'required|string|min:3',
            'gambar'   => 'required|mimes:jpeg,jpg,png,gif',
            'dari_tanggal'   => 'required',
            'sampai_tanggal'   => 'required',
        ]);

        $berita = Berita::find($id);
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('gambar_berita', 'public');
            File::delete('storage/' .  $berita->gambar);
            $validatedData['gambar'] = $gambar;
        }
        $berita->update($validatedData);


        return redirect()->route('berita-list')->with(['success' => ' successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        File::delete('storage/' .  $berita->gambar);
        $berita->delete();

        return redirect()->route('berita-list')->with(['success' => ' successfully!']);
    }

    public function frontBerita()
    {
        $data['breadcumb'] = 'Berita';
        $data['berita'] = Berita::get();

        return view('frontend.berita.berita', $data);
    }
}
