<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile['name'] }} | Portfolio & CV</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { red: '#E50914', dark: '#0B0D10', card: '#14181F', border: '#2A303C', muted: '#8C9B9E' }
                    }
                }
            }
        }
    </script>
    <style>
        .poster-heading { font-family: 'Impact', 'Bebas Neue', sans-serif; letter-spacing: 0.05em; }
        @keyframes timelineLoop {
            0% { left: 0%; }
            100% { left: 100%; }
        }
        .animate-timeline-loop {
            animation: timelineLoop 12s linear infinite;
        }
        /* Custom scrollbar untuk timeline roll film */
        .timeline-scroll::-webkit-scrollbar {
            height: 4px;
        }
        .timeline-scroll::-webkit-scrollbar-track {
            background: #090d16;
        }
        .timeline-scroll::-webkit-scrollbar-thumb {
            background: #2a303c;
            border-radius: 4px;
        }
    </style>
</head>
<body class="bg-brand-dark text-gray-100 font-sans antialiased min-h-screen flex flex-col justify-between selection:bg-orange-500 selection:text-white">

    <!-- Navbar dengan Menu Google Drive -->
    <nav class="sticky top-0 z-50 bg-brand-dark/95 backdrop-blur-md border-b border-brand-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="#home" class="poster-heading text-2xl tracking-wider text-white">
                {{ $profile['name'] }} <span class="text-brand-red">.</span>
            </a>
            <div class="flex items-center gap-6 text-sm font-medium">
                <a href="#home" class="hover:text-brand-red transition-colors">Home</a>
                <a href="#cv" class="hover:text-brand-red transition-colors">CV</a>
                <a href="#experience" class="hover:text-brand-red transition-colors">specialization</a>
                <a href="#gdrive" class="hover:text-brand-red transition-colors">Experience</a>
            </div>
        </div>
    </nav>

    <!-- Main Content Container -->
    <main class="w-full flex-grow">

        <!-- 1. LANDING PAGE (Hero Section dengan Timeline di Bagian Bawah) -->
        <section id="home" class="relative min-h-[92vh] flex flex-col justify-between pt-12 pb-6 px-6 sm:px-12 lg:px-20 overflow-hidden bg-black">

            <!-- Background Video Looping -->
            <div class="absolute inset-0 z-0 overflow-hidden">
                <video autoplay muted loop playsinline class="w-full h-full object-cover object-center">
                    <source src="{{ asset('videos/landing.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>s
            <div class="absolute inset-0 bg-black/75 z-10"></div>

            <!-- Konten Utama Hero (Di Tengah) -->
            <div class="relative z-20 max-w-7xl w-full mx-auto grid grid-cols-1 lg:grid-cols-12 gap-8 items-center my-auto">
                <!-- Left Side: Title & Tagline -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="flex items-center space-x-2 font-mono text-xs text-brand-red tracking-widest uppercase">
                        <span class="w-2 h-2 rounded-full bg-brand-red animate-pulse"></span>
                        <span>REC ● SHOWREEL 2026</span>
                    </div>

                    <div class="text-[11px] font-mono text-gray-400 tracking-widest uppercase whitespace-pre-line">
                        {{ $profile['titles'] }} — {{ $profile['location'] }}
                    </div>

                    <h1 class="text-6xl sm:text-7xl lg:text-9xl font-black tracking-tighter text-white uppercase leading-none font-mono drop-shadow-lg">
                        PORTOFOLIO<span class="text-brand-red">.</span>
                    </h1>
                </div>

                <!-- Right Side: Description & Action Button -->
                <div class="lg:col-span-5 space-y-8 lg:pl-10">
                    <p class="text-gray-300 text-sm sm:text-base leading-relaxed font-sans">
                        {{ $profile['bio'] }}
                    </p>

                    <div class="flex flex-wrap items-center gap-6">
                        <button onclick="openModal('Showreel 2026', 'https://www.youtube.com/embed/dQw4w9WgXcQ')" class="flex items-center space-x-4 px-5 py-3 rounded-full bg-slate-100 text-slate-950 hover:bg-white transition-all shadow-xl group cursor-pointer">
                            <div class="w-8 h-8 rounded-full bg-slate-950 text-white flex items-center justify-center group-hover:bg-brand-red transition-colors">
                                <i id="play-icon" class="fa-solid fa-play text-xs ml-0.5"></i>
                            </div>
                            <div class="text-left font-mono">
                                <div class="text-xs font-bold leading-tight">Putar showreel</div>
                                <div class="text-[10px] text-slate-500" id="timecode-sub">00:00:16:20</div>
                            </div>
                        </button>

                        <a href="#specialized" class="text-xs font-mono text-gray-300 hover:text-white transition-colors flex items-center gap-2">
                            Lihat spesialisasi <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Professional Video Editor Sequence Timeline (Style Roll Film seperti Referensi) -->
            <div class="relative z-20 max-w-7xl w-full mx-auto pt-4">
                <div class="flex justify-between items-center mb-1 font-mono text-[11px]">
                    <div class="text-slate-400 select-none tracking-wider">SEQUENCE TIMELINE // V1 & A1</div>
                    <div class="text-slate-300 font-mono tracking-widest">
                        TC <span id="tc-display" class="text-brand-red font-bold">00:01:09:14</span>
                    </div>
                </div>

                <!-- Container Utama Panel Timeline -->
                <div class="relative bg-[#090d16]/95 backdrop-blur-md border border-brand-border rounded-xl p-3 shadow-2xl overflow-hidden font-mono">
                    
                    <!-- Timecode Ruler / Penggaris Waktu di Atas -->
                    <div class="flex items-center justify-between text-[9px] text-slate-500 border-b border-brand-border/60 pb-1 mb-2 px-6 select-none">
                        <span>00:00:00:00</span>
                        <span>00:00:05:00</span>
                        <span>00:00:10:00</span>
                        <span>00:00:15:00</span>
                        <span>00:00:20:00</span>
                        <span>00:00:25:00</span>
                    </div>

                    <!-- Garis Playhead Merah Berjalan -->
                    <div class="absolute top-0 bottom-0 w-[2px] bg-brand-red z-30 pointer-events-none animate-timeline-loop shadow-[0_0_8px_rgba(229,9,20,0.8)]">
                        <div class="w-3 h-3 bg-brand-red transform -translate-x-[5px] rotate-45 rounded-sm shadow-md"></div>
                    </div>

                    <!-- V1 TRACK (Video Roll Film Clips) -->
                    <div class="relative flex items-center space-x-2 py-1">
                        <span class="text-[10px] font-mono text-slate-400 w-5 font-bold select-none">V1</span>
                        <div class="flex-1 grid grid-cols-3 sm:grid-cols-6 gap-2 overflow-hidden bg-slate-950/80 p-1.5 rounded-lg border border-brand-border/80">
                            @foreach($categories as $cat)
                                <div class="h-14 rounded-md overflow-hidden relative border border-slate-700/60 bg-slate-900 shadow-inner group cursor-pointer hover:border-brand-red transition-all">
                                    <img src="{{ $cat['image'] }}" class="w-full h-full object-cover opacity-80 group-hover:scale-105 transition duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                                    <span class="absolute bottom-1 left-1.5 text-[8px] font-mono text-slate-200 font-semibold px-1 rounded truncate max-w-[90%]">
                                        {{ strtoupper($cat['title']) }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- A1 TRACK (Audio Waveform Bar Style) -->
                    <div class="relative flex items-center space-x-2 pt-1.5">
                        <span class="text-[10px] font-mono text-cyan-400 w-5 font-bold select-none">A1</span>
                        <div class="flex-1 bg-cyan-950/30 border border-cyan-900/40 rounded-lg h-9 px-3 flex items-center justify-between overflow-hidden">
                            <!-- Simulasi gelombang audio (Waveform Bars) -->
                            <div class="flex items-center gap-[3px] w-full h-full py-1.5">
                                @for ($i = 0; $i < 48; $i++)
                                    @php 
                                        $heights = ['h-2', 'h-4', 'h-6', 'h-3', 'h-5', 'h-7', 'h-3', 'h-6', 'h-2', 'h-5', 'h-4'];
                                        $h = $heights[$i % count($heights)];
                                    @endphp
                                    <div class="w-[3px] {{ $h }} bg-cyan-400/80 rounded-full"></div>
                                @endfor
                            </div>
                        </div>
                    </div>


        </section>


      <!-- 2. CV SECTION -->
    <section id="cv" class="relative min-h-[95vh] flex items-center py-20 px-6 sm:px-12 lg:px-20 overflow-hidden bg-black border-t border-brand-border">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/cv.jpg') }}" 
                 alt="CV Banner Background" 
                 class="w-full h-full object-cover object-center">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/90 to-black/75 z-10"></div>

        <div class="relative z-20 max-w-7xl w-full mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 space-y-8">
                <div class="relative w-48 h-56 sm:w-56 sm:h-64 rounded-2xl overflow-hidden border border-white/20 shadow-2xl group">
                    <img src="{{ $profile['avatar'] }}" alt="{{ $profile['name'] }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
                </div>

                <div class="space-y-3">
                    <h2 class="poster-heading text-4xl sm:text-6xl text-white uppercase tracking-wider">
                        {{ $profile['name'] }}
                    </h2>
                    <p class="text-gray-300 text-xs sm:text-sm font-medium leading-relaxed whitespace-pre-line">
                        {{ $profile['titles'] }}
                    </p>
                </div>

                <p class="text-gray-300 text-xs sm:text-sm leading-relaxed max-w-xl">
                    {{ $profile['bio'] }}
                </p>

                <div class="space-y-2 pt-2">
                    <h3 class="poster-heading text-2xl text-white uppercase tracking-wider">Contact</h3>
                    <div class="text-xs text-gray-300 space-y-1">
                        <p><strong class="text-white">Email</strong> : {{ $profile['email'] }}</p>
                        <p><strong class="text-white">Phone</strong> : {{ $profile['phone'] }}</p>
                        <p><strong class="text-white">LinkedIn</strong> : <a href="{{ $profile['linkedin'] }}" target="_blank" class="text-brand-red underline">{{ $profile['linkedin'] }}</a></p>
                        <p><strong class="text-white">Location</strong> : {{ $profile['location'] }}</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-8">
                <div class="space-y-4">
                    <h3 class="poster-heading text-2xl text-white uppercase tracking-wider">EXPERTISE</h3>
                    <ul class="text-xs text-gray-300 space-y-2">
                        @foreach($expertise as $exp)
                            <li>• {{ $exp }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="space-y-4 pt-4">
                    <h3 class="poster-heading text-2xl text-white uppercase tracking-wider">SKILLS</h3>
                    <div class="text-xs text-gray-300 space-y-2">
                        <span class="text-white font-bold block">Tools</span>
                        <ul class="space-y-1.5">
                            @foreach($skills['Tools'] as $tool)
                                <li>• {{ $tool }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="space-y-4 pt-4 sm:col-span-2">
                    <h3 class="poster-heading text-2xl text-white uppercase tracking-wider">WORK EXPERIENCE</h3>
                    <div class="space-y-4 text-xs text-gray-300">
                        @foreach($work_experience as $work)
                            <div class="space-y-1 border-l-2 border-brand-red pl-3">
                                <span class="text-white font-bold block">{{ $work['year'] }}</span>
                                <p class="text-brand-red font-semibold">{{ $work['status'] }}</p>
                                <p class="text-gray-300">{{ $work['institution'] }}</p>
                                @if(!empty($work['division']))
                                    <p class="text-gray-400 italic">Division: {{ $work['division'] }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

        
       <!-- SPECIALIZED FIELDS SECTION -->
    <section id="specialized" class="relative py-28 px-6 sm:px-12 lg:px-20 overflow-hidden bg-brand-dark border-t border-brand-border/40">
        <!-- Background Image dari public/images/spesialisasi.jpg -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/spesialisasi.jpg') }}" 
                 alt="Specialized Fields Background" 
                 class="w-full h-full object-cover object-center filter brightness-80 contrast-125">
        </div>
        <!-- Gradient Overlay agar teks tetap kontras dan mudah dibaca -->
        <div class="absolute inset-0 bg-gradient-to-b from-brand-dark/95 via-brand-dark/85 to-brand-dark/95 z-10"></div>

        <!-- Konten Section -->
        <div class="relative z-20 max-w-7xl w-full mx-auto space-y-12">
            <div class="text-center space-y-2">
                <h2 class="poster-heading text-4xl sm:text-6xl text-white uppercase tracking-wider">SPECIALIZED FIELDS</h2>
                <p class="text-gray-400 text-xs sm:text-sm max-w-2xl mx-auto">Eksplorasi bidang spesialisasi kreatif dan portofolio terkait.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($categories as $cat)
                    <div class="bg-slate-900/80 border border-brand-border rounded-xl p-6 flex flex-col justify-between hover:border-brand-red transition-all backdrop-blur-md shadow-xl">
                        <div class="space-y-4">
                            <div class="h-36 rounded-lg overflow-hidden border border-brand-border relative">
                                <img src="{{ $cat['image'] }}" class="w-full h-full object-cover opacity-80 hover:scale-105 transition-transform duration-500">
                                <span class="absolute top-2 left-2 text-[9px] font-mono bg-slate-950/80 text-brand-red px-2 py-0.5 rounded border border-brand-border">
                                    {{ $cat['period'] }}
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-white font-mono">{{ $cat['title'] }}</h3>
                            <p class="text-gray-300 text-xs leading-relaxed">{{ $cat['description'] }}</p>
                            
                            <div class="text-xs space-y-1 font-mono">
                                <span class="text-slate-400 block font-semibold">Tech Stack:</span>
                                <span class="text-orange-300 text-[11px]">{{ $cat['tech'] }}</span>
                            </div>
                        </div>

                        <div class="mt-6 border-t border-brand-border pt-4">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block mb-2 font-mono">Skills Tag</span>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach($cat['tags'] as $tag)
                                    <span class="bg-slate-800/80 text-slate-300 text-[10px] px-2 py-0.5 rounded border border-slate-700 font-mono">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

        <!-- 4. GOOGLE DRIVE REPOSITORY SECTION (SPA View) -->
    <section id="gdrive" class="relative py-28 px-6 sm:px-12 lg:px-20 overflow-hidden bg-brand-dark border-t border-brand-border">
        <!-- Background Image dari public/images/experience.jpg -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/experience.jpg') }}" 
                 alt="Experience Repository Background" 
                 class="w-full h-full object-cover object-center filter brightness-50 contrast-125">
        </div>
        <!-- Gradient Overlay agar teks dan kartu tetap kontras dibaca -->
        <div class="absolute inset-0 bg-gradient-to-b from-brand-dark/95 via-brand-dark/85 to-brand-dark/95 z-10"></div>

        <div class="relative z-20 max-w-7xl mx-auto space-y-12">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 border-b border-brand-border pb-6">
                <div class="space-y-2">
                    <div class="flex items-center gap-2 text-brand-red text-xs font-bold uppercase tracking-widest">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                        Cloud Storage/Project Repository
                    </div>
                    <h2 class="poster-heading text-4xl sm:text-6xl text-white uppercase tracking-wider">
                        PROFESIONAL EXPERIENCE
                    </h2>
                    <p class="text-gray-400 text-xs sm:text-sm max-w-xl">
                        Arsip berkas mentah, asset desain, dan materi project yang disinkronkan langsung dari Google Drive.
                    </p>
                </div>
                <div class="bg-brand-card/90 backdrop-blur border border-brand-border px-4 py-2 rounded-xl text-xs text-gray-300">
                    Total Files: <span class="text-white font-bold">{{ count($driveProjects) }} Items</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($driveProjects as $proj)
                    <div class="bg-brand-card/90 backdrop-blur-md border border-brand-border rounded-2xl overflow-hidden flex flex-col justify-between hover:border-brand-red transition-all duration-300 shadow-xl group">
                        <div class="relative h-48 w-full overflow-hidden bg-black/40 cursor-pointer" onclick="openDriveModal('{{ $proj['title'] }}', '{{ $proj['drive_url'] }}', '{{ $proj['type'] }}')">
                            <img src="{{ $proj['thumbnail'] }}" alt="{{ $proj['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition"></div>
                            <div class="absolute top-3 left-3">
                                <span class="text-[10px] font-bold text-white bg-black/70 backdrop-blur-md uppercase px-2.5 py-1 rounded-md border border-white/10">
                                    {{ $proj['category'] }}
                                </span>
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-12 h-12 rounded-full bg-brand-red/90 flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition">
                                    <svg class="w-5 h-5 ml-0.5 fill-current" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 space-y-4 flex-grow flex flex-col justify-between">
                            <div class="space-y-2">
                                <h3 class="text-white font-bold text-sm line-clamp-1 group-hover:text-brand-red transition">
                                    {{ $proj['title'] }}
                                </h3>
                                <div class="flex items-center justify-between text-[11px] text-gray-400">
                                    <span>Size: {{ $proj['size'] }}</span>
                                    <span>Updated: {{ $proj['updated_at'] }}</span>
                                </div>
                            </div>

                            <div class="pt-4 border-t border-brand-border flex items-center justify-between">
                                <button onclick="openDriveModal('{{ $proj['title'] }}', '{{ $proj['drive_url'] }}', '{{ $proj['type'] }}')" 
                                        class="text-xs text-brand-red font-semibold hover:underline flex items-center gap-1">
                                    <span>Preview File</span> →
                                </button>
                                <a href="{{ $proj['drive_url'] }}" target="_blank" class="text-xs bg-brand-border/60 hover:bg-brand-border text-gray-300 px-3 py-1.5 rounded transition">
                                    Open in Drive ↗
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    </main>

    <!-- Modal Video Player Utama -->
    <div id="videoModal" class="fixed inset-0 z-50 bg-black/90 hidden flex items-center justify-center p-4">
        <div class="bg-brand-card border border-brand-border rounded-xl max-w-4xl w-full overflow-hidden shadow-2xl">
            <div class="p-4 border-b border-brand-border flex justify-between items-center">
                <h3 id="modalTitle" class="poster-heading text-xl text-white">Project Showcase</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-white text-2xl font-bold">&times;</button>
            </div>
            <div class="relative aspect-video">
                <iframe id="modalIframe" class="w-full h-full" src="" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- Modal Google Drive Preview -->
    <div id="driveModal" class="fixed inset-0 z-50 bg-black/90 hidden flex items-center justify-center p-4">
        <div class="bg-brand-card border border-brand-border rounded-xl max-w-4xl w-full overflow-hidden shadow-2xl">
            <div class="p-4 border-b border-brand-border flex justify-between items-center">
                <h3 id="modalDriveTitle" class="poster-heading text-xl text-white">Drive File Preview</h3>
                <button onclick="closeDriveModal()" class="text-gray-400 hover:text-white text-2xl font-bold">&times;</button>
            </div>
            <div class="relative aspect-video bg-black flex items-center justify-center">
                <iframe id="modalDriveIframe" class="w-full h-full hidden" src="" frameborder="0" allowfullscreen></iframe>
                <img id="modalDriveImage" class="max-h-full max-w-full object-contain hidden" src="" alt="Preview">
            </div>
        </div>
    </div>

    <!-- Footer Profesional -->
    <footer class="bg-brand-card border-t border-brand-border py-12 text-gray-400 text-xs">
        <div class="max-w-7xl mx-auto px-6 sm:px-12 lg:px-20 grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
            
            <div class="space-y-2">
                <span class="poster-heading text-2xl text-white tracking-wider block">
                    {{ $profile['name'] }} <span class="text-brand-red">.</span>
                </span>
                <p class="text-gray-400">Creative Designer & Lead Videographer Portfolio Platform.</p>
            </div>

            <div class="flex justify-start md:justify-center gap-6 font-medium text-gray-300">
                <a href="#home" class="hover:text-brand-red transition-colors">Home</a>
                <a href="#cv" class="hover:text-brand-red transition-colors">CV</a>
                <a href="#experience" class="hover:text-brand-red transition-colors">specialization</a>
                <a href="#gdrive" class="hover:text-brand-red transition-colors">Experience</a>
            </div>

            <div class="text-left md:text-right space-y-1">
                <p>&copy; {{ date('Y') }} {{ $profile['name'] }}. All Rights Reserved.</p>
                <p class="text-gray-500">Email: {{ $profile['email'] }}</p>
            </div>

        </div>
    </footer>

    <!-- Script Interaktif Modal -->
    <script>
        function openModal(title, videoUrl) {
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('modalIframe').src = videoUrl;
            document.getElementById('videoModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modalIframe').src = '';
            document.getElementById('videoModal').classList.add('hidden');
        }

        function openDriveModal(title, url, type) {
            document.getElementById('modalDriveTitle').innerText = title;
            const iframe = document.getElementById('modalDriveIframe');
            const img = document.getElementById('modalDriveImage');

            if (type === 'image') {
                iframe.classList.add('hidden');
                img.classList.remove('hidden');
                img.src = url;
            } else {
                img.classList.add('hidden');
                iframe.classList.remove('hidden');
                iframe.src = url;
            }
            document.getElementById('driveModal').classList.remove('hidden');
        }

        function closeDriveModal() {
            document.getElementById('modalDriveIframe').src = '';
            document.getElementById('driveModal').classList.add('hidden');
        }
    </script>
</body>
</html>