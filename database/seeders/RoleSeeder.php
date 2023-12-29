<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
	private $data = [
		['name' => 'Admin'],
		['name' => 'Authore'],
		['name' => 'Worker'],
	]; 
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Role::insert($this->data);
    }
}
