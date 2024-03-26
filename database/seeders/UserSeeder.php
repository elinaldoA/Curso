<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        if(!User::where('name', 'Elinaldo')->first()){
            User::create([
                'name' => 'Elinaldo',
                'last_name' => 'Agostinho',
                'email' => 'admin@master.com.br',
                'email_verified_at' => now(),
                'password' => Hash::make('admin'),
                'active' => true,
            ]);
        }
    }
}
