<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'user_id', 'name', 'mqtt_topic_suhu',
        'mqtt_topic_lembab', 'location', 'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sensorReadings()
    {
        return $this->hasMany(SensorReading::class);
    }

    public function latestReading()
    {
        return $this->hasOne(SensorReading::class)->latestOfMany('recorded_at');
    }
}
