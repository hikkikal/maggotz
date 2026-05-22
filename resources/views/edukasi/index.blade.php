@extends('layouts.app')

@section('title', 'Modul Edukasi & Quiz')

@section('content')

<div class="relative z-10 w-full font-sans select-none space-y-4 md:space-y-6">

    <!-- Header Section -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_30px_-10px_rgba(13,59,22,0.08)] border border-white/50 relative overflow-hidden transition-all duration-300">
        <div class="absolute top-0 left-0 right-0 h-[4px] bg-[#0D3B16]"></div>
        
        <div class="px-4 md:px-6 py-4 md:py-6 flex items-center gap-4 md:gap-5">
            <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-[#0D3B16]/10 flex items-center justify-center text-[#0D3B16] shrink-0 shadow-inner">
                <i class="fa-solid fa-graduation-cap text-lg md:text-xl"></i>
            </div>
            <div>
                <h1 class="text-lg md:text-2xl font-extrabold text-[#0D3B16] tracking-wide uppercase">
                    Modul Edukasi
                </h1>
                <p class="text-[10px] md:text-xs text-gray-400 font-medium mt-0.5 md:mt-1">
                    Pelajari konsep Circular Economy dan optimalisasi pengelolaan biowaste menggunakan Maggot BSF
                </p>
            </div>
        </div>
    </div>

    <!-- Educational Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">

        <div class="bg-white/60 backdrop-blur-md rounded-2xl shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] border border-white/50 overflow-hidden flex flex-col justify-between">
            <div>
                <div class="bg-[#0D3B16] text-white px-4 md:px-6 py-3 md:py-4 font-bold text-xs md:text-sm uppercase tracking-wider flex items-center gap-2">
                    <i class="fa-solid fa-bug"></i> Apa itu Maggot BSF?
                </div>
                <div class="p-4 md:p-6 text-[11px] md:text-sm text-gray-600 leading-relaxed space-y-3">
                    <p>
                        <strong class="text-[#0D3B16]">Maggot BSF (Black Soldier Fly)</strong> adalah fase larva dari lalat tentara hitam (*Hermetia illucens*). Berbeda dengan lalat rumah, lalat BSF dewasa tidak membawa penyakit dan tidak memiliki structure mulut untuk menggigit.
                    </p>
                    <p>
                        Larva ini memiliki kemampuan luar biasa dalam mengurai berbagai jenis <span class="font-semibold text-gray-800">sampah organik</span> (biowaste) hingga 4 kali bobot tubuhnya dalam sehari, menjadikannya agen biokonversi paling efisien saat ini.
                    </p>
                </div>
            </div>
            <div class="px-4 md:px-6 py-2.5 md:py-3 bg-gray-50/50 border-t border-gray-100/80 text-[10px] md:text-[11px] font-bold text-[#737F35] flex items-center gap-1.5">
                <i class="fa-solid fa-seedling"></i> Agen Biokonversi Alami
            </div>
        </div>

        <div class="bg-white/60 backdrop-blur-md rounded-2xl shadow-[0_10px_30px_-10px_rgba(0,0,0,0.03)] border border-white/50 overflow-hidden flex flex-col justify-between">
            <div>
                <div class="bg-[#233E47] text-white px-4 md:px-6 py-3 md:py-4 font-bold text-xs md:text-sm uppercase tracking-wider flex items-center gap-2">
                    <i class="fa-solid fa-arrows-spin"></i> Konsep Circular Economy
                </div>
                <div class="p-4 md:p-6 text-[11px] md:text-sm text-gray-600 leading-relaxed space-y-3">
                    <p>
                        <strong class="text-[#233E47]">Circular Economy</strong> atau ekonomi sirkular adalah model alternatif dari ekonomi linier tradisional (ambil-pakai-buang). Konsep ini berfokus pada minimalisasi limbah dengan mempertahankan nilai produk dan bahan selama mungkin.
                    </p>
                    <p>
                        Dalam budidaya BSF, limbah domestik perkotaan tidak lagi berakhir menumpuk di TPA, melainkan diubah menjadi residu organik bernilai tinggi berupa <span class="font-semibold text-gray-800">pupuk kasgot</span> (bekas maggot) serta biomassa maggot segar untuk pakan alternatif.
                    </p>
                </div>
            </div>
            <div class="px-4 md:px-6 py-2.5 md:py-3 bg-gray-50/50 border-t border-gray-100/80 text-[10px] md:text-[11px] font-bold text-[#233E47] flex items-center gap-1.5">
                <i class="fa-solid fa-recycle"></i> Sistem Keberlanjutan Zero-Waste
            </div>
        </div>

    </div>

    <!-- Quiz Section -->
    <div class="bg-white/70 backdrop-blur-md rounded-2xl shadow-[0_12px_35px_-10px_rgba(0,0,0,0.05)] border border-white/60 overflow-hidden">
        
        <div class="bg-[#737F35] text-white px-4 md:px-6 py-3 md:py-4 flex items-center justify-between">
            <div class="flex items-center gap-2.5 md:gap-3">
                <div class="w-7 h-7 md:w-8 md:h-8 rounded-lg bg-white/20 flex items-center justify-center text-white backdrop-blur-sm">
                    <i class="fa-solid fa-clipboard-question text-[10px] md:text-xs"></i>
                </div>
                <div>
                    <h2 class="font-extrabold text-[11px] md:text-sm uppercase tracking-wider">Evaluasi Kemampuan</h2>
                    <p class="text-[9px] md:text-[10px] text-white/70 font-medium">Uji pemahaman Anda melalui 10 soal</p>
                </div>
            </div>
            <div id="quiz-progress-badge" class="px-2 md:px-3 py-1 rounded-full bg-white/10 border border-white/20 text-[9px] md:text-[10px] font-black tracking-widest uppercase shrink-0">
                Soal 1 / 10
            </div>
        </div>

        <div class="w-full h-[3px] bg-gray-100 relative">
            <div id="quiz-progress-bar" class="absolute top-0 left-0 bottom-0 bg-[#0D3B16] transition-all duration-300" style="width: 10%"></div>
        </div>

        <div class="p-4 md:p-6">
            
            <div id="question-screen" class="space-y-4 md:space-y-5">
                <div class="space-y-1">
                    <span class="text-[9px] md:text-[10px] uppercase font-bold text-[#737F35] tracking-widest block" id="question-category">Kategori: Biokonversi</span>
                    <h3 class="text-[13px] md:text-base font-extrabold text-[#0D3B16] leading-snug" id="question-text">
                        Loading pertanyaan...
                    </h3>
                </div>

                <div class="grid grid-cols-1 gap-2 md:gap-2.5" id="options-container">
                    <!-- Options injected via JS -->
                </div>

                <div id="feedback-box" class="hidden p-3 md:p-4 rounded-xl border text-[11px] md:text-xs leading-relaxed transition-all duration-200">
                    <div class="flex items-start gap-2.5">
                        <div id="feedback-icon" class="w-5 h-5 rounded-md flex items-center justify-center text-white shrink-0 mt-0.5"></div>
                        <div>
                            <span id="feedback-status" class="font-bold block uppercase tracking-wide text-[10px] mb-0.5"></span>
                            <p id="feedback-rationale" class="text-gray-600 font-medium"></p>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-end pt-3 border-t border-gray-100/80">
                    <button id="btn-action" onclick="handleQuizAction()" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-[#0D3B16] hover:bg-[#0A2D11] text-white text-[11px] md:text-xs font-bold rounded-xl shadow-md transition-all duration-150 uppercase tracking-wider">
                        <span>Periksa Jawaban</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </button>
                </div>
            </div>

            <div id="result-screen" class="hidden py-6 md:py-8 flex flex-col items-center text-center space-y-5 md:space-y-6 animate-fade-in">
                <div class="w-20 h-20 md:w-24 md:h-24 rounded-full border-[3px] border-[#0D3B16] p-0.5 shadow-lg">
                    <div class="w-full h-full bg-white rounded-full flex flex-col items-center justify-center">
                        <span id="final-score" class="text-2xl md:text-3xl font-black text-[#0D3B16] font-mono leading-none">0</span>
                        <span class="text-[9px] md:text-[10px] font-bold text-gray-400 uppercase tracking-wider mt-1">Skor Total</span>
                    </div>
                </div>

                <div class="max-w-md space-y-1.5 md:space-y-2">
                    <h3 class="text-base md:text-lg font-extrabold text-[#0D3B16]" id="result-title">Luar Biasa!</h3>
                    <p class="text-[11px] md:text-xs text-gray-500 font-medium leading-relaxed" id="result-desc">
                        Anda telah menyelesaikan seluruh rangkaian piringan edukasi siklus keberlanjutan limbah organik.
                    </p>
                </div>

                <div class="w-full max-w-xs bg-gray-50/80 rounded-xl p-4 border border-gray-100 text-left space-y-2 text-[11px] md:text-xs text-gray-600 font-medium">
                    <div class="flex justify-between"><span>Benar:</span><span id="stat-correct" class="font-bold text-green-700">0</span></div>
                    <div class="flex justify-between"><span>Salah:</span><span id="stat-wrong" class="font-bold text-[#52110F]">0</span></div>
                </div>

                <button onclick="restartQuiz()" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-2.5 bg-[#233E47] hover:bg-[#1A2E35] text-white text-[11px] md:text-xs font-bold rounded-xl shadow-sm transition-all duration-150 uppercase tracking-wider">
                    <i class="fa-solid fa-rotate-left"></i> Ulangi Kuis
                </button>
            </div>

        </div>
    </div>
</div>

<script>
const quizData = [
    {
        category: "Kategori: Pengenalan Biologi",
        question: "Apakah nama ilmiah dari lalat Black Soldier Fly (BSF) yang larvanya digunakan untuk mereduksi sampah?",
        options: ["Musca domestica", "Hermetia illucens", "Drosophila melanogaster", "Anopheles sundaicus"],
        correct: 1,
        rationale: "Hermetia illucens merupakan nama binomial resmi dari Black Soldier Fly, sedangkan Musca domestica merupakan klasifikasi untuk lalat rumah biasa."
    },
    {
        category: "Kategori: Karakteristik Fisik",
        question: "Mengapa lalat BSF dewasa tidak digolongkan sebagai vektor penyebar penyakit bagi pemukiman manusia?",
        options: [
            "Karena lalat dewasa tidak memiliki bagian mulut fungsional untuk makan",
            "Karena siklus hidupnya hanya berlangsung dalam hitungan menit saja",
            "Karena lalat BSF selalu hidup terisolasi di dalam air bersih",
            "Karena tubuh lalat BSF mengandung senyawa disinfektan alami"
        ],
        correct: 0,
        rationale: "Lalat BSF dewasa tidak memiliki bagian mulut fungsional untuk mengunyah/makan, mereka hanya minum air embun dan fokus bereproduksi selama sisa umurnya, sehingga tidak tertarik mendekati makanan manusia."
    },
    {
        category: "Kategori: Manajemen Pakan",
        question: "Jenis limbah manakah di bawah ini yang paling optimal dan aman didegradasi oleh koloni maggot BSF?",
        options: ["Sisa sayur, buah, dan sisa nasi dapur", "Plastik kemasan PET dan styrofoam", "Kertas karton laminasi tebal", "Limbah medis cair kimiawi"],
        correct: 0,
        rationale: "Maggot BSF merupakan dekomposer bahan organik alami. Mereka membutuhkan nutrisi makro yang terdapat pada sisa makanan nabati maupun hewani untuk tumbuh."
    },
    {
        category: "Kategori: Circular Economy",
        question: "Dalam siklus ekonomi sirkular, apa nama produk sampingan berupa pupuk organik dari sisa pakan dan kotoran maggot?",
        options: ["Kompos cair kimia", "Kasgot (Bekas Maggot)", "Biochar sekam", "Humus gambut murni"],
        correct: 1,
        rationale: "Kasgot (bekas maggot) merupakan limbah sisa pencernaan larva BSF yang sangat kaya unsur nitrogen dan mikroorganisme baik untuk menyuburkan tanaman."
    },
    {
        category: "Kategori: Optimasi Budidaya",
        question: "Berapakah rata-hari rasio kemampuan konsumsi sampah organik harian oleh larva maggot jika dibandingkan dengan bobot tubuhnya sendiri?",
        options: ["Hanya setengah dari berat badannya", "Sama dengan berat badannya sendiri", "Mencapai 2 hingga 4 kali lipat berat badannya", "Mencapai 50 kali lipat berat badannya"],
        correct: 2,
        rationale: "Larva maggot BSF terkenal sangat rakus, mereka mampu mengonsumsi biowaste segar berkisar antara 2 hingga 4 kali lipat dari berat tubuh koloni mereka per hari."
    },
    {
        category: "Kategori: Manfaat Output",
        question: "Mengapa biomassa maggot BSF sangat bernilai tinggi bagi sektor peternakan dan perikanan?",
        options: [
            "Karena kandungan serat kasarnya menyerupai kayu",
            "Sebab kaya akan kandungan protein tinggi dan asam amino",
            "Karena mampu hidup selamanya tanpa perlu dikeringkan",
            "Sebab memancarkan aroma harum yang memikat pemangsa"
        ],
        correct: 1,
        rationale: "Kadar protein kasar maggot yang tinggi menjadikannya alternatif substitusi tepung ikan impor yang mahal untuk formulasi pakan unggas dan ikan."
    },
    {
        category: "Kategori: Fase Hidup (Siklus)",
        question: "Urutan siklus hidup lalat Black Soldier Fly (BSF) yang benar dari awal hingga akhir adalah...",
        options: [
            "Telur → Larva (Maggot) → Prepupa → Pupa → Lalat Dewasa",
            "Lalat Dewasa → Pupa → Telur → Larva",
            "Telur → Pupa → Larva → Lalat Dewasa",
            "Larva → Telur → Prepupa → Lalat Dewasa"
        ],
        correct: 0,
        rationale: "Siklus metamorfosis sempurna BSF dimulai dari fase penetasan telur, berkembang menjadi larva pemburu makanan, mengeras menjadi prepupa/pupa, lalu menetas menjadi lalat."
    },
    {
        category: "Kategori: Faktor Lingkungan",
        question: "Kondisi lingkungan seperti apa yang dapat menghambat pertumbuhan optimal dalam ruang pembesaran biokonversi maggot?",
        options: [
            "Suhu ruangan yang hangat (sekitar 30°C)",
            "Kondisi media pakan yang terlalu becek dan basah menggenang",
            "Sirikulasi udara ruangan yang lancar",
            "Tingkat kelembapan udara yang stabil"
        ],
        correct: 1,
        rationale: "Media yang terlalu basah menggenang memicu pembusukan anaerob yang menimbulkan bau menyengat dan membuat maggot berusaha bermigrasi kabur keluar dari wadah."
    },
    {
        category: "Kategori: Keberlanjutan Lingkungan",
        question: "Bagaimana integrasi sistem biokonversi maggot BSF membantu mengurangi efek rumah kaca global?",
        options: [
            "Dengan menyerap radiasi sinar ultraviolet matahari langsung",
            "Mencegah penumpukan sampah organik yang membusuk secara anaerob di TPA",
            "Mengubah gas karbon menjadi oksigen secara fotosintesis",
            "Menghilangkan fungsi plastik sekali pakai secara instan"
        ],
        correct: 1,
        rationale: "Degradasi cepat oleh maggot mengalihkan sampah organik dari sistem TPA konvensional, sehingga memotong produksi emisi gas metana berbahaya secara signifikan."
    },
    {
        category: "Kategori: Pengetahuan Komersial",
        question: "Pada fase siklus hidup manakah maggot BSF harus segera dipanen jika target utamanya adalah untuk dijadikan pakan hidup berprotein tinggi bagi ikan?",
        options: [
            "Saat masih berupa telur",
            "Ketika berada pada puncak fase Larva aktif (sebelum menjadi prepupa)",
            "Saat sudah menjadi Pupa keras tak bergerak",
            "Menunggu hingga berubah menjadi Lalat terbang"
        ],
        correct: 1,
        rationale: "Pada akhir fase larva aktif, kandungan nutrisi, lemak baik, dan protein berada pada titik tertinggi sebelum energinya terkuras untuk pembentukan cangkang chitin keras di fase prepupa."
    }
];

let currentQuestionIndex = 0;
let userScore = 0;
let isAnswerChecked = false;

const questionScreen = document.getElementById('question-screen');
const resultScreen = document.getElementById('result-screen');
const categoryEl = document.getElementById('question-category');
const textEl = document.getElementById('question-text');
const optionsContainer = document.getElementById('options-container');
const feedbackBox = document.getElementById('feedback-box');
const feedbackIcon = document.getElementById('feedback-icon');
const feedbackStatus = document.getElementById('feedback-status');
const feedbackRationale = document.getElementById('feedback-rationale');
const btnAction = document.getElementById('btn-action');
const progressBadge = document.getElementById('quiz-progress-badge');
const progressBar = document.getElementById('quiz-progress-bar');

function renderQuestion() {
    isAnswerChecked = false;
    feedbackBox.classList.add('hidden');
    btnAction.innerHTML = `<span>Periksa Jawaban</span> <i class="fa-solid fa-arrow-right text-[10px]"></i>`;
    
    let currentData = quizData[currentQuestionIndex];
    
    progressBadge.innerText = `Soal ${currentQuestionIndex + 1} / ${quizData.length}`;
    progressBar.style.width = `${((currentQuestionIndex + 1) / quizData.length) * 100}%`;
    
    categoryEl.innerText = currentData.category;
    textEl.innerText = currentData.question;
    
    optionsContainer.innerHTML = '';
    currentData.options.forEach((option, idx) => {
        const label = document.createElement('label');
        /* Penyesuaian class untuk mobile */
        label.className = "flex items-start md:items-center gap-3 p-3 md:p-3.5 bg-white/90 border border-gray-200/80 rounded-xl hover:bg-gray-50/80 cursor-pointer transition-all duration-150 text-[11px] md:text-xs font-semibold text-gray-700 relative shadow-sm";
        label.setAttribute('data-index', idx);
        label.innerHTML = `
            <input type="radio" name="maggot_quiz_opt" value="${idx}" class="w-3.5 h-3.5 md:w-4 md:h-4 mt-0.5 md:mt-0 accent-[#0D3B16] cursor-pointer shrink-0">
            <span class="leading-snug">${option}</span>
        `;
        optionsContainer.appendChild(label);
    });
}

function handleQuizAction() {
    if (!isAnswerChecked) {
        const selectedRadio = document.querySelector('input[name="maggot_quiz_opt"]:checked');
        if (!selectedRadio) {
            alert("Silakan pilih salah satu opsi jawaban terlebih dahulu!");
            return;
        }
        
        const selectedIndex = parseInt(selectedRadio.value);
        const correctIndex = quizData[currentQuestionIndex].correct;
        const labels = optionsContainer.querySelectorAll('label');
        
        optionsContainer.querySelectorAll('input').forEach(input => input.disabled = true);
        
        if (selectedIndex === correctIndex) {
            userScore += 10;
            labels[selectedIndex].classList.remove('border-gray-200/80');
            labels[selectedIndex].classList.add('border-green-600', 'bg-green-50/30', 'text-green-800');
            
            feedbackBox.className = "p-3 md:p-4 rounded-xl border border-green-200 bg-green-50/20 text-[11px] md:text-xs leading-relaxed animate-slide-up";
            feedbackIcon.className = "w-4 h-4 md:w-5 md:h-5 rounded-md flex items-center justify-center bg-green-700 text-white shrink-0 mt-0.5";
            feedbackIcon.innerHTML = `<i class="fa-solid fa-circle-check text-[10px] md:text-xs"></i>`;
            feedbackStatus.className = "font-bold block uppercase tracking-wide text-[9px] md:text-[10px] text-green-700 mb-0.5";
            feedbackStatus.innerText = "Jawaban Tepat! 🎉";
        } else {
            labels[selectedIndex].classList.remove('border-gray-200/80');
            labels[selectedIndex].classList.add('border-[#52110F]', 'bg-red-50/30', 'text-[#52110F]');
            
            labels[correctIndex].classList.remove('border-gray-200/80');
            labels[correctIndex].classList.add('border-green-500', 'bg-green-50/20');
            
            feedbackBox.className = "p-3 md:p-4 rounded-xl border border-red-200 bg-red-50/20 text-[11px] md:text-xs leading-relaxed animate-slide-up";
            feedbackIcon.className = "w-4 h-4 md:w-5 md:h-5 rounded-md flex items-center justify-center bg-[#52110F] text-white shrink-0 mt-0.5";
            feedbackIcon.innerHTML = `<i class="fa-solid fa-circle-xmark text-[10px] md:text-xs"></i>`;
            feedbackStatus.className = "font-bold block uppercase tracking-wide text-[9px] md:text-[10px] text-[#52110F] mb-0.5";
            feedbackStatus.innerText = "Kurang Tepat ❌";
        }
        
        feedbackRationale.innerText = quizData[currentQuestionIndex].rationale;
        feedbackBox.classList.remove('hidden');
        
        isAnswerChecked = true;
        if (currentQuestionIndex === quizData.length - 1) {
            btnAction.innerHTML = `<span>Lihat Hasil Akhir</span> <i class="fa-solid fa-square-poll-vertical text-[10px]"></i>`;
        } else {
            btnAction.innerHTML = `<span>Pertanyaan Selanjutnya</span> <i class="fa-solid fa-circle-chevron-right text-[10px]"></i>`;
        }
    } else {
        if (currentQuestionIndex < quizData.length - 1) {
            currentQuestionIndex++;
            renderQuestion();
        } else {
            showFinalResults();
        }
    }
}

function showFinalResults() {
    questionScreen.classList.add('hidden');
    resultScreen.classList.remove('hidden');
    
    document.getElementById('final-score').innerText = userScore;
    
    let correctCount = userScore / 10;
    let wrongCount = quizData.length - correctCount;
    
    document.getElementById('stat-correct').innerText = `${correctCount} Soal`;
    document.getElementById('stat-wrong').innerText = `${wrongCount} Soal`;
    
    const resTitle = document.getElementById('result-title');
    const resDesc = document.getElementById('result-desc');
    
    if (userScore === 100) {
        resTitle.innerText = "Nilai Sempurna! 🌟";
        resDesc.innerText = "Luar biasa! Anda telah sepenuhnya menguasai prinsip sirkular ekonomi dan pemanfaatan biokonversi Maggot BSF.";
    } else if (userScore >= 70) {
        resTitle.innerText = "Kerja Bagus! 👍";
        resDesc.innerText = "Pemahaman Anda sudah sangat matang dan siap dipraktikkan langsung pada sistem manajemen log siklus budidaya.";
    } else {
        resTitle.innerText = "Tetap Semangat! 📚";
        resDesc.innerText = "Jangan berkecil hati. Pelajari kembali materi modul di atas untuk lebih memahami mekanisme konversi sampah organik.";
    }
}

function restartQuiz() {
    currentQuestionIndex = 0;
    userScore = 0;
    resultScreen.classList.add('hidden');
    questionScreen.classList.remove('hidden');
    renderQuestion();
}

document.addEventListener('DOMContentLoaded', () => {
    renderQuestion();
});
</script>

<style>
@keyframes slideUp {
    from { opacity: 0; transform: translateY(8px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-slide-up {
    animation: slideUp 0.25s ease-out forwards;
}
</style>

@endsection