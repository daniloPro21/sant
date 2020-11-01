<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Exception;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('provider_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                toastr()->success('Connecter');
                return redirect('/home');
            } else {
                $newUser = User::create(['phone' => '+237238712732192', 'name' => $user->name, 'role' => 'patient',  'email' => $user->email,'password' => bcrypt('password'), 'provider_id' => $user->id]);
                toastr()->success('Connecter');
                Auth::login($newUser);
                return redirect()->back();
            }
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function googleredirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function googlehandleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            // dd($user);
            $finduser = User::where('provider_id', $user->id)->first();
            if ($finduser) {
                Auth::login($finduser);
                toastr()->success('Connecter');
                return redirect('/home');
            } else {
                $newUser = User::create(['phone' => '+237238712732192','name' => $user->name, 'role' => 'docteur', 'email' => $user->email,'password' => bcrypt('password'), 'provider_id' => $user->id]);
                toastr()->success('Connecter');
                Auth::login($newUser);
                return redirect()->back();
            }
        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }
}