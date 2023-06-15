<?php

namespace App\Http\Controllers\User\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Session;
use Exception;
use App\Models\User;

class FacebookSocialiteController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('setlang');
    }
    public function redirectToFB()
    {
        return Socialite::driver('facebook')->redirect();
    }
    
    public function handleCallback(Request $request)
    {
        $redirectUrl = "";
        if (Session::has('link')) {
            $redirectUrl = Session::get('link');
            Session::forget('link');
        } else {
            $redirectUrl = route('user-dashboard');
        }
    
        try {
            $user = Socialite::driver('facebook')->user();
            $findUser = User::where('email', $user->email)->first();
            
            if (!empty($findUser)) {
                if ($findUser !== null && $findUser->social_type != "facebook" && $findUser->facebook_id != $user->id) {
                    $findUser->facebook_id = $user->id;
                    $findUser->social_type = "facebook";
                    $findUser->save();
                }
                Auth::login($findUser);
                if (Auth::user()->email_verified == 0 || Auth::user()->status == 0) {
                    Auth::logout();
                    if (Auth::user()->email_verified == 0) {
                        return redirect()->back()->with('err', toastrMsg('Your email is not verified!'));
                    } elseif (Auth::user()->status == 0) {
                        return redirect()->back()->with('err', toastrMsg('Your account is disabled'));
                    }
                }
    
                return redirect($redirectUrl);
            }
            else{
                return redirect()->route('user.login')->with('error', 'Email is not exist, You need to signup.');
            }
        } catch (Exception $e) {
            // Handle the exception gracefully, show error message, and redirect back
            return redirect()->route('login')->with('error', 'An error occurred during facebook login.');
        }
    }
}
