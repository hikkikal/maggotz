<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\SensorReading;
use Carbon\Carbon;

class SensorReadingController extends Controller
{
    public function index(Device $device)
    {
        abort_if($device->user_id !== auth()->id(), 403);

        $tanggal = request('tanggal', now()->format('Y-m-d'));

        $readings = $device->sensorReadings()
            ->whereDate('recorded_at', $tanggal)
            ->latest('recorded_at')
            ->paginate(50)
            ->withQueryString();

        $chartData = $device->sensorReadings()
            ->where('recorded_at', '>=', now()->subHours(24))
            ->orderBy('recorded_at')
            ->get(['temperature', 'humidity', 'status', 'recorded_at']);

        return view('monitoring.index', compact('device', 'readings', 'chartData'));
    }

    public function laporan()
    {
        $records = auth()->user()->maggotRecords()
            ->with('device')
            ->latest('tanggal')
            ->get();

        $totalSampah   = $records->sum('sampah_masuk');
        $totalProduksi = $records->sum('hasil_panen');
        $efisiensi     = $totalSampah > 0
            ? round(($totalProduksi / $totalSampah) * 100, 1)
            : 0;

        $chartRecords = auth()->user()->maggotRecords()
            ->where('tanggal', '>=', now()->subDays(7))
            ->orderBy('tanggal')
            ->get(['tanggal', 'sampah_masuk', 'hasil_panen']);

        return view('laporan.index', compact(
            'records', 'totalSampah', 'totalProduksi', 'efisiensi', 'chartRecords'
        ));
    }
}
