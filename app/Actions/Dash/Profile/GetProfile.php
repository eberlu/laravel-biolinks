<?php

namespace App\Actions\Dash\Profile;

use Lorisleiva\Actions\Concerns\AsAction;
use Inertia\Inertia;
use App\Models\User;

class GetProfile
{
    use AsAction;

    public function handle(User $user)
    {
        return $user->profile;
    }

    public function htmlResponse($profile)
    {
        return Inertia::render('Profile/Edit', compact('profile'));
    }
}
