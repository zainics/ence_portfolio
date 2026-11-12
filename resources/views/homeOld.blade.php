@extends('layouts.app')
@section('title', 'Landing Page | Zainal Arifin')
@section('content')
<div class="space-y-12">
    <!-- Hero Poster Style -->
    <section class="relative bg-brand-card border border-brand-border rounded-2xl overflow-hidden p-8 md:p-12 bg-grid-pattern">
        <div class="absolute inset-0 bg-gradient-to-r from-brand-dark via-brand-dark/80 to-transparent z-0"></div>
        <div class="relative z-10 space-y-4">
            <h1 class="poster-heading text-6xl sm:text-8xl md:text-9xl text-white uppercase tracking-wider leading-none">
                PORTFOLIO
            </h1>
            <div class="inline-block bg-brand-red text-white text-xs sm:text-sm font-bold uppercase tracking-widest px-4 py-1.5 rounded">
                Music Video • Motion Graphic • Audio Visual Event • Video Bumper • Video Ads
            </div>
        </div>
    </section>

    <!-- Specializations Grid -->
    <section class="space-y-6">
        <div class="text-center space-y-2">
            <h2 class="poster-heading text-4xl text-white uppercase">SPECIALIZED FIELDS</h2>
            <p class="text-gray-400 text-sm max-w-2xl mx-auto">Eksplorasi bidang spesialisasi kreatif dan portofolio terkait.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($categories as $cat)
                <div class="bg-brand-card border border-brand-border rounded-xl p-6 flex flex-col justify-between hover:border-brand-red/50 transition-all">
                    <div class="space-y-4">
                        <h3 class="poster-heading text-2xl text-white">{{ $cat['title'] }}</h3>
                        <p class="text-gray-300 text-xs leading-relaxed">{{ $cat['description'] }}</p>
                        <div class="text-xs space-y-1">
                            <span class="text-gray-400 block font-semibold">Tech & Hardware:</span>
                            <span class="text-gray-200">{{ $cat['tech'] }}</span>
                        </div>
                    </div>
                    <div class="mt-6 border-t border-brand-border pt-4">
                        <span class="text-xs font-bold uppercase tracking-wider text-brand-red block mb-2">Skills Shown</span>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach($cat['tags'] as $tag)
                                <span class="bg-brand-border/60 text-gray-300 text-[10px] px-2 py-1 rounded">• {{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</div>
@endsection