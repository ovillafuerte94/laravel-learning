<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => config('custom.default_admin_name'),
            'email' => config('custom.default_admin_email'),
            'password' => Hash::make(config('custom.default_admin_password')),
            'email_verified_at' => now()
        ]);

        $user->assignRole('admin');
    }
}
