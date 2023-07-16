<?php

namespace App\Http\Controllers;

use App\Models\Bkm;
use Illuminate\Http\Request;
use DB;
use File;

class BkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Organisasi BKM';
        $data['breadcumb'] = 'Organisasi BKM';
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
        $data['page_title'] = 'Organisasi BKM';
        $data['breadcumb'] = 'Organisasi BKM';

        return view('admin.organisasi.bkm.add', $data);
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
            'deskripsi'   => 'required|string|min:3',
            'gambar'   => 'required',
            'mulai_tanggal'   => 'required',
            'akhir_tanggal'   => 'required',
        ]);

        $gambar = $request->file('gambar')->store('gambar_bkm', 'public');
        $validatedData['gambar'] = $gambar;

        Bkm::create($validatedData);
        return redirect('/bkm-list')->with('toast_success', 'BKM berhasil ditambah');
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
        $data['page_title'] = 'Organisasi BKM';
        $data['breadcumb'] = 'Organisasi BKM';
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
            'deskripsi'   => 'required|string|min:3',
            'gambar'   => 'required|mimes:jpeg,jpg,png,gif',
            'mulai_tanggal'   => 'required',
            'akhir_tanggal'   => 'required',
        ]);

        $bkm = Bkm::find($id);
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('bkm_gambar', 'public');
            File::delete('storage/' .  $bkm->gambar);
            $validatedData['gambar'] = $gambar;
        }
        $bkm->update($validatedData);


        return redirect()->route('bkm-list')->with(['success' => ' successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bkm  $bkm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $bkm = Bkm::findOrFail($id);
            if ($bkm->avatar) {
                $image_path = public_path('img/bkm/'.$bkm->avatar); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $bkm->delete();
        });
        
        return redirect()->route('bkm-list')->with(['success' => ' successfully!']);
    }

    public function frontBkm(){
        $data['page_title'] = 'Organisasi BKM';
        $data['breadcumb'] = 'Organisasi BKM';
        $data['bkm'] = Bkm::get();

        return view('frontend.organisasi.bkm', $data);
    }
}
