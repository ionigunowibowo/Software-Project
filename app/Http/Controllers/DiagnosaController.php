<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pasien;
use App\Models\gejala;
use App\Models\tempdiagnosa;
use App\Models\diagnosa;
use App\Models\kerusakan;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pasienForm()
    {
        return view('form_pasien');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePasien(Request $request)
    {
        $pasien = new pasien;
        $pasien->nama = $request->nama;
        $pasien->email = $request->email;
        $pasien->save();
        return $this->selectGejala($pasien->id);
    }

    private function selectGejala($pasien_id)
    {
        $gejala = gejala::all();
        return view('form_gejala', compact('gejala', 'pasien_id'));
    }

    public function diagnosa(Request $request)
    {
        $pasien_id = $request->pasien_id;
        foreach ($request->gejala as $gejala_id) {
            $pasien = pasien::find($pasien_id)->attachGejala($gejala_id);
            $gejala = gejala::find($gejala_id);
            foreach ($gejala->kerusakan as $kerusakan) {
                $temp_diagnosa = tempdiagnosa::where('pasien_id', $pasien_id)->where('kerusakan_id', $kerusakan->id);
                $temp_diag = $temp_diagnosa->first();
                if (!$temp_diag) {
                    $temp_diag = new tempdiagnosa;
                    $temp_diag->pasien_id = $pasien_id;
                    $temp_diag->kerusakan_id = $kerusakan->id;
                    $temp_diag->gejala = count($kerusakan->gejala);
                    $temp_diag->gejala_terpenuhi = 1;
                    $temp_diag->save();
                } else {
                    $temp_diag = $temp_diagnosa->update(['gejala_terpenuhi' => $temp_diag->gejala_terpenuhi + 1]);
                }
            }
        }

        $this->hitungPersen($pasien_id);

        $this->hasil($pasien_id);

        return redirect()->route('hasilDiagnosa', $pasien_id);
    }

    private function hitungPersen($pasien_id)
    {
        $temp_diags = tempdiagnosa::where('pasien_id', $pasien_id)->get();
        foreach ($temp_diags as $temp_diag) {
            $persen = ($temp_diag->gejala_terpenuhi / $temp_diag->gejala) * 100;
            tempdiagnosa::where('kerusakan_id', $temp_diag->kerusakan_id)
                ->where('pasien_id', $pasien_id)
                ->update(['persen' => $persen]);
        }
    }

    private function hasil($pasien_id)
    {
        $temp_diagnosa = tempdiagnosa::where('pasien_id', $pasien_id);
        $sum_persen = $temp_diagnosa->sum('persen');
        $temp_diag = $temp_diagnosa->get();
        foreach ($temp_diag as $diag) {
            $persentase = ($diag->persen / $sum_persen) * 100;
            $diagnosa = diagnosa::create([
                'pasien_id' => $diag->pasien_id,
                'kerusakan_id' => $diag->kerusakan_id,
                'persentase' => $persentase
            ]);
        }

        // return $this->hapusTempDiagnosa($pasien_id);
    }

    private function hapusTempDiagnosa($pasien_id)
    {
        return tempdiagnosa::where('pasien_id', $pasien_id)->delete();
    }

    public function hasilDiagnosa($pasien_id)
    {
        $diagnosa = diagnosa::where('pasien_id', $pasien_id)->first();
        return view('diagnosa', compact('diagnosa'));
    }
}
