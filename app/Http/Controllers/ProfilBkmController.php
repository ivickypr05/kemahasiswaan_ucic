<?php

namespace App\Http\Controllers;

use App\Models\Profilbkm;
use App\Models\Strukturbkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfilBkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['profilbkm'] = Profilbkm::get();
        return view('admin.organisasi.bkm.profil.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organisasi.bkm.profil.add');
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
            'logo' => 'required|mimes:jpeg,jpg,png,gif',
            'struktur_bkm' => 'required|mimes:jpeg,jpg,png,gif',
            'deskripsi' => 'required|min:10'
        ]);

        $logo = $request->file('logo')->store('gambar_logobkm', 'public');
        $gambar = $request->file('struktur_bkm')->store('gambar_strukturbkm', 'public');

        $validatedData['logo'] = $logo;
        $validatedData['struktur_bkm'] = $gambar;

        Profilbkm::create($validatedData);
        return redirect('/profil-bkm-list')->with('toast success', 'Profil BKM berhasil ditambah');
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
        $profilbkm = Profilbkm::find($id);
        return view('admin.organisasi.bkm.profil.edit', compact('profilbkm'));
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
            'logo' => 'mimes:jpeg,jpg,png,gif',
            'struktur_bkm' => 'mimes:jpeg,jpg,png,gif',
            'deskripsi' => 'required|min:10'
        ]);

        $profilbkm = Profilbkm::find($id);
        if ($request->file('logo')) {
            $logo = $request->file('logo')->store('gambar_logobkm', 'public');
            File::delete('storage/' . $profilbkm->logo);
            $validatedData['logo'] = $logo;
        }
        if ($request->file('struktur_bkm')) {
            $gambar = $request->file('struktur_bkm')->store('gambar_strukturbkm', 'public');
            File::delete('storage/' . $profilbkm->struktur_bkm);
            $validatedData['struktur_bkm'] = $gambar;
        }


        $profilbkm->update($validatedData);

        return redirect('/profil-bkm-list')->with('toast success', 'Profil BKM berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profilbkm = Profilbkm::find($id);
        File::delete('storage/' . $profilbkm->logo);
        File::delete('storage/' . $profilbkm->struktur_bkm);
        $profilbkm->delete();
        return redirect('/profil-bkm-list')->with('toast success', 'Profil BKM berhasil dihapus');
    }

    public function frontProfilBkm()
    {
        $data['profilbkm'] = Profilbkm::get();
        return view('frontend.organisasi.profil_bkm', $data);
    }
}
