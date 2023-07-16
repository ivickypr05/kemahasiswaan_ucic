<?php

namespace App\Http\Controllers;

use App\Models\Pkk;
use Illuminate\Http\Request;
use DB;
use File;

class PkkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'PKK';
        $data['breadcumb'] = 'PKK';
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
        $data['page_title'] = 'PKK';
        $data['breadcumb'] = 'PKK';

        return view('admin.simbelmawa.pkk.add', $data);
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

        $gambar = $request->file('gambar')->store('gambar_pkk', 'public');
        $validatedData['gambar'] = $gambar;

        Pkk::create($validatedData);
        return redirect('/pkk-list')->with('toast_success', 'PKK berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pkk  $bkm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pkk = Pkk::findOrFail($id);
        return view('frontend.simbelmawa.pkk_detail', compact('pkk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pkk  $bkm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title'] = 'PKK';
        $data['breadcumb'] = 'PKK';
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
            'deskripsi'   => 'required|string|min:3',
            'gambar'   => 'required|mimes:jpeg,jpg,png,gif',
            'mulai_tanggal'   => 'required',
            'akhir_tanggal'   => 'required',
        ]);

        $pkk = Pkk::find($id);
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('pkk_gambar', 'public');
            File::delete('storage/' .  $pkk->gambar);
            $validatedData['gambar'] = $gambar;
        }
        $pkk->update($validatedData);


        return redirect()->route('pkk-list')->with(['success' => ' successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pkk  $bkm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $pkk = Pkk::findOrFail($id);
            if ($pkk->avatar) {
                $image_path = public_path('img/pkk/'.$pkk->avatar); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $pkk->delete();
        });
        
        return redirect()->route('pkk-list')->with(['success' => ' successfully!']);
    }

    public function frontPkk(){
        $data['page_title'] = 'PKK';
        $data['breadcumb'] = 'PKK';
        $data['pkk'] = Pkk::get();

        return view('frontend.simbelmawa.pkk', $data);
    }
}
