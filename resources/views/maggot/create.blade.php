@extends('layouts.app')

@section('title', 'Tambah Data Maggot')

@section('content')

<div class="relative z-10 w-full font-sans select-none space-y-4 md:space-y-6">

    <!-- Header Section -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_30px_-10px_rgba(13,59,22,0.08)] border border-white/50 relative overflow-hidden transition-all duration-300">
        <div class="absolute top-0 left-0 right-0 h-[4px] bg-gradient-to-r from-[#0D3B16] via-[#737F35] to-[#233E47]"></div>
        
        <div class="px-4 md:px-6 py-4 md:py-5 flex items-center gap-4 md:gap-5">
            <div class="w-10 h-10 md:w-11 md:h-11 rounded-xl bg-[#0D3B16]/10 flex items-center justify-center text-[#0D3B16] shrink-0 shadow-inner">
                <i class="fa-solid fa-folder-plus text-base md:text-lg"></i>
            </div>
            <div>
                <h1 class="text-lg md:text-xl font-extrabold text-[#0D3B16] tracking-wide uppercase">
                    Tambah Data Maggot
                </h1>
                <p class="text-[10px] md:text-[11px] text-gray-400 font-medium mt-0.5">
                    Formulir pencatatan hasil biomassa budidaya baru
                </p>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="bg-white/60 backdrop-blur-md rounded-2xl p-4 md:p-6 shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] border border-white/50">
        
        <form action="/maggot" method="POST" class="space-y-4 md:space-y-5">
            @csrf 
            
            <div class="space-y-1.5 md:space-y-2">
                <label class="block text-[11px] md:text-xs font-bold text-[#0D3B16] uppercase tracking-wider flex items-center gap-2">
                    <i class="fa-regular fa-calendar-days text-gray-400"></i> Tanggal Pencatatan
                </label>
                <input type="date"
                       name="tanggal"
                       required
                       class="w-full text-xs font-medium text-gray-600 border border-gray-200 bg-white/80 rounded-xl px-3 md:px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#0D3B16] focus:border-transparent transition-all shadow-sm">
            </div>

            <div class="space-y-1.5 md:space-y-2">
                <label class="block text-[11px] md:text-xs font-bold text-[#0D3B16] uppercase tracking-wider flex items-center gap-2">
                    <i class="fa-solid fa-weight-scale text-gray-400"></i> Berat Biomassa (kg)
                </label>
                <div class="relative flex items-center">
                    <input type="number" 
                           step="0.1"
                           min="0"
                           name="berat"
                           placeholder="Contoh: 2.5"
                           required
                           class="w-full text-xs font-semibold text-gray-600 border border-gray-200 bg-white/80 rounded-xl pl-3 md:pl-4 pr-12 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#0D3B16] focus:border-transparent transition-all shadow-sm">
                    <span class="absolute right-3 md:right-4 text-[10px] md:text-[11px] font-bold text-gray-400 bg-gray-100 px-2 py-0.5 rounded border border-gray-200/60">
                        KG
                    </span>
                </div>
            </div>

            <div class="space-y-1.5 md:space-y-2">
                <label class="block text-[11px] md:text-xs font-bold text-[#0D3B16] uppercase tracking-wider flex items-center gap-2">
                    <i class="fa-solid fa-comment-dots text-gray-400"></i> Catatan Keterangan
                </label>
                <textarea name="keterangan"
                          rows="4"
                          placeholder="Masukkan detail tambahan, misal: Hasil panen dari rak pembesaran zona A..."
                          class="w-full text-xs font-medium text-gray-600 border border-gray-200 bg-white/80 rounded-xl px-3 md:px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#0D3B16] focus:border-transparent transition-all shadow-sm resize-none"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center gap-2 md:gap-3 pt-3 md:pt-2 border-t border-gray-100/80">
                <button type="submit"
                        class="w-full sm:w-auto inline-flex justify-center items-center gap-2 px-5 py-2.5 bg-[#0D3B16] hover:bg-[#0A2D11] text-white text-xs font-bold rounded-xl shadow-[0_6px_16px_-4px_rgba(13,59,22,0.25)] hover:shadow-[0_8px_20px_-2px_rgba(13,59,22,0.35)] transition-all duration-200 tracking-wider uppercase">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Simpan Data
                </button>

                <a href="/maggot"
                   class="w-full sm:w-auto inline-flex justify-center items-center gap-2 px-5 py-2.5 bg-white border border-gray-200 hover:bg-gray-50 text-gray-500 text-xs font-bold rounded-xl shadow-sm transition-all duration-150 tracking-wider uppercase text-center">
                    Batal
                </a>
            </div>

        </form>

    </div>
</div>

@endsection