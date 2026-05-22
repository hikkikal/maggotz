@extends('layouts.app')

@section('title', 'Dashboard Utama')

@section('content')

<div class="relative z-10 w-full font-sans select-none space-y-4 md:space-y-6">

    <!-- Header Dashboard -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_30px_-10px_rgba(13,59,22,0.08)] border border-white/50 relative overflow-hidden transition-all duration-300">
        <div class="absolute top-0 left-0 right-0 h-[4px] bg-gradient-to-r from-[#0D3B16] via-[#737F35] to-[#233E47]"></div>
        
        <div class="px-4 md:px-6 py-5 md:py-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4 md:gap-5">
                <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[#0D3B16]/10 flex items-center justify-center text-[#0D3B16] shrink-0 shadow-inner group transition-all duration-300 hover:bg-[#0D3B16] hover:text-white">
                    <i class="fa-solid fa-chart-simple text-lg md:text-xl transition-transform duration-300 group-hover:scale-110"></i>
                </div>
                <div>
                    <h1 class="text-lg md:text-2xl font-extrabold text-[#0D3B16] tracking-wide uppercase">
                        Dashboard Utama
                    </h1>
                    <p class="text-[11px] md:text-xs text-gray-400 font-medium mt-0.5 md:mt-1">
                        Real-time monitoring sistem budidaya Smart Maggot
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid Parameter Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3 md:gap-4">

        <div class="bg-[#0D3B16] text-white rounded-2xl p-4 md:p-5 shadow-[0_12px_24px_-8px_rgba(13,59,22,0.25)] border border-white/10 hover:shadow-[0_20px_35px_-6px_rgba(13,59,22,0.4)] transition-all duration-300 group cursor-pointer hover:-translate-y-1.5 active:scale-[0.98]">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-[10px] font-semibold text-white/70 uppercase tracking-widest">Suhu Kandang</h2>
                    <p class="text-2xl md:text-3xl font-black mt-1.5 tracking-tight transition-all duration-300 group-hover:text-[#EAD39D]">29°C</p>
                </div>
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-xl bg-white/10 text-white flex items-center justify-center transition-all duration-300 group-hover:bg-[#EAD39D] group-hover:text-[#0A2012] shadow-sm group-hover:rotate-12">
                    <i class="fa-solid fa-temperature-three-quarters text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[8px] md:text-[9px] font-bold bg-[#EAD39D] text-[#0A2012] transition-colors duration-300 group-hover:bg-white group-hover:text-[#0A2012]">
                    OPTIMAL
                </span>
                <span class="text-[10px] md:text-[11px] text-white/60 font-medium group-hover:text-white/90 transition-colors">Titik nyaman BSF</span>
            </div>
        </div>

        <div class="bg-[#233E47] text-white rounded-2xl p-4 md:p-5 shadow-[0_12px_24px_-8px_rgba(35,62,71,0.25)] border border-white/10 hover:shadow-[0_20px_35px_-6px_rgba(35,62,71,0.4)] transition-all duration-300 group cursor-pointer hover:-translate-y-1.5 active:scale-[0.98]">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-[10px] font-semibold text-white/70 uppercase tracking-widest">Kelembaban</h2>
                    <p class="text-2xl md:text-3xl font-black mt-1.5 tracking-tight transition-all duration-300 group-hover:text-[#EAD39D]">75%</p>
                </div>
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-xl bg-white/10 text-white flex items-center justify-center transition-all duration-300 group-hover:bg-[#EAD39D] group-hover:text-[#0A2012] shadow-sm group-hover:bounce">
                    <i class="fa-solid fa-droplet text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[8px] md:text-[9px] font-bold bg-amber-500 text-white">
                    AGAK TINGGI
                </span>
                <span class="text-[10px] md:text-[11px] text-white/60 font-medium group-hover:text-white/90 transition-colors">Buka ventilasi</span>
            </div>
        </div>

        <div class="bg-[#737F35] text-white rounded-2xl p-4 md:p-5 shadow-[0_12px_24px_-8px_rgba(115,127,53,0.25)] border border-white/10 hover:shadow-[0_20px_35px_-6px_rgba(115,127,53,0.4)] transition-all duration-300 group cursor-pointer hover:-translate-y-1.5 active:scale-[0.98]">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-[10px] font-semibold text-white/70 uppercase tracking-widest">Berat Maggot</h2>
                    <p class="text-2xl md:text-3xl font-black mt-1.5 tracking-tight transition-all duration-300 group-hover:text-[#EAD39D]">2.3 <span class="text-sm md:text-base font-bold">kg</span></p>
                </div>
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-xl bg-white/10 text-white flex items-center justify-center transition-all duration-300 group-hover:bg-[#EAD39D] group-hover:text-[#0A2012] shadow-sm group-hover:scale-110">
                    <i class="fa-solid fa-bug text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-1 text-white/80">
                <i class="fa-solid fa-arrow-trend-up text-[#EAD39D] text-[10px] md:text-xs mr-0.5 group-hover:translate-x-0.5 group-hover:-translate-y-0.5 transition-transform"></i>
                <span class="text-[10px] md:text-[11px] font-semibold text-[#EAD39D]">+12% <span class="text-white/60 font-normal group-hover:text-white/90 transition-colors">dari pekan lalu</span></span>
            </div>
        </div>

        <div class="bg-[#52110F] text-white rounded-2xl p-4 md:p-5 shadow-[0_12px_24px_-8px_rgba(82,17,15,0.25)] border border-white/10 hover:shadow-[0_20px_35px_-6px_rgba(82,17,15,0.4)] transition-all duration-300 group cursor-pointer hover:-translate-y-1.5 active:scale-[0.98]">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-[10px] font-semibold text-white/70 uppercase tracking-widest">Total Panen</h2>
                    <p class="text-2xl md:text-3xl font-black mt-1.5 tracking-tight transition-all duration-300 group-hover:text-[#EAD39D]">18 <span class="text-sm md:text-base font-bold">kg</span></p>
                </div>
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-xl bg-white/10 text-white flex items-center justify-center transition-all duration-300 group-hover:bg-[#EAD39D] group-hover:text-[#0A2012] shadow-sm group-hover:-translate-y-0.5">
                    <i class="fa-solid fa-basket-shopping text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-1">
                <span class="text-[10px] md:text-[11px] text-white/60 font-medium group-hover:text-white/90 transition-colors">Akumulasi bulan berjalan</span>
            </div>
        </div>

    </div>

    <!-- Chart & Notification Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-5">
        
        <!-- Grafik -->
        <div class="lg:col-span-2 bg-white/60 backdrop-blur-md rounded-2xl p-4 md:p-6 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] border border-white/50">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4 md:mb-6">
                <div>
                    <h2 class="font-bold text-gray-800 tracking-wide text-sm">Grafik Ringkasan Parameter</h2>
                    <p class="text-[11px] md:text-xs text-gray-400 mt-0.5">Metrik pergerakan sensor IoT dalam 24 jam terakhir</p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 text-[9px] md:text-[10px] font-bold text-gray-600 px-2.5 py-1 bg-white/90 rounded-md border border-gray-100 shadow-sm cursor-pointer hover:bg-gray-50 transition">
                        <span class="w-2 h-2 rounded-full bg-[#0D3B16]"></span> Suhu
                    </span>
                    <span class="inline-flex items-center gap-1.5 text-[9px] md:text-[10px] font-bold text-gray-600 px-2.5 py-1 bg-white/90 rounded-md border border-gray-100 shadow-sm cursor-pointer hover:bg-gray-50 transition">
                        <span class="w-2 h-2 rounded-full bg-[#233E47]"></span> Kelembaban
                    </span>
                </div>
            </div>
            <div class="relative w-full h-[240px] md:h-[280px]">
                <canvas id="chart"></canvas>
            </div>
        </div>

        <!-- Log Notifikasi -->
        <div class="bg-white/60 backdrop-blur-md rounded-2xl p-4 md:p-6 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] border border-white/50 flex flex-col justify-between">
            <div>
                <div class="mb-4">
                    <h2 class="font-bold text-gray-800 tracking-wide text-sm">Log Notifikasi</h2>
                    <p class="text-[11px] md:text-xs text-gray-400 mt-0.5">Pemberitahuan real-time dari kandang</p>
                </div>

                <div class="space-y-2.5 max-h-[200px] md:max-h-[250px] overflow-y-auto pr-1 no-scrollbar">
                    <div class="flex items-start gap-3 p-3 rounded-xl bg-green-50/60 backdrop-blur-sm border border-green-100/50 hover:bg-green-100/70 hover:translate-x-1 transition-all duration-200 cursor-pointer group">
                        <div class="w-6 h-6 rounded-lg bg-green-600 text-white flex items-center justify-center shrink-0 mt-0.5 text-[10px] transition-transform duration-300 group-hover:scale-110">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div>
                            <p class="text-[11px] md:text-xs font-bold text-green-900">Suhu Stabil</p>
                            <p class="text-[9px] md:text-[10px] text-green-700/90 mt-0.5">Kondisi ruangan maggot terkendali optimal pada 29°C.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-3 rounded-xl bg-amber-50/60 backdrop-blur-sm border border-amber-100/50 hover:bg-amber-100/70 hover:translate-x-1 transition-all duration-200 cursor-pointer group">
                        <div class="w-6 h-6 rounded-lg bg-amber-500 text-white flex items-center justify-center shrink-0 mt-0.5 text-[10px] transition-transform duration-300 group-hover:scale-110">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                        <div>
                            <p class="text-[11px] md:text-xs font-bold text-amber-900">Kelembaban Meningkat</p>
                            <p class="text-[9px] md:text-[10px] text-amber-700/90 mt-0.5">Sensor mendeteksi 75%. Sirkulasi udara diperlukan.</p>
                        </div>
                    </div>
                </div>
            </div>

            <button class="w-full mt-4 py-2.5 text-center text-[11px] md:text-xs font-bold text-[#0D3B16] bg-[#0D3B16]/5 hover:bg-[#0D3B16] hover:text-white active:scale-[0.97] rounded-xl transition-all duration-200 shadow-sm">
                Buka Semua Riwayat
            </button>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['08:00', '10:00', '12:00', '14:00', '16:00'],
        datasets: [
            {
                label: 'Suhu (°C)',
                data: [28, 29, 30, 29, 28],
                borderColor: '#0D3B16',
                backgroundColor: 'rgba(13, 59, 22, 0.04)',
                tension: 0.38,
                fill: true,
                borderWidth: 2.5,
                pointBackgroundColor: '#0D3B16',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 1.5,
                pointHoverBackgroundColor: '#EAD39D',
                pointHoverBorderColor: '#0D3B16',
                pointHoverBorderWidth: 2,
                pointRadius: 3, // Diperkecil sedikit untuk mobile
                pointHoverRadius: 5
            },
            {
                label: 'Kelembaban (%)',
                data: [70, 75, 80, 78, 76],
                borderColor: '#233E47',
                backgroundColor: 'rgba(35, 62, 71, 0.04)',
                tension: 0.38,
                fill: true,
                borderWidth: 2.5,
                pointBackgroundColor: '#233E47',
                pointBorderColor: '#ffffff',
                pointBorderWidth: 1.5,
                pointHoverBackgroundColor: '#EAD39D',
                pointHoverBorderColor: '#233E47',
                pointHoverBorderWidth: 2,
                pointRadius: 3, // Diperkecil sedikit untuk mobile
                pointHoverRadius: 5
            }
        ]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        interaction: {
            mode: 'index',
            intersect: false,
        },
        plugins: {
            legend: { display: false },
            tooltip: {
                backgroundColor: 'rgba(35, 62, 71, 0.95)',
                titleFont: { size: 12, weight: 'bold', family: 'sans-serif' },
                bodyFont: { size: 11, family: 'sans-serif' },
                padding: 10,
                cornerRadius: 10,
                boxWidth: 8,
                boxHeight: 8,
                usePointStyle: true,
                borderColor: 'rgba(255, 255, 255, 0.1)',
                borderWidth: 1
            }
        },
        scales: {
            y: {
                grid: { color: 'rgba(0, 0, 0, 0.03)' },
                ticks: { font: { size: 10, weight: '500' }, color: '#a1a1aa' }
            },
            x: {
                grid: { display: false },
                ticks: { font: { size: 10, weight: '500' }, color: '#a1a1aa' }
            }
        }
    }
});
</script>

@endsection