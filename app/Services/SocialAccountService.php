<?php

namespace App\Services;

use App\SocialAccount;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider'         => 'facebook',
            ]);

            $user = User::where('email', $providerUser->getEmail())->first();

            if (!$user) {
                $user           = new User();
                $user->name     = $providerUser->getName();
                $user->email    = $providerUser->getEmail();
                $user->username = $providerUser->getEmail();
                $user->save();
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
