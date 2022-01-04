<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use \App\Models\User\Profile;

class DownloadProfileCard
{
    use AsAction;

    public function handle($code)
    {
        $profile = Profile::where('code', $code)
            ->orWhere('url', $code)->first();

        $vcard = new \JeroenDesloovere\VCard\VCard();
        $vcard->addName($profile->name);
        $vcard->addCompany($profile->description);
        $vcard->addEmail($profile->email);
        $vcard->addPhoneNumber($profile->phone, 'WORK');
        $vcard->addURL(route('profile', $profile->code));

        return $vcard->download();
    }
}
