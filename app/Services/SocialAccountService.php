<?php 

namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\SocialAccount;
use App\User;
use Illuminate\Support\Facades\Hash;


class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $account = SocialAccount::whereProvider($social)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) return $account->user;

        $email = $providerUser->getEmail() ?? $providerUser->getNickname();
        $account = new SocialAccount([
            'provider_user_id' => $providerUser->getId(),
            'provider'         => $social
        ]);

        $user = User::whereEmail($email)->first();

        if (!$user) {

            $user = User::create([
                'email'     => $email,
                'phone'     => $providerUser->getId(),
                'name'      => $providerUser->getName(),
                'password'  => Hash::make($providerUser->getName()),
            ]);
        }

        $account->user()->associate($user);
        $account->save();

        return $user;
    }
}