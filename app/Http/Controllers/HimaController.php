<?php

namespace App\Http\Controllers;

use App\Models\Hima;
use Illuminate\Http\Request;
use DB;
use File;

class HimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Organisasi HIMA';
        $data['breadcumb'] = 'Organisasi HIMA';
        $data['hima'] = Hima::orderby('id', 'asc')->get();

        return view('admin.organisasi.hima.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Organisasi HIMA';
        $data['breadcumb'] = 'Organisasi HIMA';

        return view('admin.organisasi.hima.add', $data);
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
            'nama_himpunan'   => 'required|string|min:3',
            'deskripsi'   => 'required|string|min:3',
            'gambar'   => 'required',
            'mulai_tanggal'   => 'required',
            'akhir_tanggal'   => 'required',
        ]);

        $gambar = $request->file('gambar')->store('gambar_hima', 'public');
        $validatedData['gambar'] = $gambar;

        Hima::create($validatedData);
        return redirect('/hima-list')->with('toast_success', 'HIMA berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hima  $bkm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hima = Hima::findOrFail($id);
        return view('frontend.organisasi.hima_detail', compact('hima'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hima  $bkm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title'] = 'Organisasi HIMA';
        $data['breadcumb'] = 'Organisasi HIMA';
        $data['hima'] = Hima::find($id);

        return view('admin.organisasi.hima.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hima  $bkm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_kegiatan'   => 'required|string|min:3',
            'nama_himpunan'   => 'required|string|min:3',
            'deskripsi'   => 'required|string|min:3',
            'gambar'   => 'required|mimes:jpeg,jpg,png,gif',
            'mulai_tanggal'   => 'required',
            'akhir_tanggal'   => 'required',
        ]);

        $hima = Hima::find($id);
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('hima_gambar', 'public');
            File::delete('storage/' .  $hima->gambar);
            $validatedData['gambar'] = $gambar;
        }
        $hima->update($validatedData);


        return redirect()->route('hima-list')->with(['success' => ' successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hima  $bkm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $hima = Hima::findOrFail($id);
            if ($hima->avatar) {
                $image_path = public_path('img/hima/'.$hima->avatar); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $hima->delete();
        });
        
        return redirect()->route('hima-list')->with(['success' => ' successfully!']);
    }

    public function frontHima(){
        $data['page_title'] = 'Organisasi HIMA';
        $data['breadcumb'] = 'Organisasi HIMA';
        $data['hima'] = Hima::get();

        return view('frontend.organisasi.hima', $data);
    }
}
