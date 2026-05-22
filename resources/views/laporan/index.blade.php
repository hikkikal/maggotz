@extends('layouts.app')

@section('title', 'Laporan Mingguan')

@section('content')

<div class="relative z-10 w-full font-sans select-none space-y-4 md:space-y-6">

    <!-- Header Section -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_30px_-10px_rgba(13,59,22,0.08)] border border-white/50 relative overflow-hidden transition-all duration-300">
        <div class="absolute top-0 left-0 right-0 h-[4px] bg-[#0D3B16]"></div>
        
        <div class="px-4 md:px-6 py-4 md:py-6 flex items-center gap-4 md:gap-5">
            <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[#0D3B16]/10 flex items-center justify-center text-[#0D3B16] shrink-0 shadow-inner">
                <i class="fa-solid fa-chart-simple text-lg md:text-xl"></i>
            </div>
            <div>
                <h1 class="text-lg md:text-2xl font-extrabold text-[#0D3B16] tracking-wide uppercase">
                    Laporan Mingguan
                </h1>
                <p class="text-[10px] md:text-xs text-gray-400 font-medium mt-0.5 md:mt-1">
                    Pantau statistik volume sampah masuk, total hasil produksi, dan tingkat efisiensi biokonversi maggot
                </p>
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-6">

        <div class="rounded-2xl shadow-[0_10px_25px_-5px_rgba(82,17,15,0.15)] text-white p-4 md:p-6 bg-[#52110F]">
            <div class="flex items-center justify-between">
                <span class="text-[10px] md:text-xs uppercase tracking-wider font-bold opacity-90">Sampah Masuk</span>
                <div class="w-7 h-7 md:w-8 md:h-8 rounded-lg bg-white/20 flex items-center justify-center text-white backdrop-blur-sm">
                    <i class="fa fa-trash text-xs md:text-sm"></i>
                </div>
            </div>
            <h2 class="text-2xl md:text-3xl font-black mt-3 md:mt-4 font-mono">25 <span class="text-base md:text-lg font-bold">kg</span></h2>
        </div>

        <div class="rounded-2xl shadow-[0_10px_25px_-5px_rgba(115,127,53,0.15)] text-white p-4 md:p-6 bg-[#737F35]">
            <div class="flex items-center justify-between">
                <span class="text-[10px] md:text-xs uppercase tracking-wider font-bold opacity-90">Total Produksi</span>
                <div class="w-7 h-7 md:w-8 md:h-8 rounded-lg bg-white/20 flex items-center justify-center text-white backdrop-blur-sm">
                    <i class="fa fa-seedling text-xs md:text-sm"></i>
                </div>
            </div>
            <h2 class="text-2xl md:text-3xl font-black mt-3 md:mt-4 font-mono">18 <span class="text-base md:text-lg font-bold">kg</span></h2>
        </div>

        <div class="rounded-2xl shadow-[0_10px_25px_-5px_rgba(13,59,22,0.15)] text-white p-4 md:p-6 bg-[#0D3B16]">
            <div class="flex items-center justify-between">
                <span class="text-[10px] md:text-xs uppercase tracking-wider font-bold opacity-90">Tingkat Efisiensi</span>
                <div class="w-7 h-7 md:w-8 md:h-8 rounded-lg bg-white/20 flex items-center justify-center text-white backdrop-blur-sm">
                    <i class="fa fa-chart-line text-xs md:text-sm"></i>
                </div>
            </div>
            <h2 class="text-2xl md:text-3xl font-black mt-3 md:mt-4 font-mono">72%</h2>
        </div>

    </div>

    <!-- Chart Section -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_35px_-10px_rgba(0,0,0,0.05)] border border-white/60 p-4 md:p-6">
        <div class="flex items-center gap-2 mb-3 md:mb-4 border-b border-gray-100 pb-2 md:pb-3">
            <span class="w-2 h-2 md:w-2.5 md:h-2.5 rounded-full bg-[#0D3B16]"></span>
            <h2 class="font-extrabold text-[11px] md:text-sm text-[#0D3B16] uppercase tracking-wider">Grafik Komparasi Sampah & Produksi</h2>
        </div>

        <div class="relative w-full">
            <canvas id="laporanChart"></canvas>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-col sm:flex-row items-center gap-3 md:gap-4">
        <button class="w-full sm:w-auto inline-flex justify-center items-center gap-2 px-5 py-2.5 bg-white border border-gray-200 rounded-xl shadow-sm text-[11px] md:text-xs font-bold text-gray-700 hover:bg-gray-50/80 hover:shadow transition duration-150 uppercase tracking-wider">
            <i class="fa fa-download text-[#52110F]"></i>
            Download PDF
        </button>

        <button class="w-full sm:w-auto inline-flex justify-center items-center gap-2 px-5 py-2.5 bg-white border border-gray-200 rounded-xl shadow-sm text-[11px] md:text-xs font-bold text-gray-700 hover:bg-gray-50/80 hover:shadow transition duration-150 uppercase tracking-wider">
            <i class="fa fa-file-excel text-[#0D3B16]"></i>
            Download Excel
        </button>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('laporanChart');

const getAspectRatio = () => {
    return window.innerWidth < 768 ? 1.2 : 2.2;
};

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'],
        datasets: [
            {
                label: 'Sampah Masuk (kg)',
                data: [10, 12, 15, 9, 13],
                backgroundColor: '#737F35', 
                borderRadius: 6,
                borderSkipped: false,
                barPercentage: 0.7, 
                categoryPercentage: 0.6  
            },
            {
                label: 'Produksi (kg)',
                data: [7, 9, 11, 6, 10],
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
                labels: {
                    boxWidth: 10,
                    boxHeight: 10,
                    usePointStyle: true,
                    pointStyle: 'circle',
                    font: {
                        family: 'sans-serif',
                        size: 11,
                        weight: '600'
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: 'rgba(13, 59, 22, 0.05)'
                },
                ticks: {
                    color: '#233E47',
                    font: {
                        size: 10,
                        weight: '500'
                    }
                }
            },
            x: {
                grid: {
                    display: false
                },
                ticks: {
                    color: '#233E47',
                    font: {
                        size: 11,
                        weight: '600'
                    }
                }
            }
        }
    }
});

window.addEventListener('resize', () => {
    const chart = Chart.getChart(ctx);
    if (chart) {
        chart.options.aspectRatio = getAspectRatio();
        chart.update();
    }
});
</script>

@endsection