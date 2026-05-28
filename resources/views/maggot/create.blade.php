@extends('layouts.app')
@section('title', 'Tambah Data Maggot')
@section('content')

<div class="relative z-10 w-full font-sans select-none space-y-4 md:space-y-6">

    <!-- Header -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_30px_-10px_rgba(13,59,22,0.08)] border border-white/50 relative overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-[4px] bg-gradient-to-r from-[#0D3B16] via-[#737F35] to-[#233E47]"></div>
        <div class="px-4 md:px-6 py-4 md:py-5 flex items-center gap-4">
            <div class="w-10 h-10 rounded-xl bg-[#0D3B16]/10 flex items-center justify-center text-[#0D3B16] shrink-0">
                <i class="fa-solid fa-folder-plus text-lg"></i>
            </div>
            <div>
                <h1 class="text-lg md:text-xl font-extrabold text-[#0D3B16] uppercase">Tambah Data Maggot</h1>
                <p class="text-xs text-gray-400 mt-0.5">Formulir pencatatan hasil budidaya baru</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white/60 backdrop-blur-md rounded-2xl p-4 md:p-6 border border-white/50">
        <form action="{{ route('maggot.store') }}" method="POST" class="space-y-4 md:space-y-5">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- Tanggal -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#0D3B16] uppercase tracking-wider">
                        <i class="fa-regular fa-calendar-days text-gray-400 mr-1"></i> Tanggal <span class="text-red-400">*</span>
                    </label>
                    <input type="date" name="tanggal" required value="{{ old('tanggal', now()->format('Y-m-d')) }}"
                        class="w-full text-xs font-medium text-gray-600 border border-gray-200 bg-white/80 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#0D3B16] transition-all" />
                </div>

                <!-- Device -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#0D3B16] uppercase tracking-wider">
                        <i class="fa-solid fa-microchip text-gray-400 mr-1"></i> Kandang / Device
                    </label>
                    <select name="device_id"
                        class="w-full text-xs font-medium text-gray-600 border border-gray-200 bg-white/80 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#0D3B16] transition-all">
                        <option value="">— Pilih Kandang (opsional) —</option>
                        @foreach($devices as $device)
                        <option value="{{ $device->id }}" {{ old('device_id') == $device->id ? 'selected' : '' }}>
                            {{ $device->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <!-- Sampah Masuk -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#0D3B16] uppercase tracking-wider">
                        <i class="fa-solid fa-trash text-gray-400 mr-1"></i> Sampah Masuk (kg) <span class="text-red-400">*</span>
                    </label>
                    <div class="relative flex items-center">
                        <input type="number" step="0.1" min="0" name="sampah_masuk" required
                            value="{{ old('sampah_masuk') }}" placeholder="cth: 10.5"
                            class="w-full text-xs font-semibold text-gray-600 border border-gray-200 bg-white/80 rounded-xl pl-4 pr-12 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#0D3B16] transition-all" />
                        <span class="absolute right-3 text-[10px] font-bold text-gray-400 bg-gray-100 px-2 py-0.5 rounded border border-gray-200">kg</span>
                    </div>
                </div>

                <!-- Berat Biomassa -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#0D3B16] uppercase tracking-wider">
                        <i class="fa-solid fa-weight-scale text-gray-400 mr-1"></i> Berat Biomassa (kg) <span class="text-red-400">*</span>
                    </label>
                    <div class="relative flex items-center">
                        <input type="number" step="0.1" min="0" name="berat_biomassa" required
                            value="{{ old('berat_biomassa') }}" placeholder="cth: 2.5"
                            class="w-full text-xs font-semibold text-gray-600 border border-gray-200 bg-white/80 rounded-xl pl-4 pr-12 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#0D3B16] transition-all" />
                        <span class="absolute right-3 text-[10px] font-bold text-gray-400 bg-gray-100 px-2 py-0.5 rounded border border-gray-200">kg</span>
                    </div>
                </div>

                <!-- Hasil Panen -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#0D3B16] uppercase tracking-wider">
                        <i class="fa-solid fa-seedling text-gray-400 mr-1"></i> Hasil Panen (kg)
                    </label>
                    <div class="relative flex items-center">
                        <input type="number" step="0.1" min="0" name="hasil_panen"
                            value="{{ old('hasil_panen') }}" placeholder="cth: 1.5 (opsional)"
                            class="w-full text-xs font-semibold text-gray-600 border border-gray-200 bg-white/80 rounded-xl pl-4 pr-12 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#0D3B16] transition-all" />
                        <span class="absolute right-3 text-[10px] font-bold text-gray-400 bg-gray-100 px-2 py-0.5 rounded border border-gray-200">kg</span>
                    </div>
                </div>
            </div>

            <!-- Keterangan -->
            <div class="space-y-1.5">
                <label class="block text-xs font-bold text-[#0D3B16] uppercase tracking-wider">
                    <i class="fa-solid fa-comment-dots text-gray-400 mr-1"></i> Keterangan
                </label>
                <textarea name="keterangan" rows="3" placeholder="Catatan tambahan, misal: Panen dari rak zona A..."
                    class="w-full text-xs font-medium text-gray-600 border border-gray-200 bg-white/80 rounded-xl px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#0D3B16] transition-all resize-none">{{ old('keterangan') }}</textarea>
            </div>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row items-center gap-2 pt-3 border-t border-gray-100">
                <button type="submit"
                    class="w-full sm:w-auto inline-flex justify-center items-center gap-2 px-5 py-2.5 bg-[#0D3B16] hover:bg-[#0A2D11] text-white text-xs font-bold rounded-xl shadow-md transition-all uppercase tracking-wider">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Data
                </button>
                <a href="{{ route('maggot.index') }}"
                    class="w-full sm:w-auto inline-flex justify-center items-center gap-2 px-5 py-2.5 bg-white border border-gray-200 hover:bg-gray-50 text-gray-500 text-xs font-bold rounded-xl transition-all uppercase tracking-wider">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
