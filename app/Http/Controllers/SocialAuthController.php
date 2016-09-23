<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SocialAccountService as Service;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(Service $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        auth()->login($user);

        return redirect()->route('admin.index');
    }
}
