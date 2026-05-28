<?php

namespace App\Http\Controllers;

use App\Models\SensorReading;
use App\Models\MaggotRecord;

class DashboardController extends Controller
{
    public function index()
    {
        // Suhu & kelembaban terbaru dari semua device milik user
        $latestReading = SensorReading::whereHas('device', function($q) {
                $q->where('user_id', auth()->id());
            })
            ->latest('recorded_at')
            ->first();

        // Data maggot terbaru (input manual)
        $latestRecord = auth()->user()->maggotRecords()
            ->latest('tanggal')
            ->first();

        // Total panen bulan berjalan
        $totalPanen = auth()->user()->maggotRecords()
            ->whereMonth('tanggal', now()->month)
            ->whereYear('tanggal', now()->year)
            ->sum('hasil_panen');

        // Data grafik 24 jam terakhir
        $chartData = SensorReading::whereHas('device', function($q) {
                $q->where('user_id', auth()->id());
            })
            ->where('recorded_at', '>=', now()->subHours(24))
            ->orderBy('recorded_at')
            ->get(['temperature', 'humidity', 'recorded_at']);

        return view('dashboard.index', compact(
            'latestReading', 'latestRecord', 'totalPanen', 'chartData'
        ));
    }
}
