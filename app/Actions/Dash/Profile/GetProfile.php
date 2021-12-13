<?php

namespace App\Actions\Dash\Profile;

use Lorisleiva\Actions\Concerns\AsAction;
use Inertia\Inertia;

class GetProfile
{
    use AsAction;

    public function handle()
    {
        return \Auth::user()->profile;
    }

    public function htmlResponse($profile)
    {
        $user = $profile->user;
        return Inertia::render('Profile/Edit', compact('profile', 'user'));
    }
}
