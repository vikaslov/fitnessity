<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\MailService;
use DB;
use App\User;
use App\Repositories\UserRepository;
use App\Repositories\ReviewRepository;
use View;
use Validator;
use Session;
use Response;

class LoginController extends Controller {
    
    public function index() {
    	return view('home.login');
    }
    
    public function postLogin(Request $request) {
        
    	$postArr = $request->input();
    	//dd($postArr);
    	$rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        $validator = Validator::make($postArr, $rules);
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
            if (Auth::attempt(['email' => $postArr['email'], 'password' => $postArr['password'], 'activated' => 1])) {
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
            } else {
                $response = array(
                    'type' => 'not_exists',
                    'msg' => 'User details not verified in our database.',
                );
                //$request->session()->flash('error', 'User details not matched.');
                return Response::json($response);
            }
        }
    }
    
    public function logout(Request $request) {
      Auth::logout();
      return redirect('/');
    }
       
}