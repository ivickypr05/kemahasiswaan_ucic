<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['breadcumb'] = 'Beasiswa';
        $data['beasiswa'] = Beasiswa::get();
        return view('admin.beasiswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['breadcumb'] = 'Beasiswa';
        return view('admin.beasiswa.add', $data);
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

        $gambar = $request->file('gambar')->store('gambar_beasiswa', 'public');
        $validatedData['gambar'] = $gambar;

        Beasiswa::create($validatedData);
        return redirect('/beasiswa-list')->with('toast_success', 'Beasiswa berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beasiswa = Beasiswa::find($id);
        return view('frontend.beasiswa.detail', compact('beasiswa'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['breadcumb'] = 'Beasiswa';
        $data['beasiswa'] = Beasiswa::find($id);
        return view('admin.beasiswa.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beasiswa  $beasiswa
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

        $beasiswa = Beasiswa::find($id);
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('gambar_beasiswa', 'public');
            File::delete('storage/' .  $beasiswa->gambar);
            $validatedData['gambar'] = $gambar;
        }
        $beasiswa->update($validatedData);


        return redirect()->route('beasiswa-list')->with(['success' => ' successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        File::delete('storage/' .  $beasiswa->gambar);
        $beasiswa->delete();

        return redirect()->route('beasiswa-list')->with(['success' => ' successfully!']);
    }

    public function frontBeasiswa()
    {
        $data['breadcumb'] = 'Beasiswa';
        $data['beasiswa'] = Beasiswa::get();

        return view('frontend.beasiswa.index', $data);
    }
}
