<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::updateOrCreate( [

            'role_id'     => 1,
            'name'     => 'MD.Al-Amin Hawladar',
            'username' => 'alamin',
            'email'    => 'alamin@gmail.com',
            'phone'    => '0187669765',
            'password' => bcrypt( '123456789' ),
            'slug'     => 'alamin',

        ] );
    }
}
