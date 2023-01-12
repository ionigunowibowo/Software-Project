<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gejala;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemgejala = gejala::orderBy('created_at', 'desc')->paginate(20);;
        $data = array(
            'title' => 'Gejala',
            'itemgejala' => $itemgejala
        );
        return view('gejala.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array('title' => 'Form Gejala');
        return view('gejala.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            //'kode_gejala' => 'required|unique:gejala',
            'nama' => 'required',

        ]);

        $itemuser = $request->user();
        $inputan = $request->all();
        $inputan['user_id'] = $itemuser->id;
        $itemgejala = gejala::create($inputan);

        return redirect()->route('gejala.index')->with('success', 'Data Gejala berhasil disimpan');
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
        $itemgejala = gejala::findOrFail($id);
        $data = array(
            'title' => 'Form Edit Gejala',
            'itemgejala' => $itemgejala
        );
        return view('gejala.edit', $data);
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
        $this->validate($request, [
            'id' => 'required',
            'nama' => 'required',
        ]);

        $itemgejala = gejala::findOrFail($id);
        $inputan = $request->all();
        $itemgejala->update($inputan);
        return redirect()->route('gejala.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemgejala = gejala::findOrFail($id);
        if ($itemgejala->delete()) {
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data gagal dihapus');
        }
    }
}
