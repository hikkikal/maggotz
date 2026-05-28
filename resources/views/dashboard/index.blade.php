@extends('layouts.app')
@section('title', 'Dashboard Utama')
@section('content')

<div class="relative z-10 w-full font-sans select-none space-y-4 md:space-y-6">

    <!-- Header -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_30px_-10px_rgba(13,59,22,0.08)] border border-white/50 relative overflow-hidden transition-all duration-300">
        <div class="absolute top-0 left-0 right-0 h-[4px] bg-gradient-to-r from-[#0D3B16] via-[#737F35] to-[#233E47]"></div>
        <div class="px-4 md:px-6 py-5 md:py-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4 md:gap-5">
                <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[#0D3B16]/10 flex items-center justify-center text-[#0D3B16] shrink-0 group transition-all duration-300 hover:bg-[#0D3B16] hover:text-white">
                    <i class="fa-solid fa-chart-simple text-lg md:text-xl"></i>
                </div>
                <div>
                    <h1 class="text-lg md:text-2xl font-extrabold text-[#0D3B16] tracking-wide uppercase">Dashboard Utama</h1>
                    <p class="text-[11px] md:text-xs text-gray-400 font-medium mt-0.5">
                        Real-time monitoring sistem budidaya Smart Maggot &middot; {{ now()->format('d M Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Parameter Cards -->
    @php
        $suhu   = $latestReading?->temperature ?? null;
        $lembab = $latestReading?->humidity    ?? null;
        $status = $latestReading?->status      ?? null;

        // Badge suhu
        $suhuBadge = match($status) {
            'IDEAL'  => ['label' => 'IDEAL',  'cls' => 'bg-[#EAD39D] text-[#0A2012]'],
            'BAHAYA' => ['label' => 'BAHAYA', 'cls' => 'bg-red-400 text-white'],
            'DINGIN' => ['label' => 'DINGIN', 'cls' => 'bg-blue-300 text-white'],
            'KERING' => ['label' => 'KERING', 'cls' => 'bg-yellow-300 text-[#0A2012]'],
            default  => ['label' => 'N/A',    'cls' => 'bg-white/30 text-white'],
        };

        // Berat biomassa terbaru dari maggot records
        $beratMaggot = $latestRecord?->berat_biomassa ?? null;
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3 md:gap-4">

        {{-- Suhu --}}
        <div class="bg-[#0D3B16] text-white rounded-2xl p-4 md:p-5 shadow-[0_12px_24px_-8px_rgba(13,59,22,0.25)] border border-white/10 hover:shadow-[0_20px_35px_-6px_rgba(13,59,22,0.4)] transition-all duration-300 group hover:-translate-y-1.5">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-[10px] font-semibold text-white/70 uppercase tracking-widest">Suhu Kandang</h2>
                    <p class="text-2xl md:text-3xl font-black mt-1.5 tracking-tight group-hover:text-[#EAD39D] transition-colors">
                        {{ $suhu !== null ? $suhu.'°C' : '—' }}
                    </p>
                </div>
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-xl bg-white/10 flex items-center justify-center group-hover:bg-[#EAD39D] group-hover:text-[#0A2012] transition-all duration-300">
                    <i class="fa-solid fa-temperature-three-quarters text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[9px] font-bold {{ $suhuBadge['cls'] }}">
                    {{ $suhuBadge['label'] }}
                </span>
                <span class="text-[10px] text-white/60">
                    {{ $latestReading?->recorded_at?->format('H:i') ?? 'Belum ada data' }}
                </span>
            </div>
        </div>

        {{-- Kelembaban --}}
        @php
            $lembabBadge = $lembab !== null
                ? ($lembab >= 70 ? ['label'=>'AGAK TINGGI','cls'=>'bg-amber-500 text-white'] : ($lembab >= 60 ? ['label'=>'IDEAL','cls'=>'bg-[#EAD39D] text-[#0A2012]'] : ['label'=>'RENDAH','cls'=>'bg-blue-300 text-white']))
                : ['label'=>'N/A','cls'=>'bg-white/30 text-white'];
        @endphp
        <div class="bg-[#233E47] text-white rounded-2xl p-4 md:p-5 shadow-[0_12px_24px_-8px_rgba(35,62,71,0.25)] border border-white/10 hover:shadow-[0_20px_35px_-6px_rgba(35,62,71,0.4)] transition-all duration-300 group hover:-translate-y-1.5">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-[10px] font-semibold text-white/70 uppercase tracking-widest">Kelembaban</h2>
                    <p class="text-2xl md:text-3xl font-black mt-1.5 tracking-tight group-hover:text-[#EAD39D] transition-colors">
                        {{ $lembab !== null ? $lembab.'%' : '—' }}
                    </p>
                </div>
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-xl bg-white/10 flex items-center justify-center group-hover:bg-[#EAD39D] group-hover:text-[#0A2012] transition-all duration-300">
                    <i class="fa-solid fa-droplet text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[9px] font-bold {{ $lembabBadge['cls'] }}">
                    {{ $lembabBadge['label'] }}
                </span>
                <span class="text-[10px] text-white/60">kelembaban uap air</span>
            </div>
        </div>

        {{-- Berat Maggot (biomassa terbaru dari maggot records) --}}
        <div class="bg-[#737F35] text-white rounded-2xl p-4 md:p-5 shadow-[0_12px_24px_-8px_rgba(115,127,53,0.25)] border border-white/10 hover:shadow-[0_20px_35px_-6px_rgba(115,127,53,0.4)] transition-all duration-300 group hover:-translate-y-1.5">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-[10px] font-semibold text-white/70 uppercase tracking-widest">Berat Maggot</h2>
                    <p class="text-2xl md:text-3xl font-black mt-1.5 tracking-tight group-hover:text-[#EAD39D] transition-colors">
                        @if($beratMaggot !== null)
                            {{ $beratMaggot }} <span class="text-sm font-bold">kg</span>
                        @else
                            —
                        @endif
                    </p>
                </div>
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-xl bg-white/10 flex items-center justify-center group-hover:bg-[#EAD39D] group-hover:text-[#0A2012] transition-all duration-300">
                    <i class="fa-solid fa-bug text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-1 text-white/80">
                <span class="text-[10px] text-white/60">
                    {{ $latestRecord?->tanggal?->format('d M Y') ?? 'Belum ada data' }}
                </span>
            </div>
        </div>

        {{-- Total Panen bulan berjalan --}}
        <div class="bg-[#52110F] text-white rounded-2xl p-4 md:p-5 shadow-[0_12px_24px_-8px_rgba(82,17,15,0.25)] border border-white/10 hover:shadow-[0_20px_35px_-6px_rgba(82,17,15,0.4)] transition-all duration-300 group hover:-translate-y-1.5">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-[10px] font-semibold text-white/70 uppercase tracking-widest">Total Panen</h2>
                    <p class="text-2xl md:text-3xl font-black mt-1.5 tracking-tight group-hover:text-[#EAD39D] transition-colors">
                        {{ $totalPanen > 0 ? $totalPanen.' kg' : '—' }}
                    </p>
                </div>
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-xl bg-white/10 flex items-center justify-center group-hover:bg-[#EAD39D] group-hover:text-[#0A2012] transition-all duration-300">
                    <i class="fa-solid fa-basket-shopping text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-[10px] text-white/60">Akumulasi {{ now()->translatedFormat('F Y') }}</span>
            </div>
        </div>

    </div>

    <!-- Chart & Notifikasi -->
    @php
        $chartLabels = $chartData->map(fn($r) => $r->recorded_at->format('H:i'))->toJson();
        $chartSuhu   = $chartData->map(fn($r) => $r->temperature)->toJson();
        $chartLembab = $chartData->map(fn($r) => $r->humidity)->toJson();
    @endphp

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-5">

        <!-- Grafik -->
        <div class="lg:col-span-2 bg-white/60 backdrop-blur-md rounded-2xl p-4 md:p-6 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] border border-white/50">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4 md:mb-6">
                <div>
                    <h2 class="font-bold text-gray-800 text-sm">Grafik Ringkasan Parameter</h2>
                    <p class="text-xs text-gray-400 mt-0.5">Pergerakan sensor IoT 24 jam terakhir</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 text-[10px] font-bold text-gray-600 px-2.5 py-1 bg-white/90 rounded-md border border-gray-100 shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-[#0D3B16]"></span> Suhu
                    </span>
                    <span class="inline-flex items-center gap-1.5 text-[10px] font-bold text-gray-600 px-2.5 py-1 bg-white/90 rounded-md border border-gray-100 shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-[#233E47]"></span> Kelembaban
                    </span>
                </div>
            </div>
            <div class="relative w-full h-[240px] md:h-[280px]">
                @if($chartData->isEmpty())
                <div class="absolute inset-0 flex items-center justify-center text-xs text-gray-400">
                    <div class="text-center">
                        <i class="fa-solid fa-chart-line text-2xl mb-2 block text-gray-300"></i>
                        Belum ada data sensor
                    </div>
                </div>
                @endif
                <canvas id="chart"></canvas>
            </div>
        </div>

        <!-- Log Notifikasi -->
        <div class="bg-white/60 backdrop-blur-md rounded-2xl p-4 md:p-6 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] border border-white/50 flex flex-col justify-between">
            <div>
                <div class="mb-4">
                    <h2 class="font-bold text-gray-800 text-sm">Status Terkini</h2>
                    <p class="text-xs text-gray-400 mt-0.5">Kondisi kandang saat ini</p>
                </div>

                <div class="space-y-2.5 max-h-[250px] overflow-y-auto pr-1">
                    @if($latestReading)
                    @php
                        $notifCls = match($latestReading->status) {
                            'IDEAL'  => ['bg'=>'bg-green-50 border-green-100',  'icon'=>'bg-green-600',  'fa'=>'fa-check',                'title'=>'Kondisi Ideal',         'msg'=>'Suhu '.$latestReading->temperature.'°C, kelembaban '.$latestReading->humidity.'%. Kondisi optimal untuk maggot.'],
                            'BAHAYA' => ['bg'=>'bg-red-50 border-red-100',      'icon'=>'bg-red-500',    'fa'=>'fa-triangle-exclamation',  'title'=>'BAHAYA! Suhu Tinggi',   'msg'=>'Suhu '.$latestReading->temperature.'°C melebihi batas aman. Segera tangani!'],
                            'DINGIN' => ['bg'=>'bg-blue-50 border-blue-100',    'icon'=>'bg-blue-500',   'fa'=>'fa-snowflake',             'title'=>'Suhu Terlalu Dingin',   'msg'=>'Suhu '.$latestReading->temperature.'°C terlalu rendah. Pertumbuhan terhambat.'],
                            'KERING' => ['bg'=>'bg-yellow-50 border-yellow-100','icon'=>'bg-yellow-500', 'fa'=>'fa-sun',                   'title'=>'Kelembaban Kurang',      'msg'=>'Kelembaban '.$latestReading->humidity.'% terlalu rendah. Perlu penyiraman.'],
                            default  => ['bg'=>'bg-gray-50 border-gray-100',    'icon'=>'bg-gray-400',   'fa'=>'fa-circle-question',       'title'=>'Status Tidak Diketahui','msg'=>'Tidak dapat membaca status sensor.'],
                        };
                    @endphp
                    <div class="flex items-start gap-3 p-3 rounded-xl {{ $notifCls['bg'] }} border hover:translate-x-1 transition-all duration-200">
                        <div class="w-6 h-6 rounded-lg {{ $notifCls['icon'] }} text-white flex items-center justify-center shrink-0 mt-0.5 text-[10px]">
                            <i class="fa-solid {{ $notifCls['fa'] }}"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-800">{{ $notifCls['title'] }}</p>
                            <p class="text-[10px] text-gray-600 mt-0.5">{{ $notifCls['msg'] }}</p>
                            <p class="text-[9px] text-gray-400 mt-1">{{ $latestReading->recorded_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>
                    @else
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-gray-50 border border-gray-100">
                        <div class="w-6 h-6 rounded-lg bg-gray-300 text-white flex items-center justify-center shrink-0 mt-0.5 text-[10px]">
                            <i class="fa-solid fa-circle-question"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-600">Belum Ada Data</p>
                            <p class="text-[10px] text-gray-400 mt-0.5">Sensor belum mengirim data. Pastikan ESP32 menyala.</p>
                        </div>
                    </div>
                    @endif

                    @if($latestRecord)
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-[#737F35]/10 border border-[#737F35]/20 hover:translate-x-1 transition-all duration-200">
                        <div class="w-6 h-6 rounded-lg bg-[#737F35] text-white flex items-center justify-center shrink-0 mt-0.5 text-[10px]">
                            <i class="fa-solid fa-bug"></i>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-gray-800">Data Maggot Terbaru</p>
                            <p class="text-[10px] text-gray-600 mt-0.5">
                                Biomassa {{ $latestRecord->berat_biomassa }} kg
                                @if($latestRecord->hasil_panen) · Panen {{ $latestRecord->hasil_panen }} kg @endif
                            </p>
                            <p class="text-[9px] text-gray-400 mt-1">{{ $latestRecord->tanggal->format('d M Y') }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <a href="{{ route('monitoring.list') }}"
               class="w-full mt-4 py-2.5 text-center text-xs font-bold text-[#0D3B16] bg-[#0D3B16]/5 hover:bg-[#0D3B16] hover:text-white rounded-xl transition-all duration-200 block">
                Buka Monitoring
            </a>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const labels = {!! $chartLabels !!};
const suhuData   = {!! $chartSuhu !!};
const lembabData = {!! $chartLembab !!};

new Chart(document.getElementById('chart'), {
    type: 'line',
    data: {
        labels,
        datasets: [
            {
                label: 'Suhu (°C)', data: suhuData,
                borderColor: '#0D3B16', backgroundColor: 'rgba(13,59,22,0.04)',
                tension: 0.38, fill: true, borderWidth: 2.5,
                pointBackgroundColor: '#0D3B16', pointBorderColor: '#fff',
                pointBorderWidth: 1.5, pointRadius: 3, pointHoverRadius: 5
            },
            {
                label: 'Kelembaban (%)', data: lembabData,
                borderColor: '#233E47', backgroundColor: 'rgba(35,62,71,0.04)',
                tension: 0.38, fill: true, borderWidth: 2.5,
                pointBackgroundColor: '#233E47', pointBorderColor: '#fff',
                pointBorderWidth: 1.5, pointRadius: 3, pointHoverRadius: 5
            }
        ]
    },
    options: {
        responsive: true, maintainAspectRatio: false,
        interaction: { mode: 'index', intersect: false },
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: 'rgba(35,62,71,0.95)',
                titleFont: { size: 12, weight: 'bold' },
                bodyFont: { size: 11 },
                padding: 10, cornerRadius: 10, usePointStyle: true
            }
        },
        scales: {
            y: { grid: { color: 'rgba(0,0,0,0.03)' }, ticks: { font: { size: 10 }, color: '#a1a1aa' } },
            x: { grid: { display: false }, ticks: { font: { size: 10 }, color: '#a1a1aa', maxTicksLimit: 8 } }
        }
    }
});
</script>

@endsection
