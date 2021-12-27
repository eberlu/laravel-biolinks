<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\User\Profile;

class GetProfileByURL
{
    use AsAction;

    public function handle(Profile $profile, $code)
    {
        return $profile
        ->where('code', $code)
        ->orWhere('url', $code)
        ->with('links', function($q) {
            return $q->orderBy('created_at', 'desc');
        })
        ->firstOrFail();
    }

    public function htmlResponse($profile)
    {
        return view('profile', compact('profile'));
    }
}
