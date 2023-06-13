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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
            $findUser = User::where('social_id', $user->id)->first();
         
            // dd($findUser);

            if ($findUser) {

                $data = Auth::login($findUser);

                if ($findUser->status == 1) {
                    return redirect('/user/dashboard')->with('success', trans('login Successfully'));
                } else {
                    Auth::logout();
                    return redirect('/login')->with('error', trans('NOt Accesible'));
                }

                return redirect('user/dashboard');

            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'google',
                    'password' => encrypt('my-google')
                ]);

                Auth::login($newUser);
                return redirect( $redirectUrl);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
