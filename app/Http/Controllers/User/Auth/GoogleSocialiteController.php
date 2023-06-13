<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Session;
use Exception;
use App\Models\User;

class GoogleSocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function handleCallback(Request $request)
    {
        if (Session::has('link')) {
            $redirectUrl = Session::get('link');
            Session::forget('link');
        } else {
            $redirectUrl = route('user-dashboard');
        }

        try {
            $user = Socialite::driver('google')->user();
            $findUser = $this->findOrCreateUser($user);

            Auth::login($findUser);

            if (Auth::user()->email_verified == 0 || Auth::user()->status == 0) {
                Auth::logout();
                if (Auth::user()->email_verified == 0) {
                    return back()->with('err', toastrMsg('Your email is not verified!'));
                } elseif (Auth::user()->status == 0) {
                    return back()->with('err', toastrMsg('Your account is disabled'));
                }
            }

            return redirect($redirectUrl);
        } catch (Exception $e) {
            // Handle the exception gracefully, show error message, and redirect back
            return redirect()->route('login')->with('error', 'An error occurred during Google login.');
        }
    }


    private function findOrCreateUser($googleUser)
    {
        $user = User::where('social_id', $googleUser->id)->first();
        
        if ($user) {
            return $user;
        } else {
            return User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'social_id' => $googleUser->id,
                'social_type' => 'google',
                'status' => 1,
                'email_verified' => 1,
            ]);
        }
    }
}
