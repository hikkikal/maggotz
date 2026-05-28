<button id="menuToggle" class="fixed bottom-6 right-6 z-50 md:hidden w-14 h-14 flex items-center justify-center bg-[#0D3B16] text-white rounded-full shadow-[0_10px_25px_-5px_rgba(13,59,22,0.5)] border border-white/20 transition-all active:scale-95 hover:bg-[#0A2D11]">
    <i class="fa fa-bars text-xl"></i>
</button>

<div id="sidebarOverlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-40 hidden md:hidden transition-all duration-300"></div>

<div id="sidebar" class="w-[240px] min-h-screen fixed -left-[240px] md:left-0 top-0 z-50 md:z-40 bg-white flex flex-col border-r border-gray-100 shadow-2xl md:shadow-none transition-all duration-300 ease-in-out">

    <div class="px-6 pt-10 pb-8 flex items-center justify-center border-b border-gray-50/50 relative">
        <button id="closeSidebar" class="absolute top-4 right-4 md:hidden text-gray-400 hover:text-red-500 transition-colors">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <div class="w-32 transition-transform duration-300 hover:scale-105">
            <img src="/images/logo.png" alt="Smart Maggot" class="w-full h-auto object-contain">
        </div>
    </div>

    <nav class="flex-1 px-4 mt-8 space-y-2.5">
        @php
            $menu = [
                ['url' => '/dashboard', 'icon' => 'fa-home', 'label' => 'Dashboard'],
                ['url' => '/devices', 'icon' => 'fa-temperature-half', 'label' => 'Perangkat'],
                ['url' => '/monitoring', 'icon' => 'fa-chart-line', 'label' => 'Monitoring'],
                ['url' => '/maggot', 'icon' => 'fa-database', 'label' => 'Data Maggot'],
                ['url' => '/edukasi', 'icon' => 'fa-book', 'label' => 'Edukasi'],
                ['url' => '/laporan', 'icon' => 'fa-file-alt', 'label' => 'Laporan'],
            ];
        @endphp

        @foreach($menu as $item)
            <a href="{{ $item['url'] }}"
               class="flex items-center gap-4 px-4 h-12 rounded-xl transition-all duration-200 group {{ request()->is(ltrim($item['url'], '/').'*') ? 'bg-[#0D3B16] text-white shadow-lg shadow-[#0D3B16]/20' : 'text-gray-500 hover:text-[#0D3B16] hover:bg-gray-50' }}">
                <i class="fa {{ $item['icon'] }} w-5 text-center transition-colors"></i>
                <span class="text-sm font-semibold tracking-wide">{{ $item['label'] }}</span>
            </a>
        @endforeach
    </nav>

    <div class="p-4 border-t border-gray-50">
        <a href="/login" class="flex items-center justify-center gap-3 w-full h-12 rounded-xl bg-red-50 text-[#52110F] hover:bg-[#52110F] hover:text-white transition-all duration-200 group">
            <i class="fa fa-sign-out-alt text-sm transition-transform group-hover:-translate-x-1"></i>
            <span class="text-sm font-bold tracking-wide">LOGOUT</span>
        </a>
    </div>
</div>

<script>
    const menuToggle = document.getElementById('menuToggle');
    const closeSidebarBtn = document.getElementById('closeSidebar');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    function toggleSidebar() {
        sidebar.classList.toggle('-left-[240px]');
        sidebar.classList.toggle('left-0');
        overlay.classList.toggle('hidden');
    }

    // Event listener untuk buka tutup sidebar
    menuToggle.addEventListener('click', toggleSidebar);
    overlay.addEventListener('click', toggleSidebar);

    // Tambahan fungsi close via tombol (X)
    if(closeSidebarBtn) {
        closeSidebarBtn.addEventListener('click', toggleSidebar);
    }
</script>
