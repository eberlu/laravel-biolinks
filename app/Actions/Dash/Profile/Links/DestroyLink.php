<?php

namespace App\Actions\Dash\Profile\Links;
use Illuminate\Http\Request;
use App\Models\User\Profile\Link;

use Lorisleiva\Actions\Concerns\AsAction;

class DestroyLink
{
    use AsAction;

    public function handle($id)
    {
        $link = Link::findOrFail($id);
        $link->delete();
    }

    public function htmlResponse()
    {
        return redirect()->back();
    }
}
