<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    protected $table = 'pasien';

    protected $guarder = ['id', 'created_at', 'updated_at'];

    public function gejala()
    {
        return $this->belongsToMany('App\Models\gejala', 'tmp_gejala');
    }

    public function diagnosa()
    {
        return $this->hasMany('App\Models\diagnosa');
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
