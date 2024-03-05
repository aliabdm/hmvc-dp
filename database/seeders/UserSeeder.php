<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(2)->create();
        $user = User::find(1);
        $user->email = "admin@user.com";
        $user->is_admin = true;
        $user->save();

        $user = User::find(2);
        $user->email = "user@user.com";
        $user->save();
    }

}
