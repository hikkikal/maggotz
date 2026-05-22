@extends('layouts.app')

@section('title', 'Monitoring Data')

@section('content')

<div class="relative z-10 w-full font-sans select-none space-y-4 md:space-y-6">

    <!-- Header Section -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_30px_-10px_rgba(13,59,22,0.08)] border border-white/50 relative overflow-hidden transition-all duration-300">
        <div class="absolute top-0 left-0 right-0 h-[4px] bg-gradient-to-r from-[#0D3B16] via-[#737F35] to-[#233E47]"></div>
        
        <div class="px-4 md:px-6 py-5 md:py-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4 md:gap-5">
                <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[#0D3B16] text-white flex items-center justify-center shrink-0 shadow-md group transition-all duration-300">
                    <i class="fa-solid fa-chart-line text-lg md:text-xl transition-transform duration-300 group-hover:scale-110"></i>
                </div>
                <div>
                    <h1 class="text-lg md:text-2xl font-extrabold text-[#0D3B16] tracking-wide uppercase">
                        Monitoring Data
                    </h1>
                    <p class="text-[11px] md:text-xs text-gray-400 font-medium mt-0.5 md:mt-1">
                        Riwayat log parameter sensor IoT berkala
                    </p>
                </div>
            </div>
            
            <div class="relative flex items-center w-full sm:w-auto self-start sm:self-auto group cursor-pointer rounded-xl border border-[#737F35]/30 bg-white hover:bg-gray-50/80 hover:border-[#0D3B16]/50 active:scale-[0.98] transition-all duration-200 shadow-sm focus-within:ring-2 focus-within:ring-[#0D3B16] focus-within:border-transparent">
                <span class="absolute left-4 text-[#0D3B16] text-sm pointer-events-none z-10 transition-transform duration-200 group-hover:scale-110">
                    <i class="fa-solid fa-calendar-days"></i>
                </span>
                <input 
                    type="date" 
                    id="filterTanggal"
                    name="tanggal"
                    value="2026-05-22"
                    class="w-full sm:w-auto appearance-none pl-10 pr-5 py-2 md:py-2.5 bg-transparent text-[11px] md:text-xs font-bold text-[#0D3B16] cursor-pointer tracking-wider text-center uppercase focus:outline-none [&::-webkit-calendar-picker-indicator]:absolute [&::-webkit-calendar-picker-indicator]:inset-0 [&::-webkit-calendar-picker-indicator]:w-full [&::-webkit-calendar-picker-indicator]:h-full [&::-webkit-calendar-picker-indicator]:opacity-0"
                />
            </div>
        </div>
    </div>

    <!-- Parameter Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4">
        <div class="bg-[#0D3B16] text-white rounded-2xl p-4 md:p-5 shadow-[0_12px_24px_-8px_rgba(13,59,22,0.25)] border border-white/10 hover:shadow-[0_18px_32px_-6px_rgba(13,59,22,0.35)] transition-all duration-300 group cursor-pointer hover:-translate-y-1 active:scale-[0.99]">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-[10px] font-semibold text-white/70 uppercase tracking-widest">Suhu Terbaru</h2>
                    <p class="text-2xl md:text-3xl font-black mt-1.5 tracking-tight transition-all duration-300 group-hover:text-[#EAD39D]">29°C</p>
                </div>
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-xl bg-white/10 text-white flex items-center justify-center transition-all duration-300 group-hover:bg-[#EAD39D] group-hover:text-[#0A2012] shadow-sm group-hover:rotate-12">
                    <i class="fa-solid fa-temperature-three-quarters text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[8px] md:text-[9px] font-bold bg-[#EAD39D] text-[#0A2012] transition-colors duration-300 group-hover:bg-white">
                    OPTIMAL
                </span>
                <span class="text-[10px] md:text-[11px] text-white/60 font-medium group-hover:text-white/90 transition-colors">Kondisi titik nyaman ruang</span>
            </div>
        </div>

        <div class="bg-[#233E47] text-white rounded-2xl p-4 md:p-5 shadow-[0_12px_24px_-8px_rgba(35,62,71,0.25)] border border-white/10 hover:shadow-[0_18px_32px_-6px_rgba(35,62,71,0.35)] transition-all duration-300 group cursor-pointer hover:-translate-y-1 active:scale-[0.99]">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-[10px] font-semibold text-white/70 uppercase tracking-widest">Kelembaban Terbaru</h2>
                    <p class="text-2xl md:text-3xl font-black mt-1.5 tracking-tight transition-all duration-300 group-hover:text-[#EAD39D]">74%</p>
                </div>
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-xl bg-white/10 text-white flex items-center justify-center transition-all duration-300 group-hover:bg-[#EAD39D] group-hover:text-[#0A2012] shadow-sm group-hover:animate-bounce">
                    <i class="fa-solid fa-droplet text-sm md:text-base"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center gap-2">
                <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[8px] md:text-[9px] font-bold bg-[#737F35] text-white">
                    NORMAL
                </span>
                <span class="text-[10px] md:text-[11px] text-white/60 font-medium group-hover:text-white/90 transition-colors">Kapasitas uap air stabil</span>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">
        <div class="bg-white/60 backdrop-blur-md rounded-2xl p-4 md:p-6 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] border border-white/50">
            <div class="flex items-center justify-between gap-3 mb-4 md:mb-6">
                <div>
                    <h2 class="font-bold text-gray-800 tracking-wide text-sm">Grafik Pergerakan Suhu</h2>
                    <p class="text-[11px] md:text-xs text-gray-400 mt-0.5">Parameter kenyamanan ruangan (°C)</p>
                </div>
                <span class="inline-flex items-center gap-1.5 text-[9px] md:text-[10px] font-bold text-gray-600 px-2 md:px-2.5 py-1 bg-white/90 rounded-md border border-gray-100 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-[#0D3B16]"></span> Suhu
                </span>
            </div>
            <div class="relative w-full h-[200px] md:h-[240px]">
                <canvas id="chartSuhu"></canvas>
            </div>
        </div>

        <div class="bg-white/60 backdrop-blur-md rounded-2xl p-4 md:p-6 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] border border-white/50">
            <div class="flex items-center justify-between gap-3 mb-4 md:mb-6">
                <div>
                    <h2 class="font-bold text-gray-800 tracking-wide text-sm">Grafik Tingkat Kelembaban</h2>
                    <p class="text-[11px] md:text-xs text-gray-400 mt-0.5">Persentase uap air udara kandang (%)</p>
                </div>
                <span class="inline-flex items-center gap-1.5 text-[9px] md:text-[10px] font-bold text-gray-600 px-2 md:px-2.5 py-1 bg-white/90 rounded-md border border-gray-100 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-[#233E47]"></span> Kelembaban
                </span>
            </div>
            <div class="relative w-full h-[200px] md:h-[240px]">
                <canvas id="chartKelembaban"></canvas>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white/60 backdrop-blur-md rounded-2xl shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] border border-white/50 overflow-hidden">
        
        <div class="px-4 md:px-6 py-4 md:py-5 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="font-bold text-gray-800 tracking-wide text-sm">Tabel Log Parameter</h2>
                <p class="text-[11px] md:text-xs text-gray-400 mt-0.5">Detail data tabular hasil perekaman sensor IoT</p>
            </div>
            <div class="relative w-full sm:w-64">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-[#0D3B16] text-xs">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input 
                    type="text" 
                    id="searchTable" 
                    placeholder="Cari waktu atau status..." 
                    class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-gray-200/80 bg-white/80 focus:outline-none focus:ring-2 focus:ring-[#0D3B16] focus:border-transparent transition-all placeholder:text-gray-400 font-medium text-gray-700"
                />
            </div>
        </div>

        <div class="overflow-x-auto w-full">
            <table class="w-full text-left border-collapse whitespace-nowrap" id="logTable">
                <thead>
                    <tr class="bg-[#0D3B16] text-[10px] md:text-[11px] font-bold text-white uppercase tracking-wider">
                        <th class="px-4 md:px-6 py-3 md:py-3.5 font-bold rounded-tl-none md:rounded-tl-2xl">Waktu</th>
                        <th class="px-4 md:px-6 py-3 md:py-3.5 font-bold">Suhu Kandang</th>
                        <th class="px-4 md:px-6 py-3 md:py-3.5 font-bold">Kelembaban</th>
                        <th class="px-4 md:px-6 py-3 md:py-3.5 font-bold rounded-tr-none md:rounded-tr-2xl">Status Ruangan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100/60 text-[11px] md:text-xs text-gray-600 font-medium">
                    
                    <tr class="hover:bg-gray-50/50 transition-colors duration-150">
                        <td class="px-4 md:px-6 py-3 md:py-4 text-gray-700 font-mono flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-gray-400 shrink-0"></span>
                            03:00
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-[#0D3B16] font-bold text-xs md:text-sm">38°C</td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-[#233E47] font-bold text-xs md:text-sm">70%</td>
                        <td class="px-4 md:px-6 py-3 md:py-4">
                            <span class="inline-flex items-center px-2 md:px-2.5 py-1 rounded-md text-[8px] md:text-[9px] font-extrabold bg-gray-800 text-white uppercase tracking-wide shadow-sm">
                                Terlalu Panas
                            </span>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 border-l-4 border-[#737F35] transition-colors duration-150">
                        <td class="px-4 md:px-6 py-3 md:py-4 text-gray-700 font-mono flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#737F35] shrink-0"></span>
                            12:00
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-[#0D3B16] font-bold text-xs md:text-sm">30°C</td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-[#233E47] font-bold text-xs md:text-sm">78%</td>
                        <td class="px-4 md:px-6 py-3 md:py-4">
                            <span class="inline-flex items-center px-2 md:px-2.5 py-1 rounded-md text-[8px] md:text-[9px] font-extrabold bg-[#EAD39D] text-[#0A2012] uppercase tracking-wide shadow-sm">
                                Optimal
                            </span>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50/50 border-l-4 border-[#737F35] transition-colors duration-150">
                        <td class="px-4 md:px-6 py-3 md:py-4 text-gray-700 font-mono flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#737F35] shrink-0"></span>
                            16:00
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-[#0D3B16] font-bold text-xs md:text-sm">29°C</td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-[#233E47] font-bold text-xs md:text-sm">74%</td>
                        <td class="px-4 md:px-6 py-3 md:py-4">
                            <span class="inline-flex items-center px-2 md:px-2.5 py-1 rounded-md text-[8px] md:text-[9px] font-extrabold bg-[#EAD39D] text-[#0A2012] uppercase tracking-wide shadow-sm">
                                Optimal
                            </span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        
        <div id="emptyState" class="hidden p-6 md:p-8 text-center text-xs font-medium text-[#233E47]">
            <i class="fa-solid fa-folder-open text-xl md:text-2xl mb-2 block text-gray-300"></i>
            Tidak ada data log yang cocok dengan pencarian.
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const labels = ['03:00', '12:00', '16:00'];

const baseChartOptions = {
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
};

// CHART SUHU
new Chart(document.getElementById('chartSuhu'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Suhu (°C)',
            data: [38, 30, 29],
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
        }]
    },
    options: baseChartOptions
});

// CHART KELEMBABAN
new Chart(document.getElementById('chartKelembaban'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Kelembaban (%)',
            data: [70, 78, 74],
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
        }]
    },
    options: baseChartOptions
});

// TABEL SEARCH FILTERING
document.getElementById('searchTable').addEventListener('input', function(e) {
    const query = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('#logTable tbody tr');
    let hasResults = false;

    rows.forEach(row => {
        const rowText = row.textContent.toLowerCase();
        if (rowText.includes(query)) {
            row.style.display = '';
            hasResults = true;
        } else {
            row.style.display = 'none';
        }
    });

    const emptyState = document.getElementById('emptyState');
    if (hasResults) {
        emptyState.classList.add('hidden');
    } else {
        emptyState.classList.remove('hidden');
    }
});

// DATE CHANGER INTERACTION
document.getElementById('filterTanggal').addEventListener('change', function(e) {
    console.log("Filter tanggal diperbarui ke: " + e.target.value);
});
</script>

@endsection