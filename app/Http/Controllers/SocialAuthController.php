<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SocialAccountService as Service;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback(Service $service, $social)
    {

        $user = $service->createOrGetUser(Socialite::driver($social)->user(), $social);

        auth()->login($user);

        return redirect()->route('admin.index');
    }
}
