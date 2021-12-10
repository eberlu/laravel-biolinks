<?php

namespace App\Actions\Dash\Profile\Links;

use Lorisleiva\Actions\Concerns\AsAction;
use Inertia\Inertia;

class IndexLinks
{
    use AsAction;

    public function handle()
    {
        return \Auth::user()
            ->profile()
            ->with('links')
            ->firstOrFail()
            ->links;
    }

    public function htmlResponse($links)
    {
        return Inertia::render('Links/Index', compact('links'));
    }
}
