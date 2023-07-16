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
        $user = User::where('name', 'Root')->first();

        if (!$user) {
            $user = new User();
            $user->name = 'Root';
            $user->username = 'root';
            $user->email = 'root@root.com';
            $user->password = Hash::make('root');

            $user->save();
        }
    }
}
