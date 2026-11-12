@extends('layouts.app')
@section('title', 'Contact & Pitch | Zainal Arifin')
@section('content')
<div class="max-w-2xl mx-auto bg-brand-card border border-brand-border rounded-2xl p-8 space-y-6">
    <div class="text-center space-y-2">
        <h1 class="poster-heading text-3xl text-white uppercase">START A PROJECT PITCH</h1>
        <p class="text-gray-400 text-xs">Diskusikan kebutuhan project video dan periklanan Anda secara langsung.</p>
    </div>

    @if(session('success'))
        <div class="bg-green-500/10 border border-green-500 text-green-400 p-4 rounded-lg text-xs">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4 text-xs">
        @csrf
        <div>
            <label class="block font-semibold mb-1 text-gray-300">Nama Lengkap</label>
            <input type="text" name="name" required class="w-full bg-brand-dark border border-brand-border rounded px-3 py-2 text-white focus:outline-none focus:border-brand-red">
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-300">Email Address</label>
            <input type="email" name="email" required class="w-full bg-brand-dark border border-brand-border rounded px-3 py-2 text-white focus:outline-none focus:border-brand-red">
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-300">Kategori Pekerjaan</label>
            <select name="category" class="w-full bg-brand-dark border border-brand-border rounded px-3 py-2 text-white focus:outline-none focus:border-brand-red">
                <option value="music-video">Music Video</option>
                <option value="motion-graphic">Motion Graphic</option>
                <option value="av-event">Audio Visual Event</option>
                <option value="video-bumper">Video Bumper</option>
                <option value="video-ads">Video Ads (Commercial)</option>
            </select>
        </div>
        <div>
            <label class="block font-semibold mb-1 text-gray-300">Pesan / Project Brief</label>
            <textarea name="message" rows="4" required class="w-full bg-brand-dark border border-brand-border rounded px-3 py-2 text-white focus:outline-none focus:border-brand-red" placeholder="Jelaskan detail project Anda..."></textarea>
        </div>
        <button type="submit" class="w-full bg-brand-red hover:bg-red-700 text-white font-bold py-3 rounded transition uppercase tracking-wider text-sm">
            Kirim Pesan
        </button>
    </form>
</div>
@endsection