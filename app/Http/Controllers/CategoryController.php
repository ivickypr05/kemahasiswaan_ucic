<?php

namespace App\Http\Controllers;

use App\Models\Pretim;
use App\Models\Category;
use App\Models\Preindividu;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::get();
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
            'nama' => 'required|min:2|max:50'
        ]);
        Category::create($validatedData);
        return redirect('/category-list')->with('toast_success', 'Kategori prestasi berhasil ditambah');
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
        $data['categories'] = Category::get();
        $data['category'] = Category::find($id);
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
            'nama' => 'required|string|min:2|max:50',
        ]);
        $category = Category::find($id);
        $category->update($validatedData);
        return redirect('/category-list')->with('toast_success', 'Kategori Prestasi berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestasi = Preindividu::with('Category')->where('category_id', $id)->count();
        $prestasi = Pretim::with('Category')->where('category_id', $id)->count();
        if ($prestasi >= 1) {
            return redirect()->back()->with('toast_error', 'Maaf kategori tidak bisa dihapus karena masih terhubung dengan beberapa produk');
        } else {
            Category::destroy($id);
            return redirect('/category-list')->with('toast_success', 'Kategori Prestasi berhasil dihapus');
        }
    }
}
