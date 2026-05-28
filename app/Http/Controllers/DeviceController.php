<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\MaggotRecord;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        $devices = auth()->user()->devices()->with('latestReading')->latest()->get();
        $records = auth()->user()->maggotRecords()->with('device')->latest('tanggal')->get();
        return view('maggot.index', compact('devices', 'records'));
    }

    public function deviceIndex()
    {
        $devices = auth()->user()->devices()->with('latestReading')->latest()->get();
        return view('devices.index', compact('devices'));
    }

    public function create()
    {
        $devices = auth()->user()->devices()->get();
        return view('maggot.create', compact('devices'));
    }

    public function store(Request $request)
    {
        // Simpan device baru
        if ($request->has('name')) {
            $request->validate([
                'name'              => 'required|string|max:100',
                'mqtt_topic_suhu'   => 'required|string',
                'mqtt_topic_lembab' => 'required|string',
                'location'          => 'nullable|string',
            ]);
            auth()->user()->devices()->create($request->only(
                'name', 'mqtt_topic_suhu', 'mqtt_topic_lembab', 'location'
            ));
        }

        // Simpan record maggot manual
        if ($request->has('tanggal')) {
            $request->validate([
                'tanggal'        => 'required|date',
                'sampah_masuk'   => 'required|numeric|min:0',
                'berat_biomassa' => 'required|numeric|min:0',
                'hasil_panen'    => 'nullable|numeric|min:0',
                'keterangan'     => 'nullable|string',
                'device_id'      => 'nullable|exists:devices,id',
            ]);
            auth()->user()->maggotRecords()->create($request->only(
                'tanggal', 'sampah_masuk', 'berat_biomassa',
                'hasil_panen', 'keterangan', 'device_id'
            ));
        }

        return redirect()->route('maggot.index')->with('success', 'Data berhasil disimpan!');
    }

    public function edit(Device $device)
    {
        abort_if($device->user_id !== auth()->id(), 403);
        return view('maggot.edit', compact('device'));
    }

    public function update(Request $request, Device $device)
    {
        abort_if($device->user_id !== auth()->id(), 403);
        $device->update($request->validate([
            'name'     => 'required|string|max:100',
            'location' => 'nullable|string',
        ]));
        return redirect()->route('maggot.index')->with('success', 'Device diupdate!');
    }

    public function destroy(Device $device)
    {
        abort_if($device->user_id !== auth()->id(), 403);
        $device->delete();
        return redirect()->route('maggot.index')->with('success', 'Device dihapus!');
    }
}
