@extends('layouts.app')

@section('title', 'ZAINAL/A // Editor - Motion - Color')

@section('content')
<div class="relative min-h-[calc(100vh-10rem)] flex flex-col justify-between selection:bg-orange-500 selection:text-white">

    <!-- HERO SECTION (Video Editor Style) -->
    <section id="home" class="relative z-10 max-w-7xl w-full mx-auto px-4 py-8 grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
        
        <!-- Left Side: Title & Tagline -->
        <div class="lg:col-span-7 space-y-6">
            <div class="flex items-center space-x-2 font-mono text-xs text-red-500 tracking-widest uppercase">
                <span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span>
                <span>REC ● SHOWREEL 2026</span>
            </div>

            <div class="text-[11px] font-mono text-slate-400 tracking-widest uppercase whitespace-pre-line">
                {{ $profile['titles'] }} — {{ $profile['location'] }}
            </div>

            <h1 class="text-6xl sm:text-7xl lg:text-8xl font-black tracking-tighter text-white uppercase leading-none font-mono">
                PORTOFOLIO<span class="text-orange-500">.</span>
            </h1>
        </div>

        <!-- Right Side: Description & Action Button -->
        <div class="lg:col-span-5 space-y-8 lg:pl-10">
            <p class="text-slate-300 text-sm sm:text-base leading-relaxed font-sans">
                {{ $profile['bio'] }}
            </p>

            <div class="flex flex-wrap items-center gap-6">
                <!-- Showreel Play Button Capsule -->
                <button onclick="togglePlayhead()" class="flex items-center space-x-4 px-5 py-3 rounded-full bg-slate-100 text-slate-950 hover:bg-white transition-all shadow-xl group cursor-pointer">
                    <div class="w-8 h-8 rounded-full bg-slate-950 text-white flex items-center justify-center group-hover:bg-orange-600 transition-colors">
                        <i id="play-icon" class="fa-solid fa-play text-xs ml-0.5"></i>
                    </div>
                    <div class="text-left font-mono">
                        <div class="text-xs font-bold leading-tight">Putar showreel</div>
                        <div class="text-[10px] text-slate-500" id="timecode-sub">00:00:16:20</div>
                    </div>
                </button>

                <a href="#specialized" class="text-xs font-mono text-slate-300 hover:text-white transition-colors flex items-center gap-2">
                    Lihat spesialisasi <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- SPECIALIZED FIELDS SECTION (Dynamic from Controller) -->
    <section id="specialized" class="max-w-7xl w-full mx-auto px-4 py-12 space-y-6">
        <div class="text-center space-y-2">
            <h2 class="poster-heading text-4xl text-white uppercase font-mono">SPECIALIZED FIELDS</h2>
            <p class="text-gray-400 text-sm max-w-2xl mx-auto">Eksplorasi bidang spesialisasi kreatif dan portofolio terkait.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $cat)
                <div class="bg-slate-900/60 border border-slate-800 rounded-xl p-6 flex flex-col justify-between hover:border-orange-500/50 transition-all backdrop-blur">
                    <div class="space-y-4">
                        <!-- Thumbnail Gambar Bidang -->
                        <div class="h-36 rounded-lg overflow-hidden border border-slate-800 relative">
                            <img src="{{ $cat['image'] }}" class="w-full h-full object-cover opacity-80 hover:scale-105 transition-transform duration-500">
                            <span class="absolute top-2 left-2 text-[9px] font-mono bg-slate-950/80 text-orange-400 px-2 py-0.5 rounded border border-slate-800">
                                {{ $cat['period'] }}
                            </span>
                        </div>

                        <!-- Judul & Deskripsi -->
                        <h3 class="text-xl font-bold text-white font-mono">{{ $cat['title'] }}</h3>
                        <p class="text-gray-300 text-xs leading-relaxed">{{ $cat['description'] }}</p>
                        
                        <!-- Tech Stack -->
                        <div class="text-xs space-y-1 font-mono">
                            <span class="text-slate-400 block font-semibold">Tech Stack:</span>
                            <span class="text-orange-300 text-[11px]">{{ $cat['tech'] }}</span>
                        </div>
                    </div>

                    <!-- Skills Tags -->
                    <div class="mt-6 border-t border-slate-800/80 pt-4">
                        <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-2 font-mono">Skills Tag</span>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach($cat['tags'] as $tag)
                                <span class="bg-slate-800 text-slate-300 text-[10px] px-2 py-0.5 rounded border border-slate-700 font-mono">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- BOTTOM VIDEO TIMELINE / FILM ROLL SECTION -->
    <footer id="cv" class="max-w-7xl w-full mx-auto px-4 pb-8 mt-12">
        <div class="flex justify-between items-center mb-2 font-mono text-xs">
            <div class="text-slate-500 select-none">SEQUENCE TIMELINE // V1 & A1</div>
            <div class="text-slate-400 font-mono tracking-widest text-[11px]">
                TC <span id="tc-display" class="text-slate-200">00:01:09:14</span>
            </div>
        </div>

        <!-- Timeline Frame Container -->
        <div class="relative bg-[#0d131f] border border-slate-800/80 rounded-xl p-3 shadow-2xl overflow-hidden">
            
            <!-- PLAYHEAD LINE (Garis Merah Berjalan & Looping) -->
            <div class="absolute top-0 bottom-0 w-[2px] bg-red-500 z-30 pointer-events-none animate-timeline-loop">
                <div class="w-3 h-3 bg-red-500 transform -translate-x-[5px] rotate-45 rounded-sm"></div>
            </div>

            <!-- V1 TRACK (FILM ROLL THUMBNAILS - Dynamic from Categories) -->
            <div class="relative flex items-center space-x-3 py-1">
                <span class="text-[10px] font-mono text-slate-500 w-4 font-bold">V1</span>
                
                <div class="flex-1 grid grid-cols-6 gap-2 overflow-hidden bg-slate-900/60 p-1.5 rounded-lg border border-slate-800/50">
                    @foreach($categories as $cat)
                        <div class="h-16 rounded overflow-hidden relative border border-slate-700/50 bg-slate-800">
                            <img src="{{ $cat['image'] }}" class="w-full h-full object-cover opacity-80">
                            <span class="absolute bottom-1 left-1.5 text-[8px] font-mono text-slate-200 font-semibold bg-black/70 px-1 rounded truncate max-w-[90%]">
                                {{ strtoupper($cat['title']) }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- A1 TRACK (AUDIO WAVEFORM) -->
            <div class="relative flex items-center space-x-3 pt-2">
                <span class="text-[10px] font-mono text-slate-500 w-4 font-bold">A1</span>
                
                <div class="flex-1 h-7 rounded bg-slate-900/80 border border-slate-800/80 px-4 flex items-center overflow-hidden">
                    <div class="flex items-center space-x-[2px] w-full h-full py-1 opacity-75">
                        <div class="w-1 bg-cyan-400 rounded-full h-3"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-5"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-2"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-6"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-4"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-3"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-5"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-2"></div>
                        <div class="w-1 bg-teal-400 rounded-full h-4"></div>
                        <div class="w-1 bg-teal-400 rounded-full h-6"></div>
                        <div class="w-1 bg-teal-400 rounded-full h-3"></div>
                        <div class="w-1 bg-teal-400 rounded-full h-5"></div>
                        <div class="w-1 bg-teal-400 rounded-full h-2"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-5"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-3"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-6"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-4"></div>
                        <div class="w-1 bg-teal-400 rounded-full h-3"></div>
                        <div class="w-1 bg-teal-400 rounded-full h-6"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-2"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-5"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-4"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-6"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-3"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-5"></div>
                        <div class="w-1 bg-teal-400 rounded-full h-3"></div>
                        <div class="w-1 bg-teal-400 rounded-full h-5"></div>
                        <div class="w-1 bg-teal-400 rounded-full h-2"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-6"></div>
                        <div class="w-1 bg-cyan-400 rounded-full h-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>

<!-- CSS KEYFRAMES UNTUK ANIMASI GARIS PLAYHEAD BERJALAN -->
@push('styles')
<style>
@keyframes timelineLoop {
    0% { left: 0%; }
    100% { left: 100%; }
}
.animate-timeline-loop {
    animation: timelineLoop 10s linear infinite;
}
html {
    scroll-behavior: smooth;
}
</style>
@endpush

@push('scripts')
<script>
    function togglePlayhead() {
        const alertBox = document.getElementById('timecode-sub');
        alertBox.innerText = "PLAYING SHOWREEL...";
        setTimeout(() => {
            alertBox.innerText = "00:00:16:20";
        }, 2000);
    }
</script>
@endpush
@endsection