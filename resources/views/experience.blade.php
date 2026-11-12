@extends('layouts.app')
@section('title', 'Work Experience | Zainal Arifin')
@section('content')
<div class="max-w-3xl mx-auto space-y-8">
    <div class="text-center space-y-2">
        <h1 class="poster-heading text-4xl text-white uppercase">PROFESSIONAL EXPERIENCE</h1>
        <p class="text-gray-400 text-xs">Jejak rekam karir di bidang periklanan, sinematografi, dan manajemen produksi kreatif.</p>
    </div>

    <div class="space-y-4">
        @foreach($experiences as $exp)
            <div class="bg-brand-card border border-brand-border rounded-xl p-6 space-y-2">
                <div class="flex justify-between items-center flex-wrap gap-2">
                    <h2 class="poster-heading text-2xl text-white">{{ $exp['role'] }}</h2>
                    <span class="bg-brand-red text-white text-[10px] font-bold px-2.5 py-1 rounded">{{ $exp['period'] }}</span>
                </div>
                <h3 class="text-brand-red text-xs font-semibold">{{ $exp['company'] }}</h3>
                <p class="text-gray-300 text-xs leading-relaxed">{{ $exp['desc'] }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection