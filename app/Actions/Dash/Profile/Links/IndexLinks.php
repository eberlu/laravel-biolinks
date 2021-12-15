<?php

namespace App\Actions\Dash\Profile\Links;

use Lorisleiva\Actions\Concerns\AsAction;
use Inertia\Inertia;

class IndexLinks
{
    use AsAction;

    public function handle($take = 15)
    {
        return \Auth::user()
            ->profile()
            ->with('links')
            ->firstOrFail()
            ->links()
            ->orderBy('created_at', 'desc')
            ->paginate($take);
    }

    public function htmlResponse($links)
    {
        return Inertia::render('Links/Index', compact('links'));
    }
}
