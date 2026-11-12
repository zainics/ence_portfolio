<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = [
            'name' => 'ZAINAL ARIFIN',
            'titles' => "Graphic Designer | Video Editor\nMotion Graphics Artist | Creative Designer",
            'bio' => 'From the fast-paced rhythm of digital ads to high-precision visual animation, ready to take your brand, agency, or start-up narrative to the next level.',
            'email' => 'zainal.arifin@gmail.com',
            'phone' => '+62 815 4652 2666',
            'linkedin' => 'https://www.linkedin.com/in/zainalence/',
            'location' => 'Jakarta, Indonesia',
            'avatar' => file_exists(public_path('images/ence_image.jpg')) 
                        ? asset('images/ence_image.jpg') 
                        : 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
        ];

        $education = [
            [
                'year' => '2012 - 2016',
                'status' => 'Graduation',
                'institution' => 'Advertising Program, Bina Sarana Informatika University'
            ],
        ];

        $expertise = [
            'Video Editing',
            'Motion Graphics',
            'Color Grading',
            'Graphic Design',
            'Branding',
            'Typography',
            'Social Media Design'
        ];

        $skills = [
            'Tools' => [
                'Adobe CC After Effects',
                'Adobe CC Premiere Pro',
                'Adobe CC Photosshop',
                'Adobe CC Illustrator',
                'Final Cut Pro',
                'Figma',
                'Unreal Engine 5',
                'Pro Tools'
            ]
        ];

        $work_experience = [
            [
                'year' => '2012 - 2019', 
                'status' => 'VIDEO EDITOR/MOTION GRAPHIC DESIGNER', 
                'institution' => 'CATS STUDIO, Jakarta, Indonesia.', 
                'division' => '' 
            ], 
            [
                'year' => '2019 - Now', 
                'status' => 'CREATIVE DESIGNER/MOTION GRAPHIC DESIGNER', 
                'institution' => 'BUKALAPAK Group, Jakarta, Indonesia.', 
                'division' => 'itemku, Lapakgaming, Joytify' 
            ]
        ];

        // Data Spesialisasi & Portofolio Bidang Kreatif (Digunakan untuk $experiences dan $categories)
        $categories = [
            [
                'id' => 'graphic-design',
                'title' => 'Graphic Design',
                'description' => 'Desain visual identitas brand, poster promosi, materi cetak, dan aset digital marketing berdaya tarik tinggi.',
                'deliverables' => 'Brand Identity Guidelines, Social Media Kits, Key Visuals',
                'tech' => 'Adobe Photoshop, Illustrator, Figma',
                'tags' => ['Visual Branding', 'Typography', 'Layouting', 'Color Theory'],
                'period' => 'BRANDING & IDENTITY',
                'image' => 'https://images.unsplash.com/photo-1626544827763-d516dce335e2?auto=format&fit=crop&w=800&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            ],
            [
                'id' => 'music-video',
                'title' => 'Music Video',
                'description' => 'Konsep naratif cinematic, ritme visual tinggi, dan dynamic pacing yang menyatu sempurna dengan lagu.',
                'deliverables' => 'Official MV, Teaser Reels, Behind The Scenes',
                'tech' => 'ARRI Alexa Mini, Anamorphic Lenses, DaVinci Resolve',
                'tags' => ['Beat Syncing', 'Color Grading', 'Performance Framing', 'Visual Effects'],
                'period' => 'COMMERCIAL PROJECT',
                'image' => 'https://images.unsplash.com/photo-1574717024653-61fd2cf4d44d?auto=format&fit=crop&w=800&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            ],
            [
                'id' => 'motion-graphic',
                'title' => 'Motion Graphic',
                'description' => 'Desain 2D/3D interaktif, kinetic typography, dan animasi logo modern untuk brand identity.',
                'deliverables' => 'Brand Motion Assets, Broadcast Package, Explainer Video',
                'tech' => 'After Effects, Cinema 4D, Octane Render',
                'tags' => ['3D Animation', 'Kinetic Type', 'Logo Stings', 'Composition'],
                'period' => 'COMMERCIAL PROJECT',
                'image' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=800&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            ],
            [
                'id' => 'av-event',
                'title' => 'Audio Visual Event',
                'description' => 'Visual backdrop panggung high-resolution, concert visuals, dan 3D projection mapping.',
                'deliverables' => 'Stage LED Loops, Concert Intro Bumper, Event Aftermovie',
                'tech' => 'Resolume Arena, Blender, 4K High-Bitrate Export',
                'tags' => ['Stage Loops', 'Sync Control', 'Energy Pacing', 'Projection Mapping'],
                'period' => 'LIVE CONCERT & EVENT',
                'image' => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&w=800&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            ],
            [
                'id' => 'video-bumper',
                'title' => 'Video Bumper',
                'description' => 'Visual pendek (5-15 detik) berimpact tinggi untuk pembuka event, YouTube channel, atau identitas tayangan.',
                'deliverables' => 'Channel Intros, Product Launch Bumpers, Transition Stings',
                'tech' => 'Premiere Pro, Sound Design FX Stack',
                'tags' => ['Fast Pacing', 'Sound Design', 'Logo Reveal', 'Transition Effects'],
                'period' => 'DIGITAL IDENTITY',
                'image' => 'https://images.unsplash.com/photo-1536240478700-b869070f9279?auto=format&fit=crop&w=800&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            ],
            [
                'id' => 'video-ads',
                'title' => 'Video Ads (Commercial)',
                'description' => 'Iklan komersial TV & Digital berdaya konversi tinggi yang dirancang khusus untuk memikat audiens.',
                'deliverables' => 'TV Commercial (TVC), TikTok/IG Vertical Ads, Brand Campaign Film',
                'tech' => 'RED V-Raptor, DaVinci Film Look FX',
                'tags' => ['Storytelling', 'Color Grading', 'Commercial Lighting', 'Conversion Hook'],
                'period' => 'ADVERTISING CAMPAIGN',
                'image' => 'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?auto=format&fit=crop&w=800&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ'
            ]
        ];

        // Alias agar $experiences dan $categories dapat digunakan secara bergantian di file Blade tanpa error
        $experiences = $categories;

        // Data Project Google Drive
        $driveProjects = [
            [
                'id' => 'proj-1',
                'title' => 'Commercial Video Ads - Master Files',
                'category' => 'Video Production',
                'type' => 'video',
                'thumbnail' => 'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?auto=format&fit=crop&w=800&q=80',
                'drive_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'size' => '450 MB',
                'updated_at' => '2026-10-15'
            ],
            [
                'id' => 'proj-2',
                'title' => 'Brand Identity & Guidelines Assets',
                'category' => 'Graphic Design',
                'type' => 'image',
                'thumbnail' => 'https://images.unsplash.com/photo-1626544827763-d516dce335e2?auto=format&fit=crop&w=800&q=80',
                'drive_url' => 'https://images.unsplash.com/photo-1626544827763-d516dce335e2?auto=format&fit=crop&w=1200&q=80',
                'size' => '28 MB',
                'updated_at' => '2026-09-10'
            ],
            [
                'id' => 'proj-3',
                'title' => 'Motion Graphics Reel & Project Files',
                'category' => 'Motion Graphics',
                'type' => 'video',
                'thumbnail' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=800&q=80',
                'drive_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'size' => '1.2 GB',
                'updated_at' => '2026-08-20'
            ]
        ];

        return view('portfolio', compact(
            'profile', 
            'education', 
            'expertise', 
            'skills', 
            'work_experience', 
            'experiences', 
            'categories', 
            'driveProjects'
        ));
    }
}