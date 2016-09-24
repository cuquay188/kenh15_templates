<?php

namespace App\Services;

use App\SocialAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser, $social)
    {
        //Find SocialAccount
        $account = SocialAccount::whereProvider($social)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider'         => $social,
            ]);

            $user = User::where('email', $providerUser->getEmail())->first();

            if (!$user) {
                //Remove facebook orgin img_url (?type=normal)
                $img_url = $providerUser->getAvatar();
                if ($social == 'facebook') {
                    $img_url = substr($img_url, 0, strpos($img_url, '?type'));
                }
                //Create user
                $user           = new User();
                $user->name     = $providerUser->getName();
                $user->email    = $providerUser->getEmail();
                $user->username = $providerUser->getEmail();
                $user->img_url  = $img_url;
                $user->save();
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
