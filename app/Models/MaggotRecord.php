<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaggotRecord extends Model
{
    protected $fillable = [
        'user_id', 'device_id', 'tanggal',
        'sampah_masuk', 'berat_biomassa',
        'hasil_panen', 'keterangan'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
