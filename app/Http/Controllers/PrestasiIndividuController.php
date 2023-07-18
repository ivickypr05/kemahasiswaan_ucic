<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Preindividu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PrestasiIndividuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preindividu = Preindividu::with('categories')->get();
        return view('admin.prestasi.individu.index', compact('preindividu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::get();
        return view('admin.prestasi.individu.add', $data);
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
            'nama' => 'required|string|min:2|max:50',
            'tingkat_kejuaraan' => 'required|string|min:2|max:50',
            'gambar_1' => 'required|mimes:jpeg,jpg,png,gif',
            'gambar_2' => 'nullable|mimes:jpeg,jpg,png,gif',
            'gambar_3' => 'nullable|mimes:jpeg,jpg,png,gif',
            'deskripsi' => 'required|string|min:5|max:255',
            'tanggal' => 'required|string|min:2|max:50',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        // nyimpen path nya ke variabel gambar_1
        $gambar_1 = $request->file('gambar_1')->store('gambar_prestasi_individu', 'public');
        $validatedData['gambar_1'] = $gambar_1;

        // cek apakah gambar 2 diisi
        if ($request->hasFile('gambar_2')) {
            $gambar_2 = $request->file('gambar_2')->store('gambar_prestasi_individu', 'public');
            $validatedData['gambar_2'] = $gambar_2;
        }

        // cek apakah gambar 3 diisi
        if ($request->hasFile('gambar_3')) {
            $gambar_3 = $request->file('gambar_3')->store('gambar_prestasi_individu', 'public');
            $validatedData['gambar_3'] = $gambar_3;
        }

        // nyimpen ke database
        Preindividu::create($validatedData);

        // redirect ke halaman yang sama dengan pesan sukses
        return redirect('/prestasi-individu-list')->with('toast_success', 'Prestasi individu berhasil ditambah');
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
        $data['preindividu'] = Preindividu::find($id);
        return view('admin.prestasi.individu.edit', $data);
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
            'nama' => 'required|string|min:2|max:50',
            'tingkat_kejuaraan' => 'required|string|min:2|max:50',
            'gambar_1' => 'mimes:jpeg,jpg,png,gif',
            'gambar_2' => 'mimes:jpeg,jpg,png,gif',
            'gambar_3' => 'mimes:jpeg,jpg,png,gif',
            'deskripsi' => 'required|string|min:5|max:255',
            'tanggal' => 'required|string|min:2|max:50',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $preindividu = Preindividu::find($id);

        if ($request->file('gambar_1')) {
            $gambar_1 = $request->file('gambar_1')->store('gambar_prestasi_individu', 'public');
            File::delete('storage/' . $preindividu->gambar_1);
            $validatedData['gambar_1'] = $gambar_1;
        }

        if ($request->file('gambar_2')) {
            $gambar_2 = $request->file('gambar_2')->store('gambar_prestasi_individu', 'public');
            if ($preindividu->gambar_2) {
                File::delete('storage/' . $preindividu->gambar_2);
            }
            $validatedData['gambar_2'] = $gambar_2;
        } elseif ($preindividu->gambar_2) {
            File::delete('storage/' . $preindividu->gambar_2);
            $validatedData['gambar_2'] = null;
        }

        if ($request->file('gambar_3')) {
            $gambar_3 = $request->file('gambar_3')->store('gambar_prestasi_individu', 'public');
            if ($preindividu->gambar_3) {
                File::delete('storage/' . $preindividu->gambar_3);
            }
            $validatedData['gambar_3'] = $gambar_3;
        } elseif ($preindividu->gambar_3) {
            File::delete('storage/' . $preindividu->gambar_3);
            $validatedData['gambar_3'] = null;
        }

        $preindividu->update($validatedData);
        return redirect('/prestasi-individu-list')->with('toast_success', 'Prestasi Individu berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preindividu = Preindividu::findOrFail($id);
        File::delete('storage/' .  $preindividu->gambar_1);
        File::delete('storage/' .  $preindividu->gambar_2);
        File::delete('storage/' .  $preindividu->gambar_3);
        $preindividu->delete();
        return redirect('/prestasi-individu-list')->with('toast_success', 'Prestasi individu berhasil dihapus');
    }

    public function frontPrestasiIndividu()
    {
        $preindividu = Preindividu::with('category')->get();
        return view('frontend.prestasi.individu', compact('preindividu'));
    }
}
