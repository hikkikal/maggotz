<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Smart Maggot</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        /* Animasi Masuk Halus */
        @keyframes cardIn {
            0% { opacity: 0; transform: translateY(20px) scale(0.98); }
            100% { opacity: 1; transform: translateY(0) scale(1); }
        }
        .card-animation { animation: cardIn 0.7s cubic-bezier(0.16, 1, 0.3, 1) forwards; }

        /* Default (Mobile): Lengkungan wave di bawah */
        .smooth-wave {
            -webkit-clip-path: url(#wave-clip-mobile);
            clip-path: url(#wave-clip-mobile);
        }

        /* Desktop/Tablet: Lengkungan wave di samping kanan */
        @media (min-width: 768px) {
            .smooth-wave {
                -webkit-clip-path: url(#wave-clip);
                clip-path: url(#wave-clip);
            }
        }

        /* Override Autofill Browser */
        input:-webkit-autofill,
        input:-webkit-autofill:hover, 
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-background-clip: text;
            -webkit-text-fill-color: #0D3B16 !important;
            transition: background-color 5000s ease-in-out 0s;
            box-shadow: inset 0 0 0 20px #ffffff !important;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center font-sans relative px-4 bg-[#f2f7f4] overflow-x-hidden">

    <div class="absolute inset-0 bg-gradient-to-br from-[#d4ebd9] via-[#d3e3e7] to-[#edd6d5] z-0"></div>

    <div class="absolute top-[5%] md:top-[10%] left-[5%] md:left-[15%] w-[250px] md:w-[400px] h-[250px] md:h-[400px] rounded-full bg-[#737F35]/20 blur-[80px] md:blur-[120px] pointer-events-none z-0"></div>
    <div class="absolute bottom-[5%] md:bottom-[10%] right-[5%] md:right-[15%] w-[250px] md:w-[400px] h-[250px] md:h-[400px] rounded-full bg-[#52110F]/10 blur-[80px] md:blur-[120px] pointer-events-none z-0"></div>

    <svg width="0" height="0" class="absolute">
        <defs>
            <clipPath id="wave-clip" clipPathUnits="objectBoundingBox">
                <path d="M 0,0 
                         L 0.82,0 
                         C 0.95,0.25 0.75,0.45 0.88,0.70 
                         C 0.95,0.85 0.80,0.95 0.75,1 
                         L 0,1 Z" />
            </clipPath>

            <clipPath id="wave-clip-mobile" clipPathUnits="objectBoundingBox">
                <path d="M 0,0 
                         L 1,0 
                         L 1,0.85 
                         C 0.75,1 0.25,0.70 0,0.9 
                         Z" />
            </clipPath>
        </defs>
    </svg>

    <div class="relative w-full max-w-[420px] md:max-w-[960px] min-h-[520px] md:h-[560px] bg-[#0D3B16] rounded-[24px] md:rounded-[32px] overflow-hidden shadow-[0_30px_70px_-15px_rgba(13,59,22,0.3)] flex flex-col md:flex-row card-animation z-10">

        <div class="relative w-full md:w-[55%] bg-white smooth-wave z-10 flex items-center justify-center p-6 md:p-12 overflow-hidden pt-12 pb-[72px] md:py-12 shrink-0">
            
            <div class="absolute top-[-20%] left-[-10%] w-[180px] md:w-[250px] h-[180px] md:h-[250px] rounded-full bg-[#737F35]/10 blur-2xl md:blur-3xl pointer-events-none"></div>
            <div class="absolute bottom-[-20%] right-[10%] w-[150px] md:w-[220px] h-[150px] md:h-[220px] rounded-full bg-[#EAD39D]/20 blur-2xl md:blur-3xl pointer-events-none"></div>

            <div class="w-full max-w-[160px] md:max-w-[310px] md:pr-10 transition-all duration-500 hover:scale-105 hover:drop-shadow-[0_0_25px_rgba(13,59,22,0.4)] z-20">
                <img src="/images/logo.png" alt="Smart Maggot Farming Logo" class="w-full h-auto object-contain mx-auto">
            </div>
        </div>

        <div class="w-full md:w-[45%] bg-transparent flex flex-col justify-center items-center lg:px-14 md:px-10 px-8 pb-10 pt-4 md:py-0 z-20 md:my-auto">
            <div class="w-full max-w-[300px] text-white">

                <h1 class="text-2xl md:text-[32px] font-bold tracking-wider text-center uppercase mb-6 md:mb-8 text-white">
                    LOGIN
                </h1>

                <form action="/dashboard" id="loginForm" class="space-y-4">

                    <div>
                        <label class="block mb-1.5 text-xs font-normal text-white/85 tracking-wide">Username</label>
                        <div class="group flex items-center bg-white focus-within:ring-2 focus-within:ring-[#EAD39D] rounded-xl px-4 transition-all duration-200 shadow-sm">
                            <i class="fa-regular fa-user text-[#0D3B16]/60 group-focus-within:text-[#0D3B16] transition-colors mr-3 text-sm"></i>
                            <input type="text" required placeholder="Masukkan username" autocomplete="username"
                                class="w-full h-[44px] bg-transparent outline-none text-sm text-[#0D3B16] placeholder-[#0D3B16]/40 font-medium">
                        </div>
                    </div>

                    <div>
                        <label class="block mb-1.5 text-xs font-normal text-white/85 tracking-wide">Password</label>
                        <div class="group flex items-center bg-white focus-within:ring-2 focus-within:ring-[#EAD39D] rounded-xl px-4 transition-all duration-200 shadow-sm">
                            <i class="fa fa-lock text-[#0D3B16]/60 group-focus-within:text-[#0D3B16] transition-colors mr-3 text-sm"></i>
                            <input type="password" id="passwordInput" required placeholder="Masukkan password" autocomplete="current-password"
                                class="w-full h-[44px] bg-transparent outline-none text-sm text-[#0D3B16] placeholder-[#0D3B16]/40 font-medium">
                            <button type="button" id="togglePassword" class="focus:outline-none flex items-center">
                                <i id="eyeIcon" class="fa fa-eye-slash text-[#0D3B16]/50 hover:text-[#0D3B16] transition-colors ml-2 cursor-pointer text-sm"></i>
                            </button>
                        </div>
                    </div>

                    <div class="pt-2 md:pt-4">
                        <button type="submit"
                            class="w-full h-[44px] rounded-xl font-bold text-sm tracking-wide
                                   bg-[#EAD39D] text-[#0A2012] shadow-md
                                   hover:bg-[#e2c68a] hover:shadow-lg active:scale-[0.99] transition-all duration-150">
                            LOGIN
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

    <script>
        const passwordInput = document.getElementById('passwordInput');
        const togglePassword = document.getElementById('togglePassword');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', function () {
            const isPassword = passwordInput.getAttribute('type') === 'password';
            passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
            
            if (isPassword) {
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
                eyeIcon.classList.remove('text-[#0D3B16]/50');
                eyeIcon.classList.add('text-[#0D3B16]');
            } else {
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
                eyeIcon.classList.remove('text-[#0D3B16]');
                eyeIcon.classList.add('text-[#0D3B16]/50');
            }
        });
    </script>

</body>
</html>