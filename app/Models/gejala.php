<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gejala extends Model
{
    protected $table = "gejala";
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function kerusakan()
    {
        return $this->belongsToMany('App\Models\kerusakan', 'aturan');
    }

    public function pasien()
    {
        return $this->belongsToMany('App\Models\pasien', 'tmp_gejala');
    }
}
