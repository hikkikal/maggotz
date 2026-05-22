@extends('layouts.app')

@section('title', 'Edit Data Maggot')

@section('content')

<div class="relative z-10 w-full font-sans select-none space-y-4 md:space-y-6">

    <!-- Header Section -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_30px_-10px_rgba(13,59,22,0.08)] border border-white/50 relative overflow-hidden transition-all duration-300">
        <div class="absolute top-0 left-0 right-0 h-[4px] bg-[#0D3B16]"></div>
        
        <div class="px-4 md:px-6 py-4 md:py-6 flex items-center gap-4 md:gap-5">
            <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[#0D3B16]/10 flex items-center justify-center text-[#0D3B16] shrink-0 shadow-inner">
                <i class="fa-solid fa-pen-to-square text-lg md:text-xl"></i>
            </div>
            <div>
                <h1 class="text-lg md:text-2xl font-extrabold text-[#0D3B16] tracking-wide uppercase">
                    Edit Data Maggot
                </h1>
                <p class="text-[10px] md:text-xs text-gray-400 font-medium mt-0.5 md:mt-1">
                    Perbarui formulir pencatatan hasil biomassa budidaya yang telah tersimpan
                </p>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="w-full bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_35px_-10px_rgba(0,0,0,0.05)] border border-white/60 p-4 md:p-8">
        
        <form action="/maggot" method="POST" class="space-y-4 md:space-y-5">
            @csrf
            @method('PUT')

            <div class="space-y-1.5 md:space-y-2">
                <label class="inline-flex items-center gap-2 text-[11px] md:text-xs font-black text-[#233E47] uppercase tracking-wider">
                    <i class="fa-regular fa-calendar text-gray-400"></i>
                    Tanggal Pencatatan
                </label>
                <div class="relative">
                    <input type="date" 
                           value="2026-05-10"
                           class="w-full bg-white border border-gray-200 rounded-xl px-3 md:px-4 py-2.5 md:py-3 text-xs md:text-sm text-gray-700 outline-none focus:border-[#0D3B16] focus:ring-1 focus:ring-[#0D3B16] transition-all duration-150 font-medium">
                </div>
            </div>

            <div class="space-y-1.5 md:space-y-2">
                <label class="inline-flex items-center gap-2 text-[11px] md:text-xs font-black text-[#233E47] uppercase tracking-wider">
                    <i class="fa-solid fa-weight-hanging text-gray-400"></i>
                    Berat Biomassa (KG)
                </label>
                <div class="relative flex items-center">
                    <input type="number" 
                           step="0.1" 
                           value="2.3"
                           placeholder="Contoh: 2.5"
                           class="w-full bg-white border border-gray-200 rounded-xl pl-3 md:pl-4 pr-12 py-2.5 md:py-3 text-xs md:text-sm text-gray-700 outline-none focus:border-[#0D3B16] focus:ring-1 focus:ring-[#0D3B16] transition-all duration-150 font-medium">
                    <span class="absolute right-3 md:right-4 text-[10px] md:text-xs font-bold text-gray-400 bg-gray-50 px-2 py-1 rounded border border-gray-100">
                        KG
                    </span>
                </div>
            </div>

            <div class="space-y-1.5 md:space-y-2">
                <label class="inline-flex items-center gap-2 text-[11px] md:text-xs font-black text-[#233E47] uppercase tracking-wider">
                    <i class="fa-regular fa-comment-dot text-gray-400"></i>
                    Catatan Keterangan
                </label>
                <textarea rows="4" 
                          placeholder="Masukkan detail tambahan, misal: Hasil panen dari rak pembesaran zona A..."
                          class="w-full bg-white border border-gray-200 rounded-xl px-3 md:px-4 py-2.5 md:py-3 text-xs md:text-sm text-gray-700 outline-none focus:border-[#0D3B16] focus:ring-1 focus:ring-[#0D3B16] transition-all duration-150 font-medium resize-none">Panen pertama</textarea>
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 flex flex-col sm:flex-row items-center gap-2 md:gap-3 border-t border-gray-100 mt-4 md:mt-6">
                <button type="submit"
                        class="w-full sm:w-auto inline-flex justify-center items-center gap-2 px-5 py-2.5 bg-[#0D3B16] border border-transparent rounded-xl shadow-sm text-[11px] md:text-xs font-bold text-white hover:bg-[#08240e] hover:shadow transition duration-150 uppercase tracking-wider">
                    <i class="fa-solid fa-floppy-disk"></i>
                    Simpan Perubahan
                </button>

                <a href="/maggot"
                   class="w-full sm:w-auto inline-flex justify-center items-center gap-2 px-5 py-2.5 bg-white border border-gray-200 rounded-xl shadow-sm text-[11px] md:text-xs font-bold text-gray-500 hover:bg-gray-50/80 hover:text-gray-700 transition duration-150 uppercase tracking-wider">
                    Batal
                </a>
            </div>

        </form>

    </div>

</div>

@endsection