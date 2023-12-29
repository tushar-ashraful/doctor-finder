<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    private $data = [
        ['name' => 'Complete Project(Full Package)'],
        ['name' => 'Hardware'],
        ['name' => 'Circuit'],
        ['name' => 'Wiring'],
        ['name' => 'Coding/Programing'],
        ['name' => 'Design'],
        ['name' => 'Book (Soft Copy)'],
        ['name' => 'Slide (Soft Copy)'],
        ['name' => 'Circuit & Wiring'],
        ['name' => 'Book & Slide (Soft Copy)'],
    ]; 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Item::insert($this->data);
    }
}
