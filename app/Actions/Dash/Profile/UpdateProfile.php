<?php

namespace App\Actions\Dash\Profile;

use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateProfile
{
    use AsAction;

    public function handle(Request $request)
    {
        $profile = \Auth::user()->profile;
        return $profile->update($request->all());
    }

    public function htmlResponse($profile)
    {
       return redirect()->back();
    }

    public function rules() 
    {
        return [
            'nickname' => 'required|string|max:50',
            'description' => 'required|string|max:150',
            'url' => 'required|string|max:60|unique:profiles,url,'.\Auth::user()->profile->id
        ];
    }
}
