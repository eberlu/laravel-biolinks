<?php

namespace App\Actions\Dash\Profile\Links;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\Request;
use App\Models\User\Profile\Link;

class StoreLink
{
    use AsAction;

    public function handle(Request $request)
    {
        $profile_id = \Auth::user()->profile->id;

        return Link::create([
            "title" => $request->get('title'),
            "url" => $request->get('url'),
            "profile_id" => $profile_id,
            "icon" => $request->get('icon')
        ]);
    }

    public function htmlResponse()
    {
        return redirect()->back();
    }

    public function rules() 
    {
        return [
            'title' => 'required|string|max:100',
            'url' => 'required|string|max:100',
        ];
    }
}
