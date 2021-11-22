<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SocialAccount;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Exception;

//use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    //
	use AuthenticatesUsers;
	protected $redirectTo = RouteServiceProvider::HOME;
	
	public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	// Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        return redirect()->route('profile/viewProfile');
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            //$user->avatar = $data->avatar;
            $user->save();
        }

        Auth::login($user);
    }
}

