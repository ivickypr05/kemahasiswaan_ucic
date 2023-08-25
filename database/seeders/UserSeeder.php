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
        $user = User::where('name', 'Kemahasiswaan')->first();

        if (!$user) {
            $user = new User();
            $user->name = 'Kemahasiswaan';
            $user->username = 'kemahasiswaan';
            $user->email = 'kemahasiswaan@cic.ac.id';
            $user->password = Hash::make('kemahasiswaan');
            $user->save();
        }
    }
}
