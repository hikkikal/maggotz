@extends('layouts.app')
@section('title', 'Data Maggot')
@section('content')

<div class="relative z-10 w-full font-sans select-none space-y-4 md:space-y-6">

    @if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-800 text-xs font-semibold px-4 py-3 rounded-xl flex items-center gap-2">
        <i class="fa-solid fa-circle-check text-green-500"></i> {{ session('success') }}
    </div>
    @endif

    <!-- Header -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_30px_-10px_rgba(13,59,22,0.08)] border border-white/50 relative overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-[4px] bg-gradient-to-r from-[#0D3B16] via-[#737F35] to-[#233E47]"></div>
        <div class="px-4 md:px-6 py-5 md:py-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4 md:gap-5">
                <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[#0D3B16]/10 flex items-center justify-center text-[#0D3B16] shrink-0">
                    <i class="fa-solid fa-database text-lg md:text-xl"></i>
                </div>
                <div>
                    <h1 class="text-lg md:text-2xl font-extrabold text-[#0D3B16] tracking-wide uppercase">Data Maggot</h1>
                    <p class="text-[11px] md:text-xs text-gray-400 font-medium mt-0.5">Manajemen log hasil panen, bobot, dan perkembangan budidaya</p>
                </div>
            </div>
            <a href="{{ route('maggot.create') }}"
               class="flex sm:inline-flex items-center justify-center gap-2 w-full sm:w-auto px-5 py-2.5 bg-[#0D3B16] hover:bg-[#0A2D11] text-white text-xs font-bold rounded-xl shadow-[0_8px_20px_-6px_rgba(13,59,22,0.3)] transition-all uppercase tracking-wider group">
                <i class="fa-solid fa-plus transition-transform duration-200 group-hover:rotate-90"></i> Tambah Data
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white/60 backdrop-blur-md rounded-2xl shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] border border-white/50 overflow-hidden">
        <div class="px-4 md:px-6 py-4 md:py-5 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div>
                <h2 class="font-bold text-gray-800 text-sm">Log Perekaman Riwayat</h2>
                <p class="text-xs text-gray-400 mt-0.5">Total {{ $records->count() }} entri data tersimpan</p>
            </div>
            <div class="relative w-full sm:max-w-xs">
                <span class="absolute inset-y-0 left-3 flex items-center pointer-events-none text-gray-400 text-xs"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" id="searchTable" placeholder="Cari keterangan..."
                    class="w-full pl-8 pr-4 py-2 bg-white/80 border border-gray-200 rounded-lg text-xs font-medium focus:outline-none focus:ring-1 focus:ring-[#0D3B16] text-gray-600 placeholder-gray-400/80 shadow-sm transition-all" />
            </div>
        </div>

        <div class="overflow-x-auto w-full">
            <table class="w-full text-left border-collapse whitespace-nowrap" id="dataTable">
                <thead>
                    <tr class="bg-[#0D3B16]/95 text-[11px] font-bold text-white uppercase tracking-wider">
                        <th class="px-4 md:px-6 py-3 md:py-4 text-center w-12">No</th>
                        <th class="px-4 md:px-6 py-3 md:py-4">Tanggal</th>
                        <th class="px-4 md:px-6 py-3 md:py-4">Sampah Masuk</th>
                        <th class="px-4 md:px-6 py-3 md:py-4">Berat Biomassa</th>
                        <th class="px-4 md:px-6 py-3 md:py-4">Hasil Panen</th>
                        <th class="px-4 md:px-6 py-3 md:py-4">Kandang</th>
                        <th class="px-4 md:px-6 py-3 md:py-4">Keterangan</th>
                        <th class="px-4 md:px-6 py-3 md:py-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100/60 text-xs text-gray-600 font-medium">
                    @forelse($records as $i => $record)
                    <tr class="{{ $i % 2 === 0 ? '' : 'bg-[#0D3B16]/5' }} hover:bg-[#737F35]/10 transition-all duration-150">
                        <td class="px-4 md:px-6 py-3 md:py-4 text-center text-[#0D3B16] font-bold font-mono">{{ $i + 1 }}</td>
                        <td class="px-4 md:px-6 py-3 md:py-4 font-bold text-gray-700">
                            <span class="flex items-center gap-2">
                                <i class="fa-regular fa-calendar text-[#737F35]"></i>
                                {{ $record->tanggal->format('d M Y') }}
                            </span>
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-xl text-xs font-black bg-orange-100 text-orange-700 tracking-wide">
                                <i class="fa-solid fa-trash mr-1.5 text-[9px]"></i> {{ $record->sampah_masuk }} kg
                            </span>
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-xl text-xs font-black bg-[#737F35] text-white tracking-wide">
                                <i class="fa-solid fa-weight-scale mr-1.5 text-[9px]"></i> {{ $record->berat_biomassa }} kg
                            </span>
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4">
                            @if($record->hasil_panen)
                            <span class="inline-flex items-center px-2.5 py-1 rounded-xl text-xs font-black bg-green-100 text-green-700 tracking-wide">
                                <i class="fa-solid fa-seedling mr-1.5 text-[9px]"></i> {{ $record->hasil_panen }} kg
                            </span>
                            @else
                            <span class="text-gray-400 text-[10px]">—</span>
                            @endif
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-gray-500">
                            {{ $record->device?->name ?? '—' }}
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-gray-600 max-w-[200px] truncate">
                            {{ $record->keterangan ?? '—' }}
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-center">
                            <div class="inline-flex items-center gap-1.5">
                                <a href="{{ route('maggot-record.edit', $record->id) }}"
                                   class="inline-flex items-center justify-center w-7 h-7 md:w-8 md:h-8 rounded-lg bg-blue-500 hover:bg-blue-600 text-white transition-all shadow-[0_4px_10px_-4px_rgba(59,130,246,0.5)]">
                                    <i class="fa-solid fa-pen-to-square text-[10px]"></i>
                                </a>
                                <form action="{{ route('maggot-record.destroy', $record->id) }}" method="POST"
                                    onsubmit="return confirm('Hapus data tanggal {{ $record->tanggal->format('d M Y') }}?')">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center justify-center w-7 h-7 md:w-8 md:h-8 rounded-lg bg-red-500 hover:bg-red-600 text-white transition-all shadow-[0_4px_10px_-4px_rgba(239,68,68,0.5)]">
                                        <i class="fa-solid fa-trash-can text-[10px]"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-10 text-center text-xs text-gray-400">
                            <i class="fa-solid fa-folder-open text-2xl mb-2 block text-gray-300"></i>
                            Belum ada data maggot. <a href="{{ route('maggot.create') }}" class="text-[#0D3B16] font-bold underline">Tambah sekarang</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-4 md:px-6 py-3 md:py-4 bg-gray-50/50 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400 font-medium">
            <span>Menampilkan {{ $records->count() }} entri</span>
        </div>
    </div>
</div>

<script>
document.getElementById('searchTable').addEventListener('input', function(e) {
    const q = e.target.value.toLowerCase();
    document.querySelectorAll('#dataTable tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
});
</script>

@endsection
