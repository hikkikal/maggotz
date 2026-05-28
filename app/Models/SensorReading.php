<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class SensorReading extends Model
{
    protected $fillable = [
        'device_id', 'temperature', 'humidity', 'status', 'recorded_at'
    ];

    protected $casts = [
        'recorded_at' => 'datetime',
    ];

    // Paksa semua serialisasi JSON pakai Asia/Jakarta
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->setTimezone(new \DateTimeZone('Asia/Jakarta'))
                    ->format('Y-m-d H:i:s');
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}