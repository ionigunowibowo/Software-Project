<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tempdiagnosa extends Model
{
    protected $table = 'tmp_diagnosa';

    protected $fillable = ['pasien_id', 'penyakit_id', 'gejala', 'gejala_terpenuhi', 'persen'];

    public $timestamps = false;
}
