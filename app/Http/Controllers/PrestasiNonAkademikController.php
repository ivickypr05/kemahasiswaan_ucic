<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Prenonakademik;
use Illuminate\Support\Facades\File;

class PrestasiNonAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prenonakademik = Prenonakademik::with('categories')->get();
        return view('admin.prestasi.nonakademik.index', compact('prenonakademik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::get();
        return view('admin.prestasi.nonakademik.add', $data);
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
            'nama' => 'required|min:6',
            'tingkat_kejuaraan' => 'required|string|min:2|max:50',
            'gambar_1' => 'required|mimes:jpeg,jpg,png,gif',
            'gambar_2' => 'nullable|mimes:jpeg,jpg,png,gif',
            'gambar_3' => 'nullable|mimes:jpeg,jpg,png,gif',
            'deskripsi' => 'required|min:5',
            'tanggal' => 'required|string|min:2|max:50',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        // nyimpen path nya ke variabel gambar_1
        $gambar_1 = $request->file('gambar_1')->store('gambar_prestasi_nonakademik', 'public');
        $validatedData['gambar_1'] = $gambar_1;

        // cek apakah gambar 2 diisi
        if ($request->hasFile('gambar_2')) {
            $gambar_2 = $request->file('gambar_2')->store('gambar_prestasi_nonakademik', 'public');
            $validatedData['gambar_2'] = $gambar_2;
        }

        // cek apakah gambar 3 diisi
        if ($request->hasFile('gambar_3')) {
            $gambar_3 = $request->file('gambar_3')->store('gambar_prestasi_nonakademik', 'public');
            $validatedData['gambar_3'] = $gambar_3;
        }

        // nyimpen ke database
        Prenonakademik::create($validatedData);

        // redirect ke halaman yang sama dengan pesan sukses
        return redirect('/prestasi-nonakademik-list')->with('toast_success', 'Prestasi Non Akademik berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prenonakademik = Prenonakademik::with('categories')->find($id);
        return view('frontend.prestasi.nonakademik_detail', compact('prenonakademik'));
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
        $data['prenonakademik'] = Prenonakademik::find($id);
        return view('admin.prestasi.nonakademik.edit', $data);
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
            'deskripsi' => 'required|min:5',
            'tanggal' => 'required|string|min:2|max:50',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $prenonakademik = Prenonakademik::find($id);

        if ($request->file('gambar_1')) {
            $gambar_1 = $request->file('gambar_1')->store('gambar_prestasi_nonakademik', 'public');
            File::delete('storage/' . $prenonakademik->gambar_1);
            $validatedData['gambar_1'] = $gambar_1;
        }

        if ($request->file('gambar_2')) {
            $gambar_2 = $request->file('gambar_2')->store('gambar_prestasi_nonakademik', 'public');
            if ($prenonakademik->gambar_2) {
                File::delete('storage/' . $prenonakademik->gambar_2);
            }
            $validatedData['gambar_2'] = $gambar_2;
        } elseif ($prenonakademik->gambar_2) {
            File::delete('storage/' . $prenonakademik->gambar_2);
            $validatedData['gambar_2'] = null;
        }

        if ($request->file('gambar_3')) {
            $gambar_3 = $request->file('gambar_3')->store('gambar_prestasi_nonakademik', 'public');
            if ($prenonakademik->gambar_3) {
                File::delete('storage/' . $prenonakademik->gambar_3);
            }
            $validatedData['gambar_3'] = $gambar_3;
        } elseif ($prenonakademik->gambar_3) {
            File::delete('storage/' . $prenonakademik->gambar_3);
            $validatedData['gambar_3'] = null;
        }

        $prenonakademik->update($validatedData);

        return redirect('/prestasi-nonakademik-list')->with('toast_success', 'Prestasi Non Akademik berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prenonakademik = Prenonakademik::findOrFail($id);
        File::delete('storage/' .  $prenonakademik->gambar_1);
        File::delete('storage/' .  $prenonakademik->gambar_2);
        File::delete('storage/' .  $prenonakademik->gambar_3);
        $prenonakademik->delete();
        return redirect('/prestasi-nonakademik-list')->with('toast_success', 'Prestasi Non Akademik berhasil dihapus');
    }

    public function frontPrestasinonakademik()
    {
        $prenonakademik = Prenonakademik::with('categories')->paginate(9);
        return view('frontend.prestasi.nonakademik', compact('prenonakademik'));
    }
}
