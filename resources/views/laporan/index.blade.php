@extends('layouts.app')
@section('title', 'Laporan')
@section('content')

<div class="relative z-10 w-full font-sans select-none space-y-4 md:space-y-6">

    <!-- Header -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_30px_-10px_rgba(13,59,22,0.08)] border border-white/50 relative overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-[4px] bg-[#0D3B16]"></div>
        <div class="px-4 md:px-6 py-4 md:py-6 flex items-center gap-4 md:gap-5">
            <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[#0D3B16]/10 flex items-center justify-center text-[#0D3B16] shrink-0">
                <i class="fa-solid fa-chart-simple text-lg md:text-xl"></i>
            </div>
            <div>
                <h1 class="text-lg md:text-2xl font-extrabold text-[#0D3B16] tracking-wide uppercase">Laporan</h1>
                <p class="text-[10px] md:text-xs text-gray-400 font-medium mt-0.5">
                    Statistik volume sampah masuk, total produksi, dan efisiensi biokonversi maggot
                </p>
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-6">
        <div class="rounded-2xl shadow-[0_10px_25px_-5px_rgba(82,17,15,0.15)] text-white p-4 md:p-6 bg-[#52110F]">
            <div class="flex items-center justify-between">
                <span class="text-[10px] md:text-xs uppercase tracking-wider font-bold opacity-90">Total Sampah Masuk</span>
                <div class="w-7 h-7 md:w-8 md:h-8 rounded-lg bg-white/20 flex items-center justify-center">
                    <i class="fa fa-trash text-xs md:text-sm"></i>
                </div>
            </div>
            <h2 class="text-2xl md:text-3xl font-black mt-3 md:mt-4 font-mono">
                {{ number_format($totalSampah, 1) }} <span class="text-base font-bold">kg</span>
            </h2>
            <p class="text-[10px] text-white/60 mt-1">Keseluruhan data tercatat</p>
        </div>

        <div class="rounded-2xl shadow-[0_10px_25px_-5px_rgba(115,127,53,0.15)] text-white p-4 md:p-6 bg-[#737F35]">
            <div class="flex items-center justify-between">
                <span class="text-[10px] md:text-xs uppercase tracking-wider font-bold opacity-90">Total Produksi</span>
                <div class="w-7 h-7 md:w-8 md:h-8 rounded-lg bg-white/20 flex items-center justify-center">
                    <i class="fa fa-seedling text-xs md:text-sm"></i>
                </div>
            </div>
            <h2 class="text-2xl md:text-3xl font-black mt-3 md:mt-4 font-mono">
                {{ number_format($totalProduksi, 1) }} <span class="text-base font-bold">kg</span>
            </h2>
            <p class="text-[10px] text-white/60 mt-1">Total hasil panen tercatat</p>
        </div>

        <div class="rounded-2xl shadow-[0_10px_25px_-5px_rgba(13,59,22,0.15)] text-white p-4 md:p-6 bg-[#0D3B16]">
            <div class="flex items-center justify-between">
                <span class="text-[10px] md:text-xs uppercase tracking-wider font-bold opacity-90">Tingkat Efisiensi</span>
                <div class="w-7 h-7 md:w-8 md:h-8 rounded-lg bg-white/20 flex items-center justify-center">
                    <i class="fa fa-chart-line text-xs md:text-sm"></i>
                </div>
            </div>
            <h2 class="text-2xl md:text-3xl font-black mt-3 md:mt-4 font-mono">
                {{ $efisiensi }}<span class="text-base font-bold">%</span>
            </h2>
            <p class="text-[10px] text-white/60 mt-1">Rasio produksi / sampah masuk</p>
        </div>
    </div>

    <!-- Chart -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_35px_-10px_rgba(0,0,0,0.05)] border border-white/60 p-4 md:p-6">
        <div class="flex items-center gap-2 mb-3 md:mb-4 border-b border-gray-100 pb-2 md:pb-3">
            <span class="w-2.5 h-2.5 rounded-full bg-[#0D3B16]"></span>
            <h2 class="font-extrabold text-xs md:text-sm text-[#0D3B16] uppercase tracking-wider">
                Grafik Komparasi Sampah & Produksi (7 Hari Terakhir)
            </h2>
        </div>

        @if($chartRecords->isEmpty())
        <div class="py-10 text-center text-xs text-gray-400">
            <i class="fa-solid fa-chart-bar text-2xl mb-2 block text-gray-300"></i>
            Belum ada data untuk ditampilkan
        </div>
        @else
        <div class="relative w-full">
            <canvas id="laporanChart"></canvas>
        </div>
        @endif
    </div>

    <!-- Tabel Riwayat -->
    <div class="bg-white/60 backdrop-blur-md rounded-2xl border border-white/50 overflow-hidden">
        <div class="px-4 md:px-6 py-4 border-b border-gray-100">
            <h2 class="font-bold text-gray-800 text-sm">Riwayat Semua Data</h2>
            <p class="text-xs text-gray-400 mt-0.5">Semua catatan biomassa dan panen</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-[#0D3B16] text-[11px] font-bold text-white uppercase tracking-wider">
                        <th class="px-4 md:px-6 py-3.5">Tanggal</th>
                        <th class="px-4 md:px-6 py-3.5">Sampah Masuk</th>
                        <th class="px-4 md:px-6 py-3.5">Berat Biomassa</th>
                        <th class="px-4 md:px-6 py-3.5">Hasil Panen</th>
                        <th class="px-4 md:px-6 py-3.5">Kandang</th>
                        <th class="px-4 md:px-6 py-3.5">Keterangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100/60 text-xs text-gray-600 font-medium">
                    @forelse($records as $r)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="px-4 md:px-6 py-3 font-bold text-gray-700">
                            <div class="flex items-center gap-2">
                                <i class="fa-regular fa-calendar text-[#737F35]"></i>
                                {{ $r->tanggal->format('d M Y') }}
                            </div>
                        </td>
                        <td class="px-4 md:px-6 py-3">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-xl text-xs font-black bg-orange-100 text-orange-700">
                                <i class="fa-solid fa-trash mr-1.5 text-[9px]"></i> {{ $r->sampah_masuk }} kg
                            </span>
                        </td>
                        <td class="px-4 md:px-6 py-3">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-xl text-xs font-black bg-[#737F35] text-white">
                                <i class="fa-solid fa-weight-scale mr-1.5 text-[9px]"></i> {{ $r->berat_biomassa }} kg
                            </span>
                        </td>
                        <td class="px-4 md:px-6 py-3">
                            @if($r->hasil_panen)
                            <span class="inline-flex items-center px-2.5 py-1 rounded-xl text-xs font-black bg-green-100 text-green-700">
                                <i class="fa-solid fa-seedling mr-1.5 text-[9px]"></i> {{ $r->hasil_panen }} kg
                            </span>
                            @else
                            <span class="text-gray-400">—</span>
                            @endif
                        </td>
                        <td class="px-4 md:px-6 py-3 text-gray-500">{{ $r->device?->name ?? '—' }}</td>
                        <td class="px-4 md:px-6 py-3 text-gray-500 max-w-[200px] truncate">{{ $r->keterangan ?? '—' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-xs text-gray-400">
                            <i class="fa-solid fa-folder-open text-2xl mb-2 block text-gray-300"></i>
                            Belum ada data laporan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
@if(!$chartRecords->isEmpty())
const labels  = {!! $chartRecords->map(fn($r) => $r->tanggal->format('d M'))->toJson() !!};
const sampah  = {!! $chartRecords->map(fn($r) => $r->sampah_masuk)->toJson() !!};
const panen   = {!! $chartRecords->map(fn($r) => $r->hasil_panen ?? 0)->toJson() !!};

const getAspectRatio = () => window.innerWidth < 768 ? 1.2 : 2.2;

const chart = new Chart(document.getElementById('laporanChart'), {
    type: 'bar',
    data: {
        labels,
        datasets: [
            {
                label: 'Sampah Masuk (kg)',
                data: sampah,
                backgroundColor: '#737F35',
                borderRadius: 6,
                borderSkipped: false,
                barPercentage: 0.7,
                categoryPercentage: 0.6
            },
            {
                label: 'Hasil Panen (kg)',
                data: panen,
                backgroundColor: '#0D3B16',
                borderRadius: 6,
                borderSkipped: false,
                barPercentage: 0.7,
                categoryPercentage: 0.6
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        aspectRatio: getAspectRatio(),
        plugins: {
            legend: {
                position: 'top',
                labels: { boxWidth: 10, boxHeight: 10, usePointStyle: true, pointStyle: 'circle', font: { size: 11, weight: '600' } }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: { color: 'rgba(13,59,22,0.05)' },
                ticks: { color: '#233E47', font: { size: 10, weight: '500' } }
            },
            x: {
                grid: { display: false },
                ticks: { color: '#233E47', font: { size: 11, weight: '600' } }
            }
        }
    }
});

window.addEventListener('resize', () => {
    chart.options.aspectRatio = getAspectRatio();
    chart.update();
});
@endif
</script>

@endsection
