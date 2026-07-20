<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::updateOrCreate([
            'slug' => 'cairo'
        ],
            [
                'title' => 'Cairo',
                'status' => 'active',
                'notes' => 'This is a Cairo location.',
            ]
        );
        Location::updateOrCreate([
            'slug' => 'paris'
        ],
            [
                'title' => 'Paris',
                'status' => 'active',
                'notes' => 'This is a Paris location.',
            ]
        );
        Location::updateOrCreate([
            'slug' => 'germany'
        ],
            [
                'title' => 'Germany',
                'status' => 'active',
                'notes' => 'This is a Germany location.',
            ]
        );
    }
}
