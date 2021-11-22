<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Slider;
use App\SportsCategories;
use App\Cms;
use App\Sports;
use App\Trainer;
use App\Online;
use App\BusinessClaim;
use App\UserBookingDetail;
use App\Repositories\SportsCategoriesRepository;
use App\Repositories\SportsRepository;
use App\Repositories\ProfessionalRepository;
use App\Person;
use App\Discover;
use App\Miscellaneous;
use App\Languages;
use Validator;
use ReCaptcha\ReCaptcha;
use Image;
//use Illuminate\Support\Facades\Input;
use Hash;
use Redirect;
use Response;
use App\Api;
use Str;
use App\MailService;
use DB;
use App\User;
use App\Repositories\UserRepository;
use App\Repositories\ReviewRepository;
use View;

class HomeController extends Controller {

    /**
     * The user repository instance.
     *
     * @var UserRepository
     */
    protected $users;

    public function __construct(UserRepository $users) {

        $this->users = $users;
    }

    public function index() {
        $all_categories = SportsCategories::where('is_deleted', "0")->get();

        $most_searched_sports = Sports::latest()->limit(6)->get();

        $fitnessity_data = Cms::where('status', '1')
                        ->where('content_alias', 'fitnessity')->get();

        $bepart_data = Cms::where('status', '1')
                        ->where('content_alias', 'be_a_part')->get();

        $sliders = Slider::get();

        $trainers = Trainer::limit(5)->get();
        $onlines = Online::limit(9)->get();
        $persons = Person::limit(9)->get();
        $discovers = Discover::limit(3)->get();

        $count_trainer = Trainer::count();
        $count_online = Online::count();
        $count_business = BusinessClaim::count();
        $count_userbooking = UserBookingDetail::count();

        return view('home.index1', [
            'sports_categories' => $all_categories,
            'sliders' => $sliders,
            'most_searched_sports' => $most_searched_sports,
            'fitnessity_data' => $fitnessity_data,
            'trainers' => $trainers,
            'onlines' => $onlines,
            'persons' => $persons,
            'discovers' => $discovers,
            'count_trainer' => $count_trainer,
            'count_online' => $count_online,
            'count_business' => $count_business,
            'count_userbooking' => $count_userbooking,
            'bepart_data' => $bepart_data,
        ]);
    }

    public function all_trainings() {
        /* $all_categories = $this->sports_cat->getAllSportsCategories();

          $most_searched_sports = Sports::get();

          $fitnessity_data = Cms::where('status','1')
          ->where('content_alias','fitnessity')->get();

          $sliders = Slider::get();

          $trainers = Trainer::limit(5)->get();
          $onlines = Online::limit(9)->get();
          $persons = Person::limit(9)->get();
          $discovers = Discover::limit(3)->get();

          $count_trainer = Trainer::count();
          $count_online = Online::count();
          $count_business = BusinessClaim::count();
          $count_userbooking = UserBookingDetail::count(); */


        return view('home.allTrainings');
    }

    public function all_sports() {
        /* $all_categories = $this->sports_cat->getAllSportsCategories();

          $most_searched_sports = Sports::get();

          $fitnessity_data = Cms::where('status','1')
          ->where('content_alias','fitnessity')->get();

          $sliders = Slider::get();

          $trainers = Trainer::limit(5)->get();
          $onlines = Online::limit(9)->get();
          $persons = Person::limit(9)->get();
          $discovers = Discover::limit(3)->get();

          $count_trainer = Trainer::count();
          $count_online = Online::count();
          $count_business = BusinessClaim::count();
          $count_userbooking = UserBookingDetail::count(); */


        return view('home.allSports');
    }

    public function registration() {
        if (Auth::check()) {
            $show_step = Auth::user()->show_step;
        } else {
            $show_step = 1;
        }
        return view('home.registration', ['show_step' => $show_step]);
    }

