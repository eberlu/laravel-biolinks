<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\User;
use App\Models\User\Profile;

class GetProfile
{
    use AsAction;

    public function handle(User $user, Profile $profile, $code)
    {
        $user = $user->where('code', $code)->first();

        if(!$user) 
            $profile = $profile->where('url', $code)->firstOrFail();
        else 
            $profile = $user->profile()->with(['links'])->firstOrFail();

        return $profile;
       
    }

    public function htmlResponse($profile)
    {
        return view('profile', compact('profile'));
    }
}
