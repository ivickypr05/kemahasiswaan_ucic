<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
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
        $validateData = $request->validate([
            'nama_kegiatan'   => 'required|string|min:3',
            'gambar'   => 'required',
            'deskripsi'   => 'required|string|min:3',
            'mulai_tanggal'   => 'required',
            'akhir_tanggal'   => 'required',
        ]);

        $beasiswa = new Bkm();
        $beasiswa->nama_kegiatan = $validateData['nama_kegiatan'];
        $beasiswa->deskripsi = $validateData['deskripsi'];
        $beasiswa->mulai_tanggal = $validateData['mulai_tanggal'];
        $beasiswa->akhir_tanggal = $validateData['akhir_tanggal'];
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/bkm/');
            $image->move($destinationPath, $name);
            $beasiswa->gambar = $name;
        }
        $beasiswa->save();

        return redirect()->route('bkm-list')->with(['success' => ' successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
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
     * @param  \App\Models\Beasiswa  $beasiswa
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
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama_kegiatan'   => 'required|string|min:3',
            'gambar'   => 'required',
            'deskripsi'   => 'required|string|min:3',
            'mulai_tanggal'   => 'required',
            'akhir_tanggal'   => 'required',
        ]);

        $beasiswa = Bkm::find($id);
        $beasiswa->nama_kegiatan = $validateData['nama_kegiatan'];
        $beasiswa->deskripsi = $validateData['deskripsi'];
        $beasiswa->mulai_tanggal = $validateData['mulai_tanggal'];
        $beasiswa->akhir_tanggal = $validateData['akhir_tanggal'];
        if ($request->hasFile('gambar')) {
            // Delete Img
            if ($beasiswa->gambar) {
                $image_path = public_path('img/bkm/'.$beasiswa->gambar); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/bkm/');
            $image->move($destinationPath, $name);
            $beasiswa->gambar = $name;
        }
        $beasiswa->save();

        return redirect()->route('bkm-list')->with(['success' => ' successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $beasiswa = Bkm::findOrFail($id);
            if ($beasiswa->avatar) {
                $image_path = public_path('img/bkm/'.$beasiswa->avatar); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $beasiswa->delete();
        });
        
        return redirect()->route('bkm-list')->with(['success' => ' successfully!']);
    }

    public function frontUkm(){
        $data['page_title'] = 'Organisasi BKM';
        $data['breadcumb'] = 'Organisasi BKM';
        $data['bkm'] = Bkm::get();

        return view('frontend.organisasi.bkm', $data);
    }
}
