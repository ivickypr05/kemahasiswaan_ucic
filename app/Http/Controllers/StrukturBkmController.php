<?php

namespace App\Http\Controllers;

use App\Models\Strukturbkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StrukturBkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['strukturbkm'] = Strukturbkm::get();
        return view('admin.organisasi.bkm.struktur.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organisasi.bkm.struktur.add');
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
            'struktur_bkm' => 'required|mimes:jpeg,jpg,png,gif'
        ]);
        $gambar = $request->file('struktur_bkm')->store('gambar_strukturbkm', 'public');
        $validatedData['struktur_bkm'] = $gambar;

        Strukturbkm::create($validatedData);
        return redirect('/struktur-bkm-list')->with('toast success', 'Struktur BKM berhasil ditambah');
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
        $strukturbkm = Strukturbkm::find($id);
        return view('admin.organisasi.bkm.struktur.edit', compact('strukturbkm'));
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
        $validatedData = $request->validate([
            'struktur_bkm' => 'mimes:jpeg,jpg,png,gif'
        ]);

        $strukturbkm = Strukturbkm::find($id);
        if ($request->file('struktur_bkm')) {
            $gambar = $request->file('struktur_bkm')->store('gambar_strukturbkm', 'public');
            File::delete('storage/' . $strukturbkm->struktur_bkm);
            $validatedData['struktur_bkm'] = $gambar;
        }
        $strukturbkm->update($validatedData);

        return redirect('/struktur-bkm-list')->with('toast success', 'Struktur BKM berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $strukturbkm = Strukturbkm::find($id);
        File::delete('storage/' . $strukturbkm->struktur_bkm);
        $strukturbkm->delete();
        return redirect('/struktur-bkm-list')->with('toast success', 'Struktur BKM berhasil dihapus');
    }

    public function frontStrukturBkm()
    {
        $data['strukturbkm'] = Strukturbkm::get();
        return view('frontend.organisasi.struktur_bkm', $data);
    }
}
