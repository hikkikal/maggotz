@extends('layouts.app')

@section('title', 'Kelola Device')

@section('content')

<div class="relative z-10 w-full font-sans select-none space-y-4 md:space-y-6">

    {{-- Flash Messages --}}
    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 text-xs font-semibold px-4 py-3 rounded-xl flex items-center gap-2">
        <i class="fa-solid fa-circle-check text-green-500"></i>
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="bg-red-50 border border-red-200 text-red-800 text-xs font-semibold px-4 py-3 rounded-xl flex items-center gap-2">
        <i class="fa-solid fa-circle-xmark text-red-500"></i>
        {{ session('error') }}
    </div>
    @endif

    {{-- Header --}}
    <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_30px_-10px_rgba(13,59,22,0.08)] border border-white/50 relative overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-[4px] bg-gradient-to-r from-[#0D3B16] via-[#737F35] to-[#233E47]"></div>
        <div class="px-4 md:px-6 py-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[#0D3B16] text-white flex items-center justify-center shrink-0 shadow-md">
                    <i class="fa-solid fa-microchip text-lg"></i>
                </div>
                <div>
                    <h1 class="text-lg md:text-2xl font-extrabold text-[#0D3B16] tracking-wide uppercase">Kelola Device</h1>
                    <p class="text-[11px] md:text-xs text-gray-400 font-medium mt-0.5">Daftarkan kandang & sensor IoT kamu</p>
                </div>
            </div>
            <button onclick="document.getElementById('modalTambah').classList.remove('hidden')"
                class="inline-flex items-center gap-2 px-4 py-2.5 bg-[#0D3B16] text-white text-xs font-bold rounded-xl hover:bg-[#0a2e12] active:scale-95 transition-all shadow-md">
                <i class="fa-solid fa-plus"></i> Tambah Device
            </button>
        </div>
    </div>

    {{-- Device List --}}
    @if($devices->isEmpty())
    <div class="bg-white/60 backdrop-blur-md rounded-2xl border border-white/50 p-10 text-center">
        <div class="w-16 h-16 rounded-2xl bg-[#0D3B16]/10 text-[#0D3B16] flex items-center justify-center mx-auto mb-4">
            <i class="fa-solid fa-microchip text-2xl"></i>
        </div>
        <p class="text-sm font-bold text-gray-700">Belum ada device terdaftar</p>
        <p class="text-xs text-gray-400 mt-1 mb-5">Tambahkan device untuk mulai monitoring sensor kandang kamu</p>
        <button onclick="document.getElementById('modalTambah').classList.remove('hidden')"
            class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#0D3B16] text-white text-xs font-bold rounded-xl hover:bg-[#0a2e12] active:scale-95 transition-all shadow-md">
            <i class="fa-solid fa-plus"></i> Tambah Device Sekarang
        </button>
    </div>
    @else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($devices as $device)
        @php
            $lr     = $device->latestReading;
            $status = $lr?->status ?? null;
            $statusStyle = match($status) {
                'IDEAL'  => ['dot' => 'bg-green-400', 'badge' => 'bg-green-100 text-green-800'],
                'BAHAYA' => ['dot' => 'bg-red-400 animate-pulse', 'badge' => 'bg-red-100 text-red-800'],
                'DINGIN' => ['dot' => 'bg-blue-400',  'badge' => 'bg-blue-100 text-blue-800'],
                'KERING' => ['dot' => 'bg-yellow-400','badge' => 'bg-yellow-100 text-yellow-800'],
                default  => ['dot' => 'bg-gray-300',  'badge' => 'bg-gray-100 text-gray-500'],
            };
        @endphp
        <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-white/50 shadow-[0_8px_24px_-8px_rgba(13,59,22,0.08)] overflow-hidden hover:shadow-[0_14px_30px_-8px_rgba(13,59,22,0.14)] hover:-translate-y-0.5 transition-all duration-200">
            {{-- Top bar status --}}
            <div class="h-1 w-full {{ $status === 'IDEAL' ? 'bg-green-400' : ($status === 'BAHAYA' ? 'bg-red-400' : ($status === 'DINGIN' ? 'bg-blue-400' : ($status === 'KERING' ? 'bg-yellow-400' : 'bg-gray-200'))) }}"></div>

            <div class="p-4 md:p-5">
                {{-- Device info --}}
                <div class="flex items-start justify-between gap-3 mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-[#0D3B16] text-white flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-microchip text-sm"></i>
                        </div>
                        <div>
                            <p class="font-extrabold text-[#0D3B16] text-sm leading-tight">{{ $device->name }}</p>
                            <p class="text-[11px] text-gray-400 mt-0.5">{{ $device->location ?? 'Lokasi tidak diset' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-1.5 shrink-0">
                        <span class="w-2 h-2 rounded-full {{ $statusStyle['dot'] }}"></span>
                        <span class="text-[9px] font-bold uppercase {{ $statusStyle['badge'] }} px-2 py-0.5 rounded-md">
                            {{ $status ?? 'Offline' }}
                        </span>
                    </div>
                </div>

                {{-- Sensor data --}}
                @if($lr)
                <div class="grid grid-cols-2 gap-2 mb-4">
                    <div class="bg-[#0D3B16]/5 rounded-xl p-3">
                        <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-wide">Suhu</p>
                        <p class="text-lg font-black text-[#0D3B16]">{{ $lr->temperature }}°C</p>
                    </div>
                    <div class="bg-[#233E47]/5 rounded-xl p-3">
                        <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-wide">Kelembaban</p>
                        <p class="text-lg font-black text-[#233E47]">{{ $lr->humidity }}%</p>
                    </div>
                </div>
                <p class="text-[10px] text-gray-400 mb-4">
                    <i class="fa-regular fa-clock mr-1"></i>
                    Update {{ $lr->recorded_at->diffForHumans() }}
                </p>
                @else
                <div class="bg-gray-50 rounded-xl p-3 mb-4 text-center">
                    <p class="text-[11px] text-gray-400">Belum ada data sensor masuk</p>
                    <p class="text-[10px] text-gray-300 mt-0.5">Pastikan ESP32 menyala & terhubung</p>
                </div>
                @endif

                {{-- MQTT topics --}}
                <div class="space-y-1.5 mb-4">
                    <div class="flex items-center gap-2 bg-gray-50 rounded-lg px-3 py-1.5">
                        <i class="fa-solid fa-temperature-half text-[10px] text-[#0D3B16]"></i>
                        <span class="text-[10px] font-mono text-gray-500 truncate">{{ $device->mqtt_topic_suhu }}</span>
                    </div>
                    <div class="flex items-center gap-2 bg-gray-50 rounded-lg px-3 py-1.5">
                        <i class="fa-solid fa-droplet text-[10px] text-[#233E47]"></i>
                        <span class="text-[10px] font-mono text-gray-500 truncate">{{ $device->mqtt_topic_lembab }}</span>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex gap-2">
                    <a href="{{ route('monitoring.index', $device->id) }}"
                        class="flex-1 text-center py-2 text-[11px] font-bold bg-[#0D3B16] text-white rounded-xl hover:bg-[#0a2e12] active:scale-95 transition-all">
                        <i class="fa-solid fa-chart-line mr-1"></i> Monitoring
                    </a>
                    <button onclick="openEdit({{ $device->id }}, '{{ $device->name }}', '{{ $device->location }}')"
                        class="px-3 py-2 text-[11px] font-bold bg-gray-100 text-gray-600 rounded-xl hover:bg-gray-200 active:scale-95 transition-all">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <form action="{{ route('devices.destroy', $device->id) }}" method="POST"
                        onsubmit="return confirm('Hapus device {{ $device->name }}? Data sensor juga ikut terhapus.')">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-3 py-2 text-[11px] font-bold bg-red-50 text-red-500 rounded-xl hover:bg-red-100 active:scale-95 transition-all">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

</div>

{{-- Modal Tambah Device --}}
<div id="modalTambah" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">
        <div class="bg-[#0D3B16] px-6 py-4 flex items-center justify-between">
            <h2 class="text-white font-extrabold text-sm uppercase tracking-wide">Tambah Device Baru</h2>
            <button onclick="document.getElementById('modalTambah').classList.add('hidden')" class="text-white/70 hover:text-white text-lg">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form action="{{ route('devices.store') }}" method="POST" class="p-6 space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5">Nama Kandang <span class="text-red-400">*</span></label>
                <input type="text" name="name" placeholder="cth: Kandang A, Box Maggot 1"
                    class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#0D3B16] focus:border-transparent transition-all"
                    required />
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5">MQTT Topic Suhu <span class="text-red-400">*</span></label>
                <input type="text" name="mqtt_topic_suhu" placeholder="cth: maggot/sensor/suhu"
                    class="w-full px-4 py-2.5 text-sm font-mono border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#0D3B16] focus:border-transparent transition-all"
                    required />
                <p class="text-[10px] text-gray-400 mt-1">Harus sama persis dengan <code class="bg-gray-100 px-1 rounded">topic_suhu</code> di kode ESP32</p>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5">MQTT Topic Kelembaban <span class="text-red-400">*</span></label>
                <input type="text" name="mqtt_topic_lembab" placeholder="cth: maggot/sensor/kelembaban"
                    class="w-full px-4 py-2.5 text-sm font-mono border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#0D3B16] focus:border-transparent transition-all"
                    required />
                <p class="text-[10px] text-gray-400 mt-1">Harus sama persis dengan <code class="bg-gray-100 px-1 rounded">topic_lembab</code> di kode ESP32</p>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5">Lokasi <span class="text-gray-400 font-normal">(opsional)</span></label>
                <input type="text" name="location" placeholder="cth: Ruang belakang, Lantai 2"
                    class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#0D3B16] focus:border-transparent transition-all" />
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="document.getElementById('modalTambah').classList.add('hidden')"
                    class="flex-1 py-2.5 text-xs font-bold text-gray-600 bg-gray-100 rounded-xl hover:bg-gray-200 transition-all">
                    Batal
                </button>
                <button type="submit"
                    class="flex-1 py-2.5 text-xs font-bold text-white bg-[#0D3B16] rounded-xl hover:bg-[#0a2e12] active:scale-95 transition-all shadow-md">
                    <i class="fa-solid fa-plus mr-1"></i> Tambah Device
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit Device --}}
<div id="modalEdit" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/40 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden">
        <div class="bg-[#233E47] px-6 py-4 flex items-center justify-between">
            <h2 class="text-white font-extrabold text-sm uppercase tracking-wide">Edit Device</h2>
            <button onclick="document.getElementById('modalEdit').classList.add('hidden')" class="text-white/70 hover:text-white text-lg">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <form id="formEdit" method="POST" class="p-6 space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5">Nama Kandang <span class="text-red-400">*</span></label>
                <input type="text" id="editName" name="name"
                    class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#233E47] focus:border-transparent transition-all"
                    required />
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1.5">Lokasi</label>
                <input type="text" id="editLocation" name="location"
                    class="w-full px-4 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#233E47] focus:border-transparent transition-all" />
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="document.getElementById('modalEdit').classList.add('hidden')"
                    class="flex-1 py-2.5 text-xs font-bold text-gray-600 bg-gray-100 rounded-xl hover:bg-gray-200 transition-all">
                    Batal
                </button>
                <button type="submit"
                    class="flex-1 py-2.5 text-xs font-bold text-white bg-[#233E47] rounded-xl hover:bg-[#1c333e] active:scale-95 transition-all shadow-md">
                    <i class="fa-solid fa-floppy-disk mr-1"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openEdit(id, name, location) {
    document.getElementById('editName').value     = name;
    document.getElementById('editLocation').value = location ?? '';
    document.getElementById('formEdit').action    = `/devices/${id}`;
    document.getElementById('modalEdit').classList.remove('hidden');
}
</script>

@endsection
