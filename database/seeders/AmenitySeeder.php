<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Amenity::updateOrCreate([
            'slug' => 'parking',
        ], [
            'title' => 'Parking',
            'icon' => 'fa-solid fa-parking',
            'status' => 'active',
        ]);
        Amenity::updateOrCreate([
            'slug' => 'good-for-kids',
        ], [
            'title' => 'Good for kids',
            'icon' => 'fa-solid fa-child',
            'status' => 'active',
        ]);
        Amenity::updateOrCreate([
            'slug' => 'free-coffee-and-tea',
        ], [
            'title' => 'Free coffee and tea',
            'icon' => 'fa-solid fa-mug-saucer',
            'status' => 'active',
        ]);
        Amenity::updateOrCreate([
            'slug' => 'reservations',
        ], [
            'title' => 'Reservations',
            'icon' => 'fa-solid fa-calendar-check',
            'status' => 'active',
        ]);
    }
}
