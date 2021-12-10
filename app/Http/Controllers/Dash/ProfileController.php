<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Actions\Dash\Profile\GetProfile;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = \Auth::user();
        $profile = GetProfile::run($user);

        return Inertia::render('Profile/Edit', compact('profile'));
    }
}
