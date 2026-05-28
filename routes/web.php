<?php

use App\Models\Device;  // ← tambah ini
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\SensorReadingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', fn() => redirect()->route('login'));

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('maggot', DeviceController::class);

    Route::get('/monitoring', function () {
    $devices = auth()->user()->devices()->get();

    if ($devices->isEmpty()) {
        return redirect()->route('devices.index')
            ->with('info', 'Tambahkan device dulu sebelum monitoring.');
    }

    if ($devices->count() === 1) {
        return redirect()->route('monitoring.index', $devices->first()->id);
    }

    return view('monitoring.select', compact('devices'));
    })->name('monitoring.list'); // ← ganti nama jadi monitoring.list

    // Live: 50 data terbaru
    Route::get('/api/monitoring/{device}/latest', function (Device $device) {
        abort_if($device->user_id !== auth()->id(), 403);
        return response()->json(
            $device->sensorReadings()
                ->latest('recorded_at')
                ->limit(50)
                ->get(['temperature', 'humidity', 'status', 'recorded_at'])
                ->map(function ($r) {
                    $r->recorded_at = $r->recorded_at->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s');
                    return $r;
                })
        );
    });
    // Historis: data by tanggal (fix timezone WIB)
    Route::get('/api/monitoring/{device}/history', function (Device $device) {
        abort_if($device->user_id !== auth()->id(), 403);
        $tanggal = request('tanggal', now()->format('Y-m-d'));
        return response()->json(
            $device->sensorReadings()
                ->whereDate('recorded_at', $tanggal)
                ->latest('recorded_at')
                ->get(['temperature', 'humidity', 'status', 'recorded_at'])
                ->map(function ($r) {
                    $r->recorded_at = $r->recorded_at->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s');
                    return $r;
                })
        );
    });

    Route::get('/monitoring/{device}', [SensorReadingController::class, 'index'])->name('monitoring.index');

    Route::get('/laporan', [SensorReadingController::class, 'laporan'])->name('laporan.index');
    Route::get('/edukasi', function () {
        return view('edukasi.index');
    })->name('edukasi.index');

    Route::delete('/maggot-record/{record}', function(\App\Models\MaggotRecord $record) {
        abort_if($record->user_id !== auth()->id(), 403);
        $record->delete();
        return redirect()->route('maggot.index')->with('success', 'Record dihapus!');
    })->name('maggot-record.destroy');

    Route::get('/maggot-record/{record}/edit', function(\App\Models\MaggotRecord $record) {
        abort_if($record->user_id !== auth()->id(), 403);
        $devices = auth()->user()->devices()->get();
        return view('maggot.edit-record', compact('record', 'devices'));
    })->name('maggot-record.edit');

    Route::put('/maggot-record/{record}', function(\Illuminate\Http\Request $request, \App\Models\MaggotRecord $record) {
        abort_if($record->user_id !== auth()->id(), 403);
        $record->update($request->validate([
            'tanggal'        => 'required|date',
            'sampah_masuk'   => 'required|numeric|min:0',
            'berat_biomassa' => 'required|numeric|min:0',
            'hasil_panen'    => 'nullable|numeric|min:0',
            'keterangan'     => 'nullable|string',
        ]));
        return redirect()->route('maggot.index')->with('success', 'Record diupdate!');
    })->name('maggot-record.update');

    Route::get('/devices', [DeviceController::class, 'deviceIndex'])->name('devices.index');
    Route::post('/devices', [DeviceController::class, 'store'])->name('devices.store');
    Route::put('/devices/{device}', [DeviceController::class, 'update'])->name('devices.update');
    Route::delete('/devices/{device}', [DeviceController::class, 'destroy'])->name('devices.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
