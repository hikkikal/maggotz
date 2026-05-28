<?php

namespace App\Console\Commands;

use App\Models\Device;
use App\Models\SensorReading;
use Illuminate\Console\Command;
use PhpMqtt\Client\Facades\MQTT;

class MqttSubscribe extends Command
{
    protected $signature   = 'mqtt:subscribe';
    protected $description = 'Subscribe ke broker MQTT dan simpan data sensor';

    public function handle()
    {
        $this->info('MQTT Subscriber berjalan...');

        $mqtt = MQTT::connection();

        // Subscribe semua topic suhu & kelembaban
        $mqtt->subscribe('maggot/+/suhu', function (string $topic, string $message) {
            $this->simpanData($topic, $message, 'suhu');
        }, 0);

        $mqtt->subscribe('maggot/+/kelembaban', function (string $topic, string $message) {
            $this->simpanData($topic, $message, 'kelembaban');
        }, 0);

        $mqtt->loop(true);
    }

    private function simpanData(string $topic, string $message, string $tipe)
    {
        $field  = $tipe === 'suhu' ? 'mqtt_topic_suhu' : 'mqtt_topic_lembab';
        $device = Device::where($field, $topic)->first();
        if (!$device) return;

        if ($tipe === 'suhu') {
            // Selalu buat row baru saat suhu datang
            SensorReading::create([
                'device_id'   => $device->id,
                'temperature' => (float) $message,
                'humidity'    => 0,
                'status'      => 'KERING',
                'recorded_at' => now(),
            ]);
        } else {
            // Update row terbaru yang humidity-nya masih 0
            $reading = SensorReading::where('device_id', $device->id)
                ->where('humidity', 0)
                ->latest('recorded_at')
                ->first();

            if ($reading) {
                $suhu   = $reading->temperature;
                $lembab = (float) $message;
                $reading->update([
                    'humidity' => $lembab,
                    'status'   => $this->hitungStatus($suhu, $lembab),
                ]);
            }
        }
    }

    private function hitungStatus(float $suhu, float $lembab): string
    {
        if ($suhu >= 36.0)                                    return 'BAHAYA';
        if ($suhu < 25.0)                                     return 'DINGIN';
        if ($suhu >= 25.0 && $suhu < 36.0 && $lembab >= 60)  return 'IDEAL';
        return 'KERING';
    }
}
