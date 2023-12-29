<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           University::updateOrCreate( [
            'name' => 'University of Dhaka',
            'location' => 'Dhaka',
        ]);
        }
}

