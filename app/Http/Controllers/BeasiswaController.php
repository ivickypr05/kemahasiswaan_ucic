<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use DB;
use File;
class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Beasiswa';
        $data['breadcumb'] = 'Beasiswa';
        $data['beasiswa'] = Beasiswa::orderby('id', 'asc')->get();
        return view('admin.beasiswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Beasiswa';
        $data['breadcumb'] = 'Beasiswa';

        return view('admin.beasiswa.add', $data);
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
            'title'   => 'required|string|min:3',
            'content'   => 'required|string|min:3',
            'gambar'   => 'required',
            'dari_tanggal'   => 'required',
            'sampai_tanggal'   => 'required',
        ]);

        $beasiswa = new Beasiswa();
        $beasiswa->title = $validateData['title'];
        $beasiswa->content = $validateData['content'];
        $beasiswa->dari_tanggal = $validateData['dari_tanggal'];
        $beasiswa->sampai_tanggal = $validateData['sampai_tanggal'];
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/beasiswa/');
            $image->move($destinationPath, $name);
            $beasiswa->gambar = $name;
        }
        $beasiswa->save();

        return redirect()->route('beasiswa-list')->with(['success' => ' successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        return view('frontend.beasiswa.detail', compact('beasiswa'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title'] = 'Beasiswa';
        $data['breadcumb'] = 'Beasiswa';
        $data['beasiswa'] = Beasiswa::find($id);

        return view('admin.beasiswa.edit', $data);
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
            'title'   => 'required|string|min:3',
            'content'   => 'required|string|min:3',
            'gambar'   => 'required',
            'dari_tanggal'   => 'required',
            'sampai_tanggal'   => 'required',
        ]);

        $beasiswa = Beasiswa::find($id);
        $beasiswa->title = $validateData['title'];
        $beasiswa->content = $validateData['content'];
        $beasiswa->dari_tanggal = $validateData['dari_tanggal'];
        $beasiswa->sampai_tanggal = $validateData['sampai_tanggal'];
        if ($request->hasFile('gambar')) {
            // Delete Img
            if ($beasiswa->gambar) {
                $image_path = public_path('img/beasiswa/'.$beasiswa->gambar); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/beasiswa/');
            $image->move($destinationPath, $name);
            $beasiswa->gambar = $name;
        }
        $beasiswa->save();

        return redirect()->route('beasiswa-list')->with(['success' => ' successfully!']);
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
            $beasiswa = Beasiswa::findOrFail($id);
            if ($beasiswa->avatar) {
                $image_path = public_path('img/beasiswa/'.$beasiswa->avatar); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $beasiswa->delete();
        });
        
        return redirect()->route('beasiswa-list')->with(['success' => ' successfully!']);
    }

    public function frontBeasiswa(){
        $data['page_title'] = 'Beasiswa';
        $data['breadcumb'] = 'Beasiswa';
        $data['beasiswa'] = Beasiswa::get();

        return view('frontend.beasiswa.index', $data);
    }
}
