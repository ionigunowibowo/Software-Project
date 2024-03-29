<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\gejala;

class kerusakan extends Model
{
    protected $table = "kerusakan";
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function gejala()
    {
        return $this->belongsToMany('App\Models\gejala', 'aturan');
    }

    public function attachGejala($gejala_id)
    {
        $gejala = gejala::find($gejala_id);
        return $this->gejala()->attach($gejala);
    }

    public function detachGejala($gejala_id)
    {
        $gejala = gejala::find($gejala_id);
        return $this->gejala()->detach($gejala);
    }
}
