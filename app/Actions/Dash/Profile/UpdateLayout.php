<?php

namespace App\Actions\Dash\Profile;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;

class UpdateLayout
{
    use AsAction;

    public function handle(Request $request)
    {
        $profile = \Auth::user()->profile;
        return $profile->update($request->all());
    }

    public function htmlResponse()
    {
       return redirect()->back();
    }
}
