<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use App\Repositories\UserRepository;
use Image;
use Hash;
use Redirect;
use Response;
use Auth;


use Socialize;
use View;
use Illuminate\Support\Facades\Session;
use App\MailService;

class AdminAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */
//AuthenticatesAndRegistersUsers
    use  ThrottlesLogins;

    protected $loginPath = '/admin';

    protected $redirectTo = '/admin';

    /**
     * The user repository instance.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->users = $users;
    }

    public function index()
    {
        return view::make('admin.login');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }



    public function postLogin(Request $request){
        
        $postArr = $request->input();

        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        
        $validator = Validator::make($postArr,$rules);

        if($validator->fails()) {
          $errMsg = array();
            foreach($validator->messages()->getMessages() as $field_name => $messages) {
                $errMsg = $messages;
            }

                $response = array(
                        'type' => 'danger',
                        'msg' => $errMsg,
                    );

                    return Response::json($response);
        } else {

            if (Auth::attempt(['email' => $postArr['email'], 'password' => $postArr['password'], 'role' => "admin"])) {
                // The user is being remembered...
                session_start();
                $_SESSION["myses"] = $request->user();
                $request->session()->flash('alert-success', 'Welcome '.$postArr['email']);
                $response = array(
                        'type' => 'success',
                        'msg' => 'You are logged in successfully',
                        'redirecturl' => '/',
                        'd'=>$request->user()
                    );

                   return Response::json($response);
            }
            else {
                $response = array(
                        'type' => 'danger',
                        'msg' => 'Incorrect Email or Password',
                    );

                    return Response::json($response);
                    exit();
            }
        }
    }

    public function GetForgotpassword()
    {
        return View::make('admin.forgotpassword');
    }

    public function logout(){
        session_destroy(); 
        return Redirect::to('/admin');
    }
}