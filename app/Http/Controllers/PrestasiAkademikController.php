<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Preakademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PrestasiAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preakademik = Preakademik::with('categories')->get();
        return view('admin.prestasi.akademik.index', compact('preakademik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::get();
        return view('admin.prestasi.akademik.add', $data);
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
            'title' => 'required|string|min:2|max:100',
            'nama' => 'required|min:2',
            'tingkat_kejuaraan' => 'required|string|min:2|max:50',
            'gambar_1' => 'required|mimes:jpeg,jpg,png,gif',
            'gambar_2' => 'nullable|mimes:jpeg,jpg,png,gif',
            'gambar_3' => 'nullable|mimes:jpeg,jpg,png,gif',
            'deskripsi' => 'required|min:3',
            'tanggal' => 'required|string|min:2|max:50',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        // nyimpen path nya ke variabel gambar_1
        $gambar_1 = $request->file('gambar_1')->store('gambar_prestasi_akademik', 'public');
        $validatedData['gambar_1'] = $gambar_1;

        // cek apakah gambar 2 diisi
        if ($request->hasFile('gambar_2')) {
            $gambar_2 = $request->file('gambar_2')->store('gambar_prestasi_akademik', 'public');
            $validatedData['gambar_2'] = $gambar_2;
        }

        // cek apakah gambar 3 diisi
        if ($request->hasFile('gambar_3')) {
            $gambar_3 = $request->file('gambar_3')->store('gambar_prestasi_akademik', 'public');
            $validatedData['gambar_3'] = $gambar_3;
        }

        // nyimpen ke database
        Preakademik::create($validatedData);

        // redirect ke halaman yang sama dengan pesan sukses
        return redirect('/prestasi-akademik-list')->with('toast_success', 'Prestasi akademik berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $preakademik = Preakademik::with('categories')->find($id);
        return view('frontend.prestasi.akademik_detail', compact('preakademik'));
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
        $data['preakademik'] = Preakademik::find($id);
        return view('admin.prestasi.akademik.edit', $data);
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
            'title' => 'required|string|min:2|max:100',
            'nama' => 'required|min:2',
            'tingkat_kejuaraan' => 'required|string|min:2|max:50',
            'gambar_1' => 'mimes:jpeg,jpg,png,gif',
            'gambar_2' => 'mimes:jpeg,jpg,png,gif',
            'gambar_3' => 'mimes:jpeg,jpg,png,gif',
            'deskripsi' => 'required|min:3',
            'tanggal' => 'required|string|min:2|max:50',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $preakademik = Preakademik::find($id);

        if ($request->file('gambar_1')) {
            $gambar_1 = $request->file('gambar_1')->store('gambar_prestasi_akademik', 'public');
            File::delete('storage/' . $preakademik->gambar_1);
            $validatedData['gambar_1'] = $gambar_1;
        }

        if ($request->file('gambar_2')) {
            $gambar_2 = $request->file('gambar_2')->store('gambar_prestasi_akademik', 'public');
            if ($preakademik->gambar_2) {
                File::delete('storage/' . $preakademik->gambar_2);
            }
            $validatedData['gambar_2'] = $gambar_2;
        } elseif ($preakademik->gambar_2) {
            File::delete('storage/' . $preakademik->gambar_2);
            $validatedData['gambar_2'] = null;
        }

        if ($request->file('gambar_3')) {
            $gambar_3 = $request->file('gambar_3')->store('gambar_prestasi_akademik', 'public');
            if ($preakademik->gambar_3) {
                File::delete('storage/' . $preakademik->gambar_3);
            }
            $validatedData['gambar_3'] = $gambar_3;
        } elseif ($preakademik->gambar_3) {
            File::delete('storage/' . $preakademik->gambar_3);
            $validatedData['gambar_3'] = null;
        }

        $preakademik->update($validatedData);
        return redirect('/prestasi-akademik-list')->with('toast_success', 'Prestasi akademik berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preakademik = Preakademik::findOrFail($id);
        File::delete('storage/' .  $preakademik->gambar_1);
        File::delete('storage/' .  $preakademik->gambar_2);
        File::delete('storage/' .  $preakademik->gambar_3);
        $preakademik->delete();
        return redirect('/prestasi-akademik-list')->with('toast_success', 'Prestasi akademik berhasil dihapus');
    }

    public function frontPrestasiakademik()
    {
        $preakademik = Preakademik::with('categories')->get();
        return view('frontend.prestasi.akademik', compact('preakademik'));
    }
}
