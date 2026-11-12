@extends('layouts.app')
@section('title', 'Curriculum Vitae | Zainal Arifin')
@section('content')
<div class="space-y-8 max-w-4xl mx-auto">
    <div class="bg-brand-card border border-brand-border rounded-xl p-8 flex flex-col sm:flex-row items-center gap-6">
        <img src="{{ $profile['avatar'] }}" alt="{{ $profile['name'] }}" class="w-32 h-32 rounded-xl object-cover border-2 border-brand-red shadow-lg">
        <div class="space-y-2 text-center sm:text-left">
            <h1 class="poster-heading text-4xl text-white uppercase">{{ $profile['name'] }}</h1>
            <p class="text-xs text-brand-red font-semibold uppercase tracking-wider">{{ $profile['titles'] }}</p>
            <p class="text-gray-300 text-xs leading-relaxed">{{ $profile['bio'] }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-brand-card border border-brand-border rounded-xl p-6 space-y-4">
            <h2 class="poster-heading text-xl text-white uppercase border-b border-brand-border pb-2">EDUCATION</h2>
            @foreach($education as $edu)
                <div class="text-xs space-y-1">
                    <span class="text-brand-red font-mono font-bold">{{ $edu['year'] }}</span>
                    <h3 class="text-white font-semibold">{{ $edu['degree'] }}</h3>
                    <p class="text-gray-400">{{ $edu['institution'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="bg-brand-card border border-brand-border rounded-xl p-6 space-y-4">
            <h2 class="poster-heading text-xl text-white uppercase border-b border-brand-border pb-2">EXPERTISE & SKILLS</h2>
            <div class="text-xs space-y-3">
                @foreach($skills as $group => $items)
                    <div>
                        <span class="text-gray-400 font-semibold">{{ $group }}:</span>
                        <p class="text-gray-200">{{ implode(', ', $items) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection