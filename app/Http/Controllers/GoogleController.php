<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GoogleController extends Controller
{
    public function googlePage()
    {
        return socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('google_id', $googleUser->getId())->first();

        if ($user) {
            Auth::login($user);
        } else {
            $newUser = new User;
            $newUser->name = $googleUser->getName();
            $newUser->email = $googleUser->getEmail();
            $newUser->google_id = $googleUser->getId();
            $newUser->is_doctor = false;
            $newUser->save();

            Auth::login($newUser);
        }

        return redirect('/dashboard');
    }




}
