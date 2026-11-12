<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Drive Project Repository | Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    </style>
</head>
<body class="bg-brand-dark text-gray-100 font-sans antialiased min-h-screen flex flex-col justify-between">

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-brand-dark/95 backdrop-blur-md border-b border-brand-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ url('/') }}" class="poster-heading text-2xl tracking-wider text-white">
                ZAINAL ARIFIN <span class="text-brand-red">.</span>
            </a>
            <div class="flex items-center gap-6 text-sm font-medium">
                <a href="{{ url('/') }}" class="hover:text-brand-red transition-colors">← Back to Main Portfolio</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="w-full flex-grow max-w-7xl mx-auto px-6 sm:px-12 lg:px-20 py-16 space-y-10">
        
        <!-- Header Info -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 border-b border-brand-border pb-6">
            <div class="space-y-2">
                <div class="flex items-center gap-2 text-brand-red text-xs font-bold uppercase tracking-widest">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                    Cloud Storage Sync
                </div>
                <h1 class="poster-heading text-4xl sm:text-6xl text-white uppercase tracking-wider">
                    Google Drive Repository
                </h1>
                <p class="text-gray-400 text-xs sm:text-sm max-w-xl">
                    Arsip lengkap berkas project, master video mentah, asset desain, dan dokumen pendukung yang disinkronkan langsung dari Google Drive.
                </p>
            </div>
            <div class="bg-brand-card border border-brand-border px-4 py-2 rounded-xl text-xs text-gray-300">
                Total Files: <span class="text-white font-bold">{{ count($driveProjects) }} Items</span>
            </div>
        </div>

        <!-- Grid Daftar File Project Google Drive -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($driveProjects as $proj)
                <div class="bg-brand-card border border-brand-border rounded-2xl overflow-hidden flex flex-col justify-between hover:border-brand-red transition-all duration-300 shadow-xl group">
                    
                    <!-- Thumbnail Preview -->
                    <div class="relative h-48 w-full overflow-hidden bg-black/40 cursor-pointer" onclick="openDriveModal('{{ $proj['title'] }}', '{{ $proj['drive_url'] }}', '{{ $proj['type'] }}')">
                        <img src="{{ $proj['thumbnail'] }}" alt="{{ $proj['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition"></div>
                        
                        <!-- Badge Tipe File -->
                        <div class="absolute top-3 left-3">
                            <span class="text-[10px] font-bold text-white bg-black/70 backdrop-blur-md uppercase px-2.5 py-1 rounded-md border border-white/10">
                                {{ $proj['category'] }}
                            </span>
                        </div>

                        <!-- Ikon Play / View -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-12 h-12 rounded-full bg-brand-red/90 flex items-center justify-center text-white shadow-lg group-hover:scale-110 transition">
                                <svg class="w-5 h-5 ml-0.5 fill-current" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi File -->
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

    </main>

    <!-- Modal Preview Google Drive -->
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

    <!-- Footer -->
    <footer class="bg-brand-card border-t border-brand-border py-8 text-center text-xs text-gray-500">
        &copy; {{ date('Y') }} Zainal Arifin. Google Drive Integration Module.
    </footer>

    <!-- Script Modal -->
    <script>
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