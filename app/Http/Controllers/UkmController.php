<?php

namespace App\Http\Controllers;

use App\Models\Ukm;
use Illuminate\Http\Request;
use DB;
use File;

class UkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Organisasi UKM';
        $data['breadcumb'] = 'Organisasi UKM';
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
        $data['page_title'] = 'Organisasi UKM';
        $data['breadcumb'] = 'Organisasi UKM';

        return view('admin.organisasi.ukm.add', $data);
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

        $beasiswa = new Ukm();
        $beasiswa->title = $validateData['title'];
        $beasiswa->content = $validateData['content'];
        $beasiswa->dari_tanggal = $validateData['dari_tanggal'];
        $beasiswa->sampai_tanggal = $validateData['sampai_tanggal'];
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/ukm/');
            $image->move($destinationPath, $name);
            $beasiswa->gambar = $name;
        }
        $beasiswa->save();

        return redirect()->route('ukm-list')->with(['success' => ' successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ukm = Ukm::findOrFail($id);
        return view('frontend.organisasi.ukm_detail', compact('ukm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beasiswa  $beasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['page_title'] = 'Organisasi UKM';
        $data['breadcumb'] = 'Organisasi UKM';
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
        $validateData = $request->validate([
            'title'   => 'required|string|min:3',
            'content'   => 'required|string|min:3',
            'gambar'   => 'required',
            'dari_tanggal'   => 'required',
            'sampai_tanggal'   => 'required',
        ]);

        $beasiswa = Ukm::find($id);
        $beasiswa->title = $validateData['title'];
        $beasiswa->content = $validateData['content'];
        $beasiswa->dari_tanggal = $validateData['dari_tanggal'];
        $beasiswa->sampai_tanggal = $validateData['sampai_tanggal'];
        if ($request->hasFile('gambar')) {
            // Delete Img
            if ($beasiswa->gambar) {
                $image_path = public_path('img/ukm/'.$beasiswa->gambar); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            
            $image = $request->file('gambar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/ukm/');
            $image->move($destinationPath, $name);
            $beasiswa->gambar = $name;
        }
        $beasiswa->save();

        return redirect()->route('ukm-list')->with(['success' => ' successfully!']);
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
            $beasiswa = Ukm::findOrFail($id);
            if ($beasiswa->avatar) {
                $image_path = public_path('img/ukm/'.$beasiswa->avatar); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            $beasiswa->delete();
        });
        
        return redirect()->route('ukm-list')->with(['success' => ' successfully!']);
    }

    public function frontUkm(){
        $data['page_title'] = 'Organisasi UKM';
        $data['breadcumb'] = 'Organisasi UKM';
        $data['ukm'] = Ukm::get();

        return view('frontend.organisasi.ukm', $data);
    }
}
