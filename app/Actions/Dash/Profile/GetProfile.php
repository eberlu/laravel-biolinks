<?php

namespace App\Actions\Dash\Profile;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\User;

class GetProfile
{
    use AsAction;

    public function handle(User $user)
    {
        return $user->profile;
    }
}