    public function postRegistration(Request $request) {
        $postArr = $request->all();

        $rules = [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ];



        $validator = Validator::make($postArr, $rules);
        if ($validator->fails()) {
            $errMsg = array();
            foreach ($validator->messages()->getMessages() as $field_name => $messages) {
                $errMsg = $messages;
            }
            $response = array(
                'type' => 'danger',
                'msg' => $errMsg,
            );
            return Response::json($response);
        } else {
            //check for unique email id
            if (!$this->users->validateUser($postArr['email'])) {
                $response = array(
                    'type' => 'danger',
                    'msg' => 'Email already exists. Please select different Email',
                );
                return Response::json($response);
            };
            //check for unique user name
            if (!$this->users->validateUser($postArr['username'])) {
                $response = array(
                    'type' => 'danger',
                    'msg' => 'User name already exists. Please select different Name',
                );
                return Response::json($response);
                //print_r("usefdhfidjhgidfhuighdfb");die;
            };

            if (count($postArr) > 0) {

                $userObj = New User();
                $userObj->firstname = $postArr['firstname'];
                $userObj->lastname = ($postArr['lastname']) ? $postArr['lastname'] : '';
                $userObj->username = $postArr['username'];
                $userObj->password = Hash::make(str_replace(' ', '', $postArr['password']));
                $userObj->email = $postArr['email'];
                $userObj->role = 'customer';
                $userObj->country = 'US';
                $userObj->activated = 0;
                $userObj->phone_number = $postArr['contact'];
                // $userObj->last_ip = '192.168.0.0';
                // $userObj->status = "email_activation_pending";
                $userObj->status = "approved";
                $userObj->buddy_key = $postArr['password'];

                //For signup confirmation 
                $userObj->confirmation_code = Str::random(25);
                $userObj->save();

                if ($userObj) {
                    //send notification email to user
                    // MailService::sendEmailReminder($userObj->id);
                    MailService::sendEmailSignupVerification($userObj->id);

                    $url = "/";
                    if (isset($userObj->confirmation_code) && !empty($userObj->confirmation_code)) {
                        $url = '/register/confirm/' . $userObj->confirmation_code;
                    }

                    $response = array(
                        'type' => 'success',
                        'msg' => 'Thank you for registering with Fitnessity. Please verify your email address.',
                        'redirecturl' => $url,
                    );

                    return Response::json($response);
                } else {

                    $response = array(
                        'type' => 'danger',
                        'msg' => 'Some wrror occured while registering. Please try again later.',
                    );

                    return Response::json($response);
                }
            } else {

                $response = array(
                    'type' => 'danger',
                    'msg' => 'Invalid email or password',
                );

                return Response::json($response);
            }
        }
    }

    public function ResendEmail($code) {

        if (isset($code) && !empty($code)) {

            $user = User::SELECT('id', 'email', 'activated')->where('confirmation_code', $code)->first();

            if (@count($user) > 0 && $user->activated == 1) {
                return redirect('/')->with('alert-success', 'Your account is already verified');
            } else if (@count($user) > 0 && $user->activated == 0) {
                return view::make('home.verified_email')->with('user', $user->toArray());
            } else {
                return redirect('/')->with('alert-danger', 'Confirmation code expired.');
            }
        } else {
            return redirect('/')->with('alert-danger', 'Confirmation code expired.');
        }
    }

    public function UserAccountVerify(Request $request) {
        /* echo $request->confirmation_code;
          exit; */

        if ($request->confirmation_code && $request->confirmation_code != '' && $request->confirmation_code != NULL) {
            $user = User::whereConfirmationCode($request->confirmation_code)->first();
            //echo $user;

            if (!empty($user) > 0 && $user->activated == 0) {
                $user->activated = 1;
                $user->show_step = 2;

                if ($user->save()) {

                    MailService::sendEmailVerifiedAcknowledgement($user->id);
                    Auth::login($user);
                    Auth::loginUsingId($user->id, true);
                    $request->session()->flash('alert-success', 'Your email has been successfully verified!');
                    return redirect('auth/jsModalregister');
                } else {
                    $request->session()->flash('alert-danger', 'Email verification failed. Please contact administrator.');
                    return redirect('/registration');
                }
            } elseif ($user->activated == 1) {
                $request->session()->flash('alert-danger', 'Your email already verified. Please login to access Fitnessity.');
                return redirect('/?success=true');
            } else {
                $request->session()->flash('alert-danger', 'Invalid verification code.');
                return redirect('/registration');
            }
        } else {
            $request->session()->flash('alert-danger', 'Invalid verification code.');
            return redirect('/registration');
        }
    }

    public function VerifyCodeResend(Request $request) {
        $input = $request->all();

        if (isset($input) && !empty($input['user_id'])) {
            $user = User::findOrFail($input['user_id']);

            if (!empty($user)) {

                if ($user->confirmation_code && !empty($user->confirmation_code)) {
                    MailService::resendEmailVerificationCode($user);
                    $response = array(
                        'type' => 'success',
                        'verified' => 'false',
                        'msg' => 'We have re-send verification email on your email address!',
                    );
                    return Response::json($response);
                    exit();
                } else if ($user->activated == 1 && empty($user->confirmation_code)) {
                    $response = array(
                        'type' => 'success',
                        'verified' => 'true',
                        'msg' => 'Your email already verified. Please login to access Fitnessity.',
                    );
                    return Response::json($response);
                    exit();
                } else {
                    $response = array(
                        'type' => 'danger',
                        'verified' => 'false',
                        'msg' => 'Some error occure while resend email! Please try later.',
                    );
                    return Response::json($response);
                    exit();
                }
            } else {
                $response = array(
                    'type' => 'danger',
                    'verified' => 'false',
                    'msg' => 'Some error occure while resend email! Please try later.',
                );
                return Response::json($response);
                exit();
            }
        } else {
            $response = array(
                'type' => 'danger',
                'verified' => 'false',
                'msg' => 'Some error occure while resend email! Please try later.',
            );
            return Response::json($response);
            exit();
        }
    }

}
