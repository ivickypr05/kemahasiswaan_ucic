<?php

namespace App\Http\Controllers;

use App\Models\CategoryPrestasi;
use App\Models\PrestasiIndividu;
use App\Models\PrestasiTim;
use Illuminate\Http\Request;

class CategoryPrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categoryprestasi'] = CategoryPrestasi::get();
        return view('admin.prestasi.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prestasi.category.add');
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
            'name' => 'required|min:2|max:50'
        ]);
        CategoryPrestasi::create($validatedData);
        return redirect('/kategori')->with('toast_success', 'Kategori prestasi berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categoryprestasi'] = CategoryPrestasi::get();
        $data['categoryprestasi'] = CategoryPrestasi::find($id);
        return view('admin.prestasi.category.edit', $data);
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
            'name' => 'required|string|min:2|max:50',
        ]);
        $category = CategoryPrestasi::find($id);
        $category->update($validatedData);
        return redirect('/kategori')->with('toast_success', 'Kategori Prestasi berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestasi = PrestasiIndividu::with('categoryprestasi')->where('category_prestasi_id', $id)->count();
        $prestasi = PrestasiTim::with('categoryprestasi')->where('category_prestasi_id', $id)->count();
        if ($prestasi >= 1) {
            return redirect()->back()->with('toast_error', 'Maaf kategori tidak bisa dihapus karena masih terhubung dengan beberapa produk');
        } else {
            CategoryPrestasi::destroy($id);
            return redirect('/kategori')->with('toast_success', 'Kategori Prestasi berhasil dihapus');
        }
    }
}
