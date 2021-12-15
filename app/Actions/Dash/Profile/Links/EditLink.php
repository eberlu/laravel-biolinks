<?php

namespace App\Actions\Dash\Profile\Links;

use Lorisleiva\Actions\Concerns\AsAction;
use Inertia\Inertia;
use App\Models\User\Profile\Link;

class EditLink
{
    use AsAction;

    public function handle($id)
    {
        return Link::findOrFail($id);
    }

    public function htmlResponse($link)
    {
        return Inertia::render('Links/Edit', compact('link'));
    }
}
