<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Administrator";
        $user->email = "admin@admin.com";
        $user->password = bcrypt("1234");
        $user->save();
    }
}
