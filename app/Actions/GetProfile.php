<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\User;

class GetProfile
{
    use AsAction;

    public function handle(User $user, $code)
    {
        $user = $user->where('code', $code)->firstOrFail();
        $profile = $user->profile()->with(['links'])->first();
        return $profile;
       
    }

    public function htmlResponse($profile)
    {
        return view('profile', compact('profile'));
    }
}
