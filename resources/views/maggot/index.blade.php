@extends('layouts.app')

@section('title', 'Data Maggot')

@section('content')

<div class="relative z-10 w-full font-sans select-none space-y-4 md:space-y-6">

    <!-- Header Section -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_30px_-10px_rgba(13,59,22,0.08)] border border-white/50 relative overflow-hidden transition-all duration-300">
        <div class="absolute top-0 left-0 right-0 h-[4px] bg-gradient-to-r from-[#0D3B16] via-[#737F35] to-[#233E47]"></div>
        
        <div class="px-4 md:px-6 py-5 md:py-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4 md:gap-5">
                <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[#0D3B16]/10 flex items-center justify-center text-[#0D3B16] shrink-0 shadow-inner">
                    <i class="fa-solid fa-database text-lg md:text-xl"></i>
                </div>
                <div>
                    <h1 class="text-lg md:text-2xl font-extrabold text-[#0D3B16] tracking-wide uppercase">
                        Data Maggot
                    </h1>
                    <p class="text-[11px] md:text-xs text-gray-400 font-medium mt-0.5 md:mt-1">
                        Manajemen log hasil panen, bobot, dan perkembangan budidaya
                    </p>
                </div>
            </div>
            
            <div class="w-full sm:w-auto mt-2 sm:mt-0">
                <a href="/maggot/create"
                   class="flex sm:inline-flex items-center justify-center gap-2 w-full sm:w-auto px-5 py-2.5 bg-[#0D3B16] hover:bg-[#0A2D11] text-white text-[11px] md:text-xs font-bold rounded-xl shadow-[0_8px_20px_-6px_rgba(13,59,22,0.3)] hover:shadow-[0_8px_24px_-4px_rgba(13,59,22,0.4)] transition-all duration-200 tracking-wider uppercase group">
                    <i class="fa-solid fa-plus transition-transform duration-200 group-hover:rotate-90"></i>
                    Tambah Data
                </a>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white/60 backdrop-blur-md rounded-2xl shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] border border-white/50 overflow-hidden">
        
        <div class="px-4 md:px-6 py-4 md:py-5 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3 md:gap-4">
            <div>
                <h2 class="font-bold text-gray-800 tracking-wide text-sm">Log Perekaman Riwayat</h2>
                <p class="text-[11px] md:text-xs text-gray-400 mt-0.5">Total entri data tersimpan di sistem</p>
            </div>
            
            <div class="relative w-full sm:max-w-xs">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400 text-xs">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" placeholder="Cari keterangan..." class="w-full pl-8 pr-4 py-2 bg-white/80 border border-gray-200 rounded-lg text-xs font-medium focus:outline-none focus:ring-1 focus:ring-[#0D3B16] text-gray-600 placeholder-gray-400/80 shadow-sm transition-all" />
            </div>
        </div>

        <div class="overflow-x-auto w-full">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead>
                    <tr class="bg-[#0D3B16]/95 text-[10px] md:text-[11px] font-bold text-white uppercase tracking-wider shadow-sm">
                        <th class="px-4 md:px-6 py-3 md:py-4 font-bold text-center w-12 md:w-16 rounded-tl-none md:rounded-tl-xl">No</th>
                        <th class="px-4 md:px-6 py-3 md:py-4 font-bold">Tanggal Input</th>
                        <th class="px-4 md:px-6 py-3 md:py-4 font-bold">Berat Biomassa</th>
                        <th class="px-4 md:px-6 py-3 md:py-4 font-bold">Keterangan Catatan</th>
                        <th class="px-4 md:px-6 py-3 md:py-4 font-bold text-center w-28 md:w-36 rounded-tr-none md:rounded-tr-xl">Aksi Manajemen</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100/60 text-[11px] md:text-xs text-gray-600 font-medium">
                    
                    <tr class="hover:bg-[#737F35]/10 transition-all duration-150">
                        <td class="px-4 md:px-6 py-3 md:py-4 text-center text-[#0D3B16] font-bold font-mono bg-[#0D3B16]/5">1</td>
                        <td class="px-4 md:px-6 py-3 md:py-4 font-bold text-gray-700">
                            <span class="flex items-center gap-2">
                                <i class="fa-regular fa-calendar text-[#737F35]"></i> 10 Mei 2026
                            </span>
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4">
                            <span class="inline-flex items-center px-2.5 md:px-3 py-1 rounded-xl text-[10px] md:text-xs font-black bg-[#737F35] text-white shadow-sm tracking-wide">
                                <i class="fa-solid fa-weight-scale mr-1.5 text-[9px] md:text-[10px]"></i> 2.3 kg
                            </span>
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-gray-600 font-semibold max-w-[200px] md:max-w-xs truncate">Panen pertama siklus mei</td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-center">
                            <div class="inline-flex items-center gap-1.5">
                                <a href="/maggot/edit" class="inline-flex items-center justify-center w-7 h-7 md:w-8 md:h-8 rounded-lg bg-blue-500 hover:bg-blue-600 text-white transition-all duration-150 shadow-[0_4px_10px_-4px_rgba(59,130,246,0.5)]" title="Edit Data">
                                    <i class="fa-solid fa-pen-to-square text-[10px] md:text-xs"></i>
                                </a>
                                <button class="inline-flex items-center justify-center w-7 h-7 md:w-8 md:h-8 rounded-lg bg-red-500 hover:bg-red-600 text-white transition-all duration-150 shadow-[0_4px_10px_-4px_rgba(239,68,68,0.5)]" title="Hapus Data">
                                    <i class="fa-solid fa-trash-can text-[10px] md:text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="bg-[#0D3B16]/5 hover:bg-[#737F35]/10 transition-all duration-150">
                        <td class="px-4 md:px-6 py-3 md:py-4 text-center text-[#0D3B16] font-bold font-mono bg-[#0D3B16]/10">2</td>
                        <td class="px-4 md:px-6 py-3 md:py-4 font-bold text-gray-700">
                            <span class="flex items-center gap-2">
                                <i class="fa-regular fa-calendar text-[#737F35]"></i> 17 Mei 2026
                            </span>
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4">
                            <span class="inline-flex items-center px-2.5 md:px-3 py-1 rounded-xl text-[10px] md:text-xs font-black bg-[#737F35] text-white shadow-sm tracking-wide">
                                <i class="fa-solid fa-weight-scale mr-1.5 text-[9px] md:text-[10px]"></i> 4.1 kg
                            </span>
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-gray-600 font-semibold max-w-[200px] md:max-w-xs truncate">Hasil panen box pembesaran B1-B4</td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-center">
                            <div class="inline-flex items-center gap-1.5">
                                <a href="/maggot/edit" class="inline-flex items-center justify-center w-7 h-7 md:w-8 md:h-8 rounded-lg bg-blue-500 hover:bg-blue-600 text-white transition-all duration-150 shadow-[0_4px_10px_-4px_rgba(59,130,246,0.5)]">
                                    <i class="fa-solid fa-pen-to-square text-[10px] md:text-xs"></i>
                                </a>
                                <button class="inline-flex items-center justify-center w-7 h-7 md:w-8 md:h-8 rounded-lg bg-red-500 hover:bg-red-600 text-white transition-all duration-150 shadow-[0_4px_10px_-4px_rgba(239,68,68,0.5)]">
                                    <i class="fa-solid fa-trash-can text-[10px] md:text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-[#737F35]/10 transition-all duration-150">
                        <td class="px-4 md:px-6 py-3 md:py-4 text-center text-[#0D3B16] font-bold font-mono bg-[#0D3B16]/5">3</td>
                        <td class="px-4 md:px-6 py-3 md:py-4 font-bold text-gray-700">
                            <span class="flex items-center gap-2">
                                <i class="fa-regular fa-calendar text-[#737F35]"></i> 19 Mei 2026
                            </span>
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4">
                            <span class="inline-flex items-center px-2.5 md:px-3 py-1 rounded-xl text-[10px] md:text-xs font-black bg-[#737F35] text-white shadow-sm tracking-wide">
                                <i class="fa-solid fa-weight-scale mr-1.5 text-[9px] md:text-[10px]"></i> 3.5 kg
                            </span>
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-gray-600 font-semibold max-w-[200px] md:max-w-xs truncate">Hasil biomassa ekstraksi biowaste sayur</td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-center">
                            <div class="inline-flex items-center gap-1.5">
                                <a href="/maggot/edit" class="inline-flex items-center justify-center w-7 h-7 md:w-8 md:h-8 rounded-lg bg-blue-500 hover:bg-blue-600 text-white transition-all duration-150 shadow-[0_4px_10px_-4px_rgba(59,130,246,0.5)]">
                                    <i class="fa-solid fa-pen-to-square text-[10px] md:text-xs"></i>
                                </a>
                                <button class="inline-flex items-center justify-center w-7 h-7 md:w-8 md:h-8 rounded-lg bg-red-500 hover:bg-red-600 text-white transition-all duration-150 shadow-[0_4px_10px_-4px_rgba(239,68,68,0.5)]">
                                    <i class="fa-solid fa-trash-can text-[10px] md:text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="bg-[#0D3B16]/5 hover:bg-[#737F35]/10 transition-all duration-150">
                        <td class="px-4 md:px-6 py-3 md:py-4 text-center text-[#0D3B16] font-bold font-mono bg-[#0D3B16]/10">4</td>
                        <td class="px-4 md:px-6 py-3 md:py-4 font-bold text-gray-700">
                            <span class="flex items-center gap-2">
                                <i class="fa-regular fa-calendar text-[#737F35]"></i> 21 Mei 2026
                            </span>
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4">
                            <span class="inline-flex items-center px-2.5 md:px-3 py-1 rounded-xl text-[10px] md:text-xs font-black bg-[#737F35] text-white shadow-sm tracking-wide">
                                <i class="fa-solid fa-weight-scale mr-1.5 text-[9px] md:text-[10px]"></i> 5.2 kg
                            </span>
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-gray-600 font-semibold max-w-[200px] md:max-w-xs truncate">Pembersihan total zona rak budidaya C</td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-center">
                            <div class="inline-flex items-center gap-1.5">
                                <a href="/maggot/edit" class="inline-flex items-center justify-center w-7 h-7 md:w-8 md:h-8 rounded-lg bg-blue-500 hover:bg-blue-600 text-white transition-all duration-150 shadow-[0_4px_10px_-4px_rgba(59,130,246,0.5)]">
                                    <i class="fa-solid fa-pen-to-square text-[10px] md:text-xs"></i>
                                </a>
                                <button class="inline-flex items-center justify-center w-7 h-7 md:w-8 md:h-8 rounded-lg bg-red-500 hover:bg-red-600 text-white transition-all duration-150 shadow-[0_4px_10px_-4px_rgba(239,68,68,0.5)]">
                                    <i class="fa-solid fa-trash-can text-[10px] md:text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-[#737F35]/10 transition-all duration-150">
                        <td class="px-4 md:px-6 py-3 md:py-4 text-center text-[#0D3B16] font-bold font-mono bg-[#0D3B16]/5">5</td>
                        <td class="px-4 md:px-6 py-3 md:py-4 font-bold text-gray-700">
                            <span class="flex items-center gap-2">
                                <i class="fa-regular fa-calendar text-[#737F35]"></i> 22 Mei 2026
                            </span>
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4">
                            <span class="inline-flex items-center px-2.5 md:px-3 py-1 rounded-xl text-[10px] md:text-xs font-black bg-[#737F35] text-white shadow-sm tracking-wide">
                                <i class="fa-solid fa-weight-scale mr-1.5 text-[9px] md:text-[10px]"></i> 2.9 kg
                            </span>
                        </td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-gray-600 font-semibold max-w-[200px] md:max-w-xs truncate">Log harian rak pemeliharaan pre-pupa</td>
                        <td class="px-4 md:px-6 py-3 md:py-4 text-center">
                            <div class="inline-flex items-center gap-1.5">
                                <a href="/maggot/edit" class="inline-flex items-center justify-center w-7 h-7 md:w-8 md:h-8 rounded-lg bg-blue-500 hover:bg-blue-600 text-white transition-all duration-150 shadow-[0_4px_10px_-4px_rgba(59,130,246,0.5)]">
                                    <i class="fa-solid fa-pen-to-square text-[10px] md:text-xs"></i>
                                </a>
                                <button class="inline-flex items-center justify-center w-7 h-7 md:w-8 md:h-8 rounded-lg bg-red-500 hover:bg-red-600 text-white transition-all duration-150 shadow-[0_4px_10px_-4px_rgba(239,68,68,0.5)]">
                                    <i class="fa-solid fa-trash-can text-[10px] md:text-xs"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="px-4 md:px-6 py-3 md:py-4 bg-gray-50/50 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-3 text-[10px] md:text-xs text-gray-400 font-medium">
            <span>Menampilkan 5 dari 5 entri data</span>
            <div class="inline-flex items-center gap-1">
                <button class="px-2 md:px-3 py-1 md:py-1.5 rounded border border-gray-200 bg-white hover:bg-gray-50 text-gray-500 cursor-not-allowed transition-colors" disabled>Sebelumnya</button>
                <button class="px-2 md:px-3 py-1 md:py-1.5 rounded border border-gray-200 bg-white hover:bg-gray-50 text-gray-500 cursor-not-allowed transition-colors" disabled>Selanjutnya</button>
            </div>
        </div>

    </div>
</div>

@endsection