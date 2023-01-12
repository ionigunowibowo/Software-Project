<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kerusakan;

class KerusakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemkerusakan = kerusakan::orderBy('created_at', 'desc')->paginate(20);
        $data = array(
            'title' => 'Kerusakan',
            'itemkerusakan' => $itemkerusakan
        );
        return view('kerusakan.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = array('title' => 'Form Kerusakan');
        return view('kerusakan.create', $data);
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
            //'kode_kerusakan' => 'required|unique:kerusakan',
            'nama' => 'required',
            // 'penyebab' => 'required',
            // 'solusi' => 'required',

        ]);

        $itemuser = $request->user();
        $inputan = $request->all();
        $inputan['user_id'] = $itemuser->id;
        $itemkerusakan = kerusakan::create($inputan);

        return redirect()->route('kerusakan.index')->with('success', 'Data Kerusakan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = array('title' => 'Data Kerusakan');
        // return view('kerusakan.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $itemkerusakan = kerusakan::findOrFail($id);
        $data = array(
            'title' => 'Form Edit Kerusakan',
            'itemkerusakan' => $itemkerusakan
        );
        return view('kerusakan.edit', $data);
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
            // 'penyebab' => 'required',
            // 'solusi' => 'required',
        ]);

        $itemkerusakan = kerusakan::findOrFail($id);
        $inputan = $request->all();
        $itemkerusakan->update($inputan);
        return redirect()->route('kerusakan.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemkerusakan = kerusakan::findOrFail($id);
        if ($itemkerusakan->delete()) {
            return back()->with('success', 'Data berhasil dihapus');
        } else {
            return back()->with('error', 'Data gagal dihapus');
        }
    }
}
