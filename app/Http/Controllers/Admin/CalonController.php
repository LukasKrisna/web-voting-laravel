<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.calon.index', [
            'calons' => Calons::all(),
            'active' => 'calon'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.calon.create', [
            'active' => 'calon'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        // $calon = Calons::where('id', $id)->get();
        $calon = Calons::where('id', $id)->first();

        if (!$calon) {
            return redirect()->back()->with('error', 'Kandidat tidak ditemukan.');
        }
        // dd('Reached editCalon method');
        // dd($id);
        // $calon = Calons::find($id);
        // dd($calon);
        return view('admin.pages.calon.edit', compact('calon'));
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Calons::where('id', $id)->delete();

        $image_path = 'foto_calon/' . $id . '.jpg';
        if (File::exists($image_path)) {
            File::delete($image_path);
        }

        return redirect()->back()->with('deleted', 'Kandidat Berhasil Dihapus');
    }
}
