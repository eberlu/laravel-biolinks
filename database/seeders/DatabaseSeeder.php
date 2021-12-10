<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\User\Profile;
use App\Models\User\Profile\Link;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)
        ->create()
        ->each(function(User $user){

            Profile::factory(1)
            ->create(["user_id" => $user->id])
            ->each(function(Profile $profile) {

                Link::factory(50)->create(["profile_id" => $profile->id]);

            });

        });
    }
}
