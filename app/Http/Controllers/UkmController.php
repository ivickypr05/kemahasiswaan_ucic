<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class UkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['breadcumb'] = 'Organisasi UKM';
        $data['ukm'] = Ukm::orderby('id', 'asc')->get();

        return view('admin.organisasi.ukm.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['breadcumb'] = 'Organisasi UKM';

        return view('admin.organisasi.ukm.add', $data);
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
            'nama_ukm'   => 'required|string|min:3',
            'gambar'   => 'required|mimes:jpeg,jpg,png,gif',
            'deskripsi'   => 'required|min:5',
            'dari_tanggal'   => 'required',
            'sampai_tanggal'   => 'required',
        ]);
        $gambar = $request->file('gambar')->store('gambar_ukm', 'public');
        $validatedData['gambar'] = $gambar;

        Ukm::create($validatedData);

        return redirect()->route('ukm-list')->with(['success' => ' successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ukm = Ukm::findOrFail($id);
        return view('frontend.organisasi.ukm_detail', compact('ukm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['breadcumb'] = 'Organisasi UKM';
        $data['ukm'] = Ukm::find($id);

        return view('admin.organisasi.ukm.edit', $data);
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
            'nama_kegiatan'   => 'required|string|min:3',
            'nama_ukm'   => 'required|string|min:3',
            'gambar'   => 'mimes:jpeg,jpg,png,gif',
            'deskripsi'   => 'required|min:5',
            'dari_tanggal'   => 'required',
            'sampai_tanggal'   => 'required',
        ]);
        $ukm = Ukm::find($id);
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('gambar_ukm', 'public');
            File::delete('storage/' .  $ukm->gambar);
            $validatedData['gambar'] = $gambar;
        }
        $ukm->update($validatedData);

        return redirect()->route('ukm-list')->with(['success' => ' successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ukm = ukm::findOrFail($id);
        File::delete('storage/' .  $ukm->gambar);
        $ukm->delete();

        return redirect()->route('ukm-list')->with(['success' => ' successfully!']);
    }

    public function frontUkm()
    {
        $data['page_title'] = 'Organisasi UKM';
        $data['breadcumb'] = 'Organisasi UKM';
        $data['ukm'] = Ukm::get();

        return view('frontend.organisasi.ukm', $data);
    }
}
