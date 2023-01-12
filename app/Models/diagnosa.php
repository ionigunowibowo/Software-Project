<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diagnosa extends Model
{
    protected $table = 'diagnosa';

    protected $fillable = ['pasien_id', 'kerusakan_id', 'persentase'];

    public $timestamps = false;

    public function kerusakan()
    {
        return $this->belongsTo('App\Models\kerusakan');
    }

    public function pasien()
    {
        return $this->belongsTo('App\Models\kerusakan');
    }
}
