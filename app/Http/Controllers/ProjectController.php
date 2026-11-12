<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Data tiruan / representasi file & folder Google Drive portfolio Anda
        // Anda bisa mengganti URL tautan sharing Google Drive embed / preview di sini
        $driveProjects = [
            [
                'id' => 'proj-1',
                'title' => 'Commercial Video Ads - Bukalapak Campaign',
                'category' => 'Video Production',
                'type' => 'video', // video, image, doc
                'thumbnail' => 'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?auto=format&fit=crop&w=800&q=80',
                'drive_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ', // Ganti dengan Google Drive embed link jika ada
                'size' => '450 MB',
                'updated_at' => '2026-10-15'
            ],
            [
                'id' => 'proj-2',
                'title' => 'Brand Identity & Guidelines - itemku',
                'category' => 'Graphic Design',
                'type' => 'image',
                'thumbnail' => 'https://images.unsplash.com/photo-1626544827763-d516dce335e2?auto=format&fit=crop&w=800&q=80',
                'drive_url' => 'https://images.unsplash.com/photo-1626544827763-d516dce335e2?auto=format&fit=crop&w=1200&q=80',
                'size' => '28 MB',
                'updated_at' => '2026-09-10'
            ],
            [
                'id' => 'proj-3',
                'title' => 'Motion Graphics Reel - Cats Studio',
                'category' => 'Motion Graphics',
                'type' => 'video',
                'thumbnail' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=800&q=80',
                'drive_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'size' => '1.2 GB',
                'updated_at' => '2026-08-20'
            ],
            [
                'id' => 'proj-4',
                'title' => 'UI/UX Design Asset & Wireframes',
                'category' => 'Graphic Design',
                'type' => 'doc',
                'thumbnail' => 'https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&w=800&q=80',
                'drive_url' => 'https://docs.google.com/',
                'size' => '15 MB',
                'updated_at' => '2026-07-05'
            ]
        ];

        return view('projects.drive_index', compact('driveProjects'));
    }
}