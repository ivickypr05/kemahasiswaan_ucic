<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Illuminate\Http\Request;
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
        return view('admin.organisasi.ukm.add');
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
            'deskripsi'   => 'required|min:3',
            'dari_tanggal'   => 'required',
            'sampai_tanggal'   => 'required',
        ]);
        $gambar = $request->file('gambar')->store('gambar_ukm', 'public');
        $validatedData['gambar'] = $gambar;
        $validatedData['status'] = 0;

        Ukm::create($validatedData);

        return redirect()->route('ukm-list')->with('toast success', 'Kegiatan UKM berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rekukm = Ukm::get();
        $ukm = Ukm::findOrFail($id);
        return view('frontend.organisasi.ukm_detail', compact('ukm', 'rekukm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
            'deskripsi'   => 'required|min:3',
            'dari_tanggal'   => 'required',
            'sampai_tanggal'   => 'required',

        ]);
        $ukm = Ukm::find($id);
        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('gambar_ukm', 'public');
            File::delete('storage/' .  $ukm->gambar);
            $validatedData['gambar'] = $gambar;
        }

        $validatedData['status'] = 0;
        $ukm->update($validatedData);

        return redirect()->route('ukm-list')->with('toast success', 'Kegiatan UKM berhasil diubah');
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

        return redirect()->route('ukm-list')->with('toast success', 'Kegiatan UKM berhasil dihapus');
    }

    public function frontUkm()
    {
        $ukm = Ukm::where('status', 1)->paginate(5);
        return view('frontend.organisasi.ukm', compact('ukm'));
    }

    // Admin

    public function indexadmin()
    {
        $ukm = Ukm::where('status', 0)->get();
        return view('admin.organisasi.ukm.indexadmin', compact('ukm'));
    }

    public function approve($id)
    {
        $ukm = Ukm::where('id', $id)->where('status', 0)->firstOrFail();
        $ukm->update([
            'status' => '1',
        ]);
        return redirect('/request-ukm')->with('success', 'Berhasil Menerima Kegiatan UKM');
    }
    public function disapprove($id)
    {
        $ukm = Ukm::findOrFail($id);
        File::delete('storage/' .  $ukm->gambar);
        $ukm->delete();
        return redirect('/request-ukm')->with('success', 'Berhasil Menolak Kegiatan UKM');
    }
}
