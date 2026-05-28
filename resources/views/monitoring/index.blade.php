@extends('layouts.app')
@section('title', 'Monitoring – ' . $device->name)
@section('content')
<div class="relative z-10 w-full font-sans select-none space-y-4 md:space-y-6">

    <!-- Header -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-white/50 relative overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-[4px] bg-gradient-to-r from-[#0D3B16] via-[#737F35] to-[#233E47]"></div>
        <div class="px-4 md:px-6 py-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 rounded-xl bg-[#0D3B16] text-white flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <div>
                    <h1 class="text-lg md:text-2xl font-extrabold text-[#0D3B16] uppercase">{{ $device->name }}</h1>
                    <p class="text-xs text-gray-400">{{ $device->location ?? 'Lokasi tidak diset' }}</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-1.5 text-[10px] font-bold text-[#737F35] bg-[#737F35]/10 px-3 py-1.5 rounded-lg">
                    <span class="w-2 h-2 rounded-full bg-[#737F35] animate-pulse"></span>
                    <span id="liveText">Live</span>
                </div>
                <div class="relative flex items-center rounded-xl border border-[#737F35]/30 bg-white shadow-sm">
                    <span class="absolute left-3 text-[#0D3B16] text-sm pointer-events-none z-10"><i class="fa-solid fa-calendar-days"></i></span>
                    <input type="date" id="filterTanggal" value="{{ request('tanggal', now()->format('Y-m-d')) }}"
                        class="appearance-none pl-9 pr-4 py-2 bg-transparent text-xs font-bold text-[#0D3B16] cursor-pointer focus:outline-none" />
                </div>
            </div>
        </div>
    </div>

    <!-- Cards -->
    @php
        $latest = $readings->first();
        $suhu   = $latest?->temperature ?? '-';
        $lembab = $latest?->humidity    ?? '-';
        $status = $latest?->status      ?? '-';
    @endphp
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 md:gap-4">
        <div class="bg-[#0D3B16] text-white rounded-2xl p-4 md:p-5 border border-white/10 hover:-translate-y-1 transition-all">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-[10px] font-semibold text-white/70 uppercase tracking-widest">Suhu Terbaru</h2>
                    <p id="cardSuhu" class="text-3xl font-black mt-1.5">{{ $suhu !== '-' ? $suhu.'°C' : '-' }}</p>
                </div>
                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center"><i class="fa-solid fa-temperature-three-quarters"></i></div>
            </div>
            <p id="cardWaktu" class="mt-4 text-[10px] text-white/60">{{ $latest?->recorded_at?->format('d M Y, H:i:s') ?? 'Belum ada data' }}</p>
        </div>
        <div class="bg-[#233E47] text-white rounded-2xl p-4 md:p-5 border border-white/10 hover:-translate-y-1 transition-all">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-[10px] font-semibold text-white/70 uppercase tracking-widest">Kelembaban Terbaru</h2>
                    <p id="cardLembab" class="text-3xl font-black mt-1.5">{{ $lembab !== '-' ? $lembab.'%' : '-' }}</p>
                </div>
                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center"><i class="fa-solid fa-droplet"></i></div>
            </div>
            <p class="mt-4 text-[10px] text-white/60">Kapasitas uap air kandang</p>
        </div>
        <div class="bg-white/70 backdrop-blur-md rounded-2xl p-4 md:p-5 border border-white/50 hover:-translate-y-1 transition-all">
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-[10px] font-semibold text-gray-400 uppercase tracking-widest">Status Kondisi</h2>
                    <p id="cardStatus" class="text-3xl font-black mt-1.5 text-[#0D3B16]">{{ $status }}</p>
                </div>
                <div id="cardStatusIcon" class="w-9 h-9 rounded-xl flex items-center justify-center
                    @if($status==='IDEAL') bg-green-100 text-green-700
                    @elseif($status==='BAHAYA') bg-red-100 text-red-700
                    @elseif($status==='DINGIN') bg-blue-100 text-blue-700
                    @elseif($status==='KERING') bg-yellow-100 text-yellow-700
                    @else bg-gray-100 text-gray-500 @endif">
                    <i id="cardStatusIconEl" class="fa-solid
                        @if($status==='IDEAL') fa-circle-check
                        @elseif($status==='BAHAYA') fa-triangle-exclamation
                        @elseif($status==='DINGIN') fa-snowflake
                        @elseif($status==='KERING') fa-sun
                        @else fa-circle-question @endif"></i>
                </div>
            </div>
            <p id="cardStatusDesc" class="mt-4 text-[10px] text-gray-400">
                @if($status==='IDEAL') Kondisi optimal untuk pertumbuhan maggot
                @elseif($status==='BAHAYA') Suhu terlalu tinggi! Segera tangani
                @elseif($status==='DINGIN') Suhu rendah, pertumbuhan terhambat
                @elseif($status==='KERING') Kelembaban kurang, perlu penyiraman
                @else Belum ada data terbaru @endif
            </p>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">
        <div class="bg-white/60 backdrop-blur-md rounded-2xl p-4 md:p-6 border border-white/50">
            <div class="flex items-center justify-between gap-3 mb-4">
                <div><h2 class="font-bold text-gray-800 text-sm">Grafik Suhu</h2><p class="text-xs text-gray-400">24 jam terakhir (°C)</p></div>
                <span class="inline-flex items-center gap-1.5 text-[10px] font-bold text-gray-600 px-2.5 py-1 bg-white/90 rounded-md border border-gray-100"><span class="w-2 h-2 rounded-full bg-[#0D3B16]"></span>Suhu</span>
            </div>
            <div class="relative w-full h-[200px] md:h-[240px]"><canvas id="chartSuhu"></canvas></div>
        </div>
        <div class="bg-white/60 backdrop-blur-md rounded-2xl p-4 md:p-6 border border-white/50">
            <div class="flex items-center justify-between gap-3 mb-4">
                <div><h2 class="font-bold text-gray-800 text-sm">Grafik Kelembaban</h2><p class="text-xs text-gray-400">24 jam terakhir (%)</p></div>
                <span class="inline-flex items-center gap-1.5 text-[10px] font-bold text-gray-600 px-2.5 py-1 bg-white/90 rounded-md border border-gray-100"><span class="w-2 h-2 rounded-full bg-[#233E47]"></span>Kelembaban</span>
            </div>
            <div class="relative w-full h-[200px] md:h-[240px]"><canvas id="chartKelembaban"></canvas></div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white/60 backdrop-blur-md rounded-2xl border border-white/50 overflow-hidden">
        <div class="px-4 md:px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <h2 class="font-bold text-gray-800 text-sm">Tabel Log Parameter</h2>
                <p id="tableInfo" class="text-xs text-gray-400 mt-0.5">Total {{ $readings->total() }} entri</p>
            </div>
            <div class="relative w-full sm:w-64">
                <span class="absolute inset-y-0 left-3 flex items-center pointer-events-none text-[#0D3B16] text-xs"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" id="searchTable" placeholder="Cari waktu atau status..."
                    class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-gray-200 bg-white/80 focus:outline-none focus:ring-2 focus:ring-[#0D3B16] transition-all placeholder:text-gray-400" />
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-[#0D3B16] text-[11px] font-bold text-white uppercase tracking-wider">
                        <th class="px-4 md:px-6 py-3.5">Waktu</th>
                        <th class="px-4 md:px-6 py-3.5">Suhu</th>
                        <th class="px-4 md:px-6 py-3.5">Kelembaban</th>
                        <th class="px-4 md:px-6 py-3.5">Status</th>
                    </tr>
                </thead>
                <tbody id="tableBody" class="divide-y divide-gray-100/60 text-xs text-gray-600 font-medium">
                    @forelse($readings as $r)
                    @php
                        $s=$r->status;
                        $dot=match($s){'IDEAL'=>'bg-green-400','BAHAYA'=>'bg-red-400','DINGIN'=>'bg-blue-400','KERING'=>'bg-yellow-400',default=>'bg-gray-400'};
                        $badge=match($s){'IDEAL'=>'bg-green-100 text-green-800','BAHAYA'=>'bg-red-100 text-red-800','DINGIN'=>'bg-blue-100 text-blue-800','KERING'=>'bg-yellow-100 text-yellow-800',default=>'bg-gray-100 text-gray-700'};
                        $border=match($s){'BAHAYA'=>'border-l-4 border-red-400','IDEAL'=>'border-l-4 border-green-400',default=>''};
                    @endphp
                    <tr class="hover:bg-gray-50/50 transition-colors {{ $border }}">
                        <td class="px-4 md:px-6 py-3 font-mono"><div class="flex items-center gap-2"><span class="w-2 h-2 rounded-full {{ $dot }} shrink-0"></span>{{ $r->recorded_at->format('d/m/Y H:i:s') }}</div></td>
                        <td class="px-4 md:px-6 py-3 font-bold text-[#0D3B16]">{{ $r->temperature }}°C</td>
                        <td class="px-4 md:px-6 py-3 font-bold text-[#233E47]">{{ $r->humidity }}%</td>
                        <td class="px-4 md:px-6 py-3"><span class="px-2 py-1 rounded-md text-[9px] font-extrabold uppercase {{ $badge }}">{{ $s }}</span></td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="px-6 py-10 text-center text-xs text-gray-400"><i class="fa-solid fa-folder-open text-2xl mb-2 block text-gray-300"></i>Belum ada data sensor.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div id="emptyState" class="hidden p-8 text-center text-xs text-gray-400"><i class="fa-solid fa-folder-open text-2xl mb-2 block text-gray-300"></i>Tidak ada data yang cocok.</div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const deviceId = {{ $device->id }};
let chartSuhuInst, chartLembabInst, lastTimestamp = null, isLiveMode = true;

const chartOpts = {
    responsive:true, maintainAspectRatio:false,
    interaction:{mode:'index',intersect:false},
    plugins:{legend:{display:false},tooltip:{backgroundColor:'rgba(35,62,71,0.95)',titleFont:{size:12,weight:'bold'},bodyFont:{size:11},padding:10,cornerRadius:10}},
    scales:{y:{grid:{color:'rgba(0,0,0,0.03)'},ticks:{font:{size:10},color:'#a1a1aa'}},x:{grid:{display:false},ticks:{font:{size:10},color:'#a1a1aa',maxTicksLimit:8}}}
};

const initLabels = {!! $chartData->map(fn($r) => $r->recorded_at->format('H:i:s'))->toJson() !!};
const initSuhu   = {!! $chartData->map(fn($r) => $r->temperature)->toJson() !!};
const initLembab = {!! $chartData->map(fn($r) => $r->humidity)->toJson() !!};

chartSuhuInst = new Chart(document.getElementById('chartSuhu'), {
    type:'line', options:chartOpts,
    data:{labels:initLabels,datasets:[{label:'Suhu (°C)',data:initSuhu,borderColor:'#0D3B16',backgroundColor:'rgba(13,59,22,0.06)',tension:0.38,fill:true,borderWidth:2.5,pointBackgroundColor:'#0D3B16',pointBorderColor:'#fff',pointBorderWidth:1.5,pointRadius:3,pointHoverRadius:5}]}
});
chartLembabInst = new Chart(document.getElementById('chartKelembaban'), {
    type:'line', options:chartOpts,
    data:{labels:initLabels,datasets:[{label:'Kelembaban (%)',data:initLembab,borderColor:'#233E47',backgroundColor:'rgba(35,62,71,0.06)',tension:0.38,fill:true,borderWidth:2.5,pointBackgroundColor:'#233E47',pointBorderColor:'#fff',pointBorderWidth:1.5,pointRadius:3,pointHoverRadius:5}]}
});

const statusCfg = {
    IDEAL: {icon:'fa-circle-check',cls:'bg-green-100 text-green-700',desc:'Kondisi optimal untuk pertumbuhan maggot'},
    BAHAYA:{icon:'fa-triangle-exclamation',cls:'bg-red-100 text-red-700',desc:'Suhu terlalu tinggi! Segera tangani'},
    DINGIN:{icon:'fa-snowflake',cls:'bg-blue-100 text-blue-700',desc:'Suhu rendah, pertumbuhan terhambat'},
    KERING:{icon:'fa-sun',cls:'bg-yellow-100 text-yellow-700',desc:'Kelembaban kurang, perlu penyiraman'},
};
const badgeCls = {IDEAL:'bg-green-100 text-green-800',BAHAYA:'bg-red-100 text-red-800',DINGIN:'bg-blue-100 text-blue-800',KERING:'bg-yellow-100 text-yellow-800'};
const dotCls   = {IDEAL:'bg-green-400',BAHAYA:'bg-red-400',DINGIN:'bg-blue-400',KERING:'bg-yellow-400'};

function renderTable(readings) {
    if (!readings.length) {
        document.getElementById('tableBody').innerHTML = '<tr><td colspan="4" class="px-6 py-10 text-center text-xs text-gray-400"><i class="fa-solid fa-folder-open text-2xl mb-2 block text-gray-300"></i>Tidak ada data untuk tanggal ini.</td></tr>';
        document.getElementById('tableInfo').textContent = 'Tidak ada data';
        return;
    }
    document.getElementById('tableBody').innerHTML = readings.map(r => {
        const waktu = r.recorded_at.replace('T',' ').substring(0,19);
        return `<tr class="hover:bg-gray-50/50 transition-colors ${r.status==='BAHAYA'?'border-l-4 border-red-400':r.status==='IDEAL'?'border-l-4 border-green-400':''}">
            <td class="px-4 md:px-6 py-3 font-mono text-xs text-gray-700"><div class="flex items-center gap-2"><span class="w-2 h-2 rounded-full shrink-0 ${dotCls[r.status]??'bg-gray-400'}"></span>${waktu}</div></td>
            <td class="px-4 md:px-6 py-3 font-bold text-[#0D3B16] text-xs">${r.temperature}°C</td>
            <td class="px-4 md:px-6 py-3 font-bold text-[#233E47] text-xs">${r.humidity}%</td>
            <td class="px-4 md:px-6 py-3"><span class="px-2 py-1 rounded-md text-[9px] font-extrabold uppercase ${badgeCls[r.status]??'bg-gray-100 text-gray-700'}">${r.status}</span></td>
        </tr>`;
    }).join('');
    document.getElementById('tableInfo').textContent = `Total ${readings.length} entri`;
}

function updateCharts(readings) {
    const chrono = [...readings].reverse();
    const labels = chrono.map(r => r.recorded_at.substring(11,19));
    chartSuhuInst.data.labels = chartLembabInst.data.labels = labels;
    chartSuhuInst.data.datasets[0].data   = chrono.map(r => r.temperature);
    chartLembabInst.data.datasets[0].data = chrono.map(r => r.humidity);
    chartSuhuInst.update('none');
    chartLembabInst.update('none');
}

function updateCards(latest) {
    document.getElementById('cardSuhu').textContent   = latest.temperature + '°C';
    document.getElementById('cardLembab').textContent = latest.humidity + '%';
    document.getElementById('cardStatus').textContent = latest.status;
    document.getElementById('cardWaktu').textContent  = latest.recorded_at.replace('T',' ').substring(0,19);
    const cfg = statusCfg[latest.status] ?? {icon:'fa-circle-question',cls:'bg-gray-100 text-gray-500',desc:'-'};
    document.getElementById('cardStatusIcon').className   = `w-9 h-9 rounded-xl flex items-center justify-center ${cfg.cls}`;
    document.getElementById('cardStatusIconEl').className = `fa-solid ${cfg.icon}`;
    document.getElementById('cardStatusDesc').textContent = cfg.desc;
}

async function fetchLatest() {
    if (!isLiveMode) return;
    try {
        const res      = await fetch(`/api/monitoring/${deviceId}/latest`);
        const readings = await res.json();
        if (!readings.length) return;
        const newest = readings[0].recorded_at;
        if (newest === lastTimestamp) return;
        lastTimestamp = newest;
        updateCards(readings[0]);
        updateCharts(readings);
        renderTable(readings);
        document.getElementById('liveText').textContent = 'Live · ' + newest.substring(11,19);
    } catch(e) { console.error('Fetch gagal:', e); }
}

document.getElementById('filterTanggal').addEventListener('change', async function(e) {
    const tanggal = e.target.value;
    const today   = new Date().toISOString().substring(0,10);
    isLiveMode    = (tanggal === today);
    document.getElementById('liveText').textContent = isLiveMode ? 'Live · aktif' : 'Historis: ' + tanggal;

    try {
        const res      = await fetch(`/api/monitoring/${deviceId}/history?tanggal=${tanggal}`);
        const readings = await res.json();
        updateCharts(readings);
        renderTable(readings);
        if (isLiveMode && readings.length) updateCards(readings[0]);
    } catch(e) { console.error('Fetch historis gagal:', e); }
});

document.getElementById('searchTable').addEventListener('input', function(e) {
    const q = e.target.value.toLowerCase();
    const rows = document.querySelectorAll('#tableBody tr');
    let has = false;
    rows.forEach(r => { const m = r.textContent.toLowerCase().includes(q); r.style.display = m?'':'none'; if(m) has=true; });
    document.getElementById('emptyState').classList.toggle('hidden', has);
});

fetchLatest();
setInterval(fetchLatest, 5000);
</script>
@endsection
