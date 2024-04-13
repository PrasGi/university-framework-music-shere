<?php

namespace Database\Seeders;

use App\Models\Music;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Music::create([
            'file_music' => 'seeder/music/3rd Prototype - Move Your Body Techno NCS - Copyright Free Music.mp3',
            'file_thumbnail' => 'seeder/thumbnail/Screenshot 2024-03-29 005607.png',
            'title' => '3rd Prototype - Move Your Body Techno NCS - Copyright Free Music',
            'artist' => 'NCS',
            'user_id' => 1,
        ]);
        Music::create([
            'file_music' => 'seeder/music/Andrah - pretty afternoon DnB NCS - Copyright Free Music.mp3',
            'file_thumbnail' => 'seeder/thumbnail/Screenshot 2024-03-29 005613.png',
            'title' => 'Andrah - pretty afternoon DnB NCS - Copyright Free Music',
            'artist' => 'NCS',
            'user_id' => 1,
        ]);
        Music::create([
            'file_music' => 'seeder/music/Ariadne - Karma Electronic Pop NCS - Copyright Free Music.mp3',
            'file_thumbnail' => 'seeder/thumbnail/Screenshot 2024-03-29 005631.png',
            'title' => 'Ariadne - Karma Electronic Pop NCS - Copyright Free Music',
            'artist' => 'NCS',
            'user_id' => 1,
        ]);
        Music::create([
            'file_music' => "seeder/music/Clarx & Shiah Maisel - Round n' Round Electronic Rock NCS - Copyright Free Music.mp3",
            'file_thumbnail' => 'seeder/thumbnail/Screenshot 2024-03-29 005651.png',
            'title' => "Clarx & Shiah Maisel - Round n' Round Electronic Rock NCS - Copyright Free Music",
            'artist' => 'NCS',
            'user_id' => 1,
        ]);
        Music::create([
            'file_music' => 'seeder/music/Diamond Eyes - Sinner Garage NCS - Copyright Free Music.mp3',
            'file_thumbnail' => 'seeder/thumbnail/Screenshot 2024-03-29 005658.png',
            'title' => 'Diamond Eyes - Sinner Garage NCS - Copyright Free Music',
            'artist' => 'NCS',
            'user_id' => 1,
        ]);
        Music::create([
            'file_music' => 'seeder/music/Dosi & Aisake - Cruising Lofi NCS - Copyright Free Music.mp3',
            'file_thumbnail' => 'seeder/thumbnail/Screenshot 2024-03-29 005706.png',
            'title' => 'Dosi & Aisake - Cruising Lofi NCS - Copyright Free Music',
            'artist' => 'NCS',
            'user_id' => 1,
        ]);
        Music::create([
            'file_music' => 'seeder/music/Janji - Heroes Tonight (feat. Johnning) Progressive House NCS - Copyright Free Music.mp3',
            'file_thumbnail' => 'seeder/thumbnail/Screenshot 2024-03-29 005716.png',
            'title' => 'Janji - Heroes Tonight (feat. Johnning) Progressive House NCS - Copyright Free Music',
            'artist' => 'NCS',
            'user_id' => 1,
        ]);
        Music::create([
            'file_music' => 'seeder/music/JINXSPR0 - Stick Around You Indie Dance NCS - Copyright Free Music.mp3',
            'file_thumbnail' => 'seeder/thumbnail/Screenshot 2024-03-29 005722.png',
            'title' => 'JINXSPR0 - Stick Around You Indie Dance NCS - Copyright Free Music',
            'artist' => 'NCS',
            'user_id' => 1,
        ]);
        Music::create([
            'file_music' => 'seeder/music/Jonth - Bass Face DnB NCS - Copyright Free Music.mp3',
            'file_thumbnail' => 'seeder/thumbnail/Screenshot 2024-03-29 005728.png',
            'title' => 'Jonth - Bass Face DnB NCS - Copyright Free Music',
            'artist' => 'NCS',
            'user_id' => 1,
        ]);
        Music::create([
            'file_music' => "seeder/music/Low Mileage - I'm Not Ready Garage NCS - Copyright Free Music.mp3",
            'file_thumbnail' => 'seeder/thumbnail/Screenshot 2024-03-29 005736.png',
            'title' => "Low Mileage - I'm Not Ready Garage NCS - Copyright Free Music",
            'artist' => 'NCS',
            'user_id' => 1,
        ]);
        Music::create([
            'file_music' => 'seeder/music/Max Brhon - AI Midtempo Bass NCS - Copyright Free Music.mp3',
            'file_thumbnail' => 'seeder/thumbnail/thumb-2.png',
            'title' => 'Max Brhon - AI Midtempo Bass NCS - Copyright Free Music',
            'artist' => 'NCS',
            'user_id' => 1,
        ]);
    }
}