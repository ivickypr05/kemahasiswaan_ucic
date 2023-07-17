<?php

namespace App\Http\Controllers;

use App\Models\Pretim;
use App\Models\Category;
use App\Models\PrestasiTim;
use Illuminate\Http\Request;
use App\Models\CategoryPrestasi;
use Illuminate\Support\Facades\File;

class PrestasiTimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pretim = Pretim::with('category')->get();
        return view('admin.prestasi.tim.index', compact('pretim'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        return view('admin.prestasi.tim.add', compact('categoryprestasi'));
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
            'judul_prestasi' => 'required|string|min:2|max:100',
            'nama_peserta_1' => 'required|string|min:2|max:50',
            'nama_peserta_2' => 'required|string|min:2|max:50',
            'nama_peserta_3' => 'string|min:2|max:50',
            'nama_peserta_4' => 'string|min:2|max:50',
            'nama_peserta_5' => 'string|min:2|max:50',
            'nama_peserta_6' => 'string|min:2|max:50',
            'nama_peserta_7' => 'string|min:2|max:50',
            'nama_peserta_8' => 'string|min:2|max:50',
            'nama_peserta_9' => 'string|min:2|max:50',
            'nama_peserta_10' => 'string|min:2|max:50',
            'nama_peserta_11' => 'string|min:2|max:50',
            'tingkat_kejuaraan' => 'required|string|min:2|max:50',
            'gambar_1' => 'required|mimes:jpeg,jpg,png,gif',
            'gambar_2' => 'mimes:jpeg,jpg,png,gif',
            'gambar_3' => 'mimes:jpeg,jpg,png,gif',
            'deskripsi' => 'required|string|min:5|max:255',
            'tanggal' => 'required|string|min:2|max:50',
            'category_prestasi_id' => 'required|integer|exists:category_prestasis,id',
        ]);
        // nyimpen path nya ke variabel gambar_1, gambar_2, gambar_3
        $gambar_1 = $request->file('gambar_1')->store('gambar_prestasi', 'public');
        $gambar_2 = $request->file('gambar_2')->store('gambar_prestasi', 'public');
        $gambar_3 = $request->file('gambar_3')->store('gambar_prestasi', 'public');

        // nyimpen path nya dari gambar_1, gambar_2, gambar_3 ke array $validatedData
        $validatedData['gambar_1'] = $gambar_1;
        $validatedData['gambar_2'] = $gambar_2;
        $validatedData['gambar_3'] = $gambar_3;

        // nyimpen ke database
        Pretim::create($validatedData);

        // redirect ke halaman yang sama dengan pesan sukses
        return redirect('/prestasi-tim-list')->with('toast_success', 'Prestasi tim berhasil ditambah');
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
        $data['categories'] = Category::get();
        $data['pretim'] = Pretim::find($id);
        return view('admin.prestasi.tim.edit', $data);
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
            'judul_prestasi' => 'required|string|min:2|max:100',
            'nama_peserta_1' => 'required|string|min:2|max:50',
            'nama_peserta_2' => 'required|string|min:2|max:50',
            'nama_peserta_3' => 'string|min:2|max:50',
            'nama_peserta_4' => 'string|min:2|max:50',
            'nama_peserta_5' => 'string|min:2|max:50',
            'nama_peserta_6' => 'string|min:2|max:50',
            'nama_peserta_7' => 'string|min:2|max:50',
            'nama_peserta_8' => 'string|min:2|max:50',
            'nama_peserta_9' => 'string|min:2|max:50',
            'nama_peserta_10' => 'string|min:2|max:50',
            'nama_peserta_11' => 'string|min:2|max:50',
            'tingkat_kejuaraan' => 'required|string|min:2|max:50',
            'gambar_1' => 'required|mimes:jpeg,jpg,png,gif',
            'gambar_2' => 'mimes:jpeg,jpg,png,gif',
            'gambar_3' => 'mimes:jpeg,jpg,png,gif',
            'deskripsi' => 'required|string|min:5|max:255',
            'tanggal' => 'required|string|min:2|max:50',
            'category_prestasi_id' => 'required|integer|exists:category_prestasis,id',
        ]);

        $pretim = Pretim::find($id);
        if ($request->file('gambar_1', 'gambar_1', 'gambar_3')) {
            $gambar_1 = $request->file('gambar_1')->store('gambar_prestasi', 'public');
            $gambar_2 = $request->file('gambar_2')->store('gambar_prestasi', 'public');
            $gambar_3 = $request->file('gambar_3')->store('gambar_prestasi', 'public');

            File::delete('storage/' .  $pretim->gambar_1);
            File::delete('storage/' .  $pretim->gambar_2);
            File::delete('storage/' .  $pretim->gambar_3);

            $validatedData['gambar_1'] = $gambar_1;
            $validatedData['gambar_2'] = $gambar_2;
            $validatedData['gambar_3'] = $gambar_3;
        }
        $pretim->update($validatedData);

        return redirect('/prestasi-tim-list')->with('toast_success', 'Prestasi tim berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pretim = Pretim::findOrFail($id);
        File::delete('storage/' .  $pretim->gambar_1);
        File::delete('storage/' .  $pretim->gambar_2);
        File::delete('storage/' .  $pretim->gambar_3);
        $pretim->delete();
        return redirect('/prestasi-tim-list')->with('toast_success', 'Prestasi tim berhasil dihapus');
    }
}
