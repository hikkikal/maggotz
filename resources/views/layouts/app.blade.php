<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Smart Maggot Farming</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
    @stack('styles')
</head>
<body class="bg-[#f6faf8] min-h-screen relative overflow-x-hidden antialiased">

    <div class="fixed inset-0 bg-gradient-to-br from-[#f4faf6] via-[#f3f7f8] to-[#faf5f5] z-0 pointer-events-none"></div>
    <div class="fixed top-[5%] left-[25%] w-[300px] md:w-[500px] h-[300px] md:h-[500px] rounded-full bg-[#737F35]/4 blur-[100px] md:blur-[140px] pointer-events-none z-0"></div>
    <div class="fixed bottom-[5%] right-[15%] w-[300px] md:w-[500px] h-[300px] md:h-[500px] rounded-full bg-[#52110F]/3 blur-[100px] md:blur-[140px] pointer-events-none z-0"></div>

    <div class="relative z-10 flex min-h-screen">
        @include('components.sidebar')

        <div class="w-full lg:ml-[240px] flex-1 flex flex-col min-h-screen transition-all duration-300">

            {{-- Topbar --}}
            <div class="w-full h-[65px] md:h-[75px] bg-white/40 backdrop-blur-lg border-b border-gray-200/40 sticky top-0 z-30">
                <div class="max-w-7xl mx-auto h-full flex items-center justify-between px-4 md:px-6">

                    <h1 class="text-lg md:text-2xl font-extrabold text-[#0D3B16] tracking-wide uppercase truncate pr-4">
                        @yield('title', 'Dashboard')
                    </h1>

                    <div class="flex items-center bg-white/60 backdrop-blur-sm border border-gray-200/40 rounded-full px-3 md:px-4 py-1.5 shadow-sm hover:shadow-md transition-all duration-300 shrink-0">

                        {{-- Info User --}}
                        <div class="flex items-center gap-2 md:gap-2.5 pr-2 md:pr-3">
                            <div class="w-7 h-7 md:w-8 md:h-8 flex items-center justify-center rounded-full bg-[#0D3B16]/10 text-[#0D3B16] shadow-inner">
                                <i class="fa fa-user text-[10px] md:text-xs"></i>
                            </div>
                            <span class="text-[11px] md:text-xs font-semibold text-gray-700 tracking-wide hidden sm:block">
                                {{ auth()->user()->name }}
                            </span>
                        </div>

                        <div class="w-px h-4 md:h-5 bg-gray-300/60 mx-1"></div>

                        {{-- Tombol Logout --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-7 h-7 md:w-8 md:h-8 flex items-center justify-center rounded-full text-[#52110F] bg-[#52110F]/5 hover:bg-[#52110F] hover:text-white active:scale-95 transition-all duration-200"
                                title="Keluar Aplikasi">
                                <i class="fa fa-sign-out-alt text-[10px] md:text-xs"></i>
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            {{-- Konten Halaman --}}
            <main class="flex-1 py-4 md:py-6 flex flex-col overflow-x-hidden">
                <div class="max-w-7xl w-full mx-auto px-4 md:px-6 flex-1">
                    @yield('content')
                </div>
            </main>

        </div>
    </div>

    @stack('scripts')
</body>
</html>
