<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refueling extends Model
{
    //

    // add fillable
    protected $fillable = ['unit_id', 'karyawan_id', 'tanggal', 'waktu', 'HM', 'KM', 'jumlah', 'fuelman', 'keterangan'];
    // add guaded
    protected $guarded = ['id'];
    // add hidden
    protected $hidden = ['created_at', 'updated_at'];

    // relation to unit
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // relation to karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
