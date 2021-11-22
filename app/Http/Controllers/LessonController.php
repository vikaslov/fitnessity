<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\Stripes\StripePay;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Repositories\BookingRepository;
use App\Repositories\SportsRepository;
use Illuminate\Support\Facades\Log;
use Auth;
use App\Jobpostquestions;
use Redirect;
use App\Miscellaneous;
use App\Quote;
use View;
use DB;
use Response;
use Validator;
use App\UserBookingStatus;
use App\User;
use App\Evidents;
use App\UserProfessionalDetail;
use App\UserService;
use App\CompanyInformation;
use App\BusinessServices;
use App\BusinessService;
use App\BusinessPriceDetails;
use App\UserBookingDetail;
use App\Fit_Cart;
use App\Sports;
use App\Payment;
use App\UserFamilyDetail;
use App\MailService;
use App\Zip_code;
use Illuminate\Pagination\LengthAwarePaginator;

/*  */

class LessonController extends Controller {

    protected $sports;

    public function __construct(UserRepository $users, BookingRepository $bookings, Request $request, SportsRepository $sports) {
        $this->middleware('auth');

        $this->users = $users;
        $this->bookings = $bookings;
        $this->sports = $sports;
        /*
          if (! Gate::allows('booking_access')) {
          $request->session()->flash('alert-danger', 'Access Restricted');
          return redirect('/');
          } */
    }

    public function jsModallesson($modelName, $sportId = 0) {
        $s = Sports::where('id', $sportId)->first();
        // print_r($sportId);die;
        if ($s) {
            $booking_option = $s->booking_option;
        } else {
            $booking_option = '';
        }
        // print_r($booking_option);die;
        $sportsListRaw = $this->sports->getAlphabetsWiseSportsNames();
        $sportsList = array();
        $totalSports = 0;
        if ($sportsListRaw) {
            foreach ($sportsListRaw as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    $totalSports+=(count($value1->child) + 1);
                    $sportsList[] = $value1;
                }
            }
        }
        $programType = Miscellaneous::programType();
        $programFor = Miscellaneous::programFor();
        $numberOfPeople = Miscellaneous::numberOfPeople();
        $ageRange = Miscellaneous::ageRange();
        $expLevel = Miscellaneous::expLevel();
        $serviceLocation = Miscellaneous::serviceLocation();
        $pFocuses = Miscellaneous::pFocuses();
        $duration = Miscellaneous::duration();
        $servicePriceOption = Miscellaneous::servicePriceOption();
        $specialDeals = Miscellaneous::specialDeals();
        $activity = Miscellaneous::activity();
        $teaching = Miscellaneous::teaching();
        $languages = Miscellaneous::getLanguages();
        $timeSlots = Miscellaneous::getTimeSlot();
        return view('lessons.' . $modelName, [
            'booking_option' => $booking_option,
            'sports_list' => $sportsList,
            'totalSports' => $totalSports,
            'selectedSportId' => $sportId,
            'programType' => $programType,
            'programFor' => $programFor,
            'numberOfPeople' => $numberOfPeople,
            'ageRange' => $ageRange,
            'expLevel' => $expLevel,
            'serviceLocation' => $serviceLocation,
            'pFocuses' => $pFocuses,
            'duration' => $duration,
            'servicePriceOption' => $servicePriceOption,
            'specialDeals' => $specialDeals,
            'activity' => $activity,
            'teaching' => $teaching,
            'languages' => $languages,
            'timeSlots' => $timeSlots
        ]);
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    /* public function index(Request $request)
      {
      return view('tasks.index', [
      'tasks' => $this->tasks->forUser($request->user()),
      ]);
      } */

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    /* public function store(Request $request)
      {
      $this->validate($request, [
      'name' => 'required|max:255',
      ]);

      $request->user()->tasks()->create([
      'name' => $request->name,
      ]);

      return redirect('/tasks');
      } */

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    /* public function destroy(Request $request, Task $task)
      {
      $this->authorize('destroy', $task);

      $task->delete();

      return redirect('/tasks');
      } */

    /* public function testTwilio(Request $request)
      {
      require asset('/twilio/sdk/Services/Twilio.php');
      //        require asset('/css/material-charts.css');die;
      // Create an authenticated client for the Twilio API
      $client = new Services_Twilio($_ENV['TWILIO_ACCOUNT_SID'], $_ENV['TWILIO_AUTH_TOKEN']);

      // Use the Twilio REST API client to send a text message
      $m = $client->account->messages->sendMessage(
      $_ENV['TWILIO_NUMBER'], // the text will be sent from your Twilio number
      $number, // the phone number the text will be sent to
      $message // the body of the text message
      );

      // Return the message object to the browser as JSON
      return $m;
      } */

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function PostQuotes(Request $request) {
        // print_r("sad");die;
        //$postArr = Input::all();
        $postArr = $request->all();

        if (isset($postArr) && !empty($postArr)) {
            $data = array();
            $data['user_id'] = Auth::User()->id;
            $other = "Others";
            if (isset($postArr['sport']) && $postArr['sport'] === 'true') {
                $data['sport'] = $postArr['othersports'];
            } else {
                $data['sport'] = $postArr['sport'];
            }
            $Sports = Sports::where('id', $postArr['sport'])->get();
            $postArr['question']['sport']['answer'] = $Sports[0]['sport_name'];
            $data['booking_type'] = "quick";
            $data['zipcode'] = isset($postArr['zipcode']) ? $postArr['zipcode'] : '';
            $data['quote_by_text'] = ($postArr['notificationby'] === 'email_text') ? 1 : 0;
            $data['quote_by_email'] = ($postArr['notificationby'] === 'email') ? 1 : 0;
            $data['question'] = $postArr['question'];
            $data['status'] = "requested";

            $status = $this->bookings->saveBookingStatus($data);
            $msgType = (isset($status['alert-type'])) ? $status['alert-type'] : $status['type'];
            $request->session()->flash($msgType, $status['msg']);
            // print_r("hell");die;
            return Redirect::to('/mybooking')->with('message', $status['msg']);
        }
    }

    public function PostSubmitQuote() {
        //$inputObj = Input::all();
        $inputObj = $request->all();
        $userId = Auth::User()->id;
        if (isset($userId) && !empty($userId)) {
            if (!isset($inputObj['submitquotes']) || empty($inputObj['submitquotes'])) {
                return redirect::back()->withError(['error' => 'Please Provide Proper Quote']);
            } else {
                if (isset($inputObj['jobid']) && isset($userId)) {
                    $qutObj = Quote::SELECT('*')->WHERE('job_id', '=', $inputObj['jobid'])->Where('user_id', '=', $userId)->first();
                    if ($qutObj) {
                        $qutObj->job_id = $inputObj['jobid'];
                        $qutObj->user_id = $userId;
                        $qutObj->quote = $inputObj['submitquotes'];
                        $qutObj->save();
                    } else {
                        $qutObj = new Quote();
                        $qutObj->job_id = $inputObj['jobid'];
                        $qutObj->user_id = $userId;
                        $qutObj->quote = $inputObj['submitquotes'];
                        $qutObj->save();
                    }
                }
                if ($qutObj) {
                    return redirect::to('/jobposts')->with('message', 'Quote submitted successfully');
                }
            }
        } else {
            return redirect::to('/')->withError(['error' => 'Please Login into the system']);
        }
    }

    public function GetjobsSubmit($id) {
        if (isset($id) && !empty($id)) {
            $quoteObj = Quote::SELECT('job_id', 'quote', 'user_id')->where('job_id', '=', $id)->first();
            $qutObj = array();
            $userQut = "";
            if ($quoteObj) {
                $userQut = $quoteObj['quote'];
            }
            $qutObj['jobid'] = $id;
            $qutObj['quote'] = $userQut;
        }
        return view::make('jobpost.submitQuote')->with('qutObj', $qutObj);
    }

    /* sam filter start */

    public function samfilter(Request $r) {
        $output = '';
        $page = $r->page ? $r->page : 1;
        $offset = ($page * 9) - 9;
        parse_str($r->data, $output);
        $filter['professional_type'] = (isset($output['professional_type']) && ($output['professional_type'] !== "")) ? $output['professional_type'] : null;
        $filter['selected_sport'] = (isset($output['selected_sport']) && ($output['selected_sport'] !== "")) ? $output['selected_sport'] : null;
        $filter['activity_for'] = (isset($output['activity_for']) && ($output['activity_for'] !== "")) ? $output['activity_for'] : null;
        $filter['activity_type'] = (isset($output['activity_type']) && ($output['activity_type'] !== "")) ? $output['activity_type'] : null;
        $filter['age_range'] = (isset($output['age_range']) && ($output['age_range'] !== "")) ? $output['age_range'] : null;
        $filter['language'] = (isset($output['language']) && ($output['language'] !== "")) ? $output['language'] : null;
        $filter['gender'] = (isset($output['gender']) && ($output['gender'] !== "")) ? $output['gender'] : null;
        $filter['activity_exp'] = (isset($output['activity_exp']) && ($output['activity_exp'] !== "")) ? $output['activity_exp'] : null;
        $filter['personality_habit'] = (isset($output['personality_habit']) && ($output['personality_habit'] !== "")) ? $output['personality_habit'] : null;
        $filter['fitness_goal'] = (isset($output['fitness_goal']) && ($output['fitness_goal'] !== "")) ? $output['fitness_goal'] : null;
        $filter['activity_location'] = (isset($output['activity_location']) && ($output['activity_location'] !== "")) ? $output['activity_location'] : null;
        $AllProfessionals = $this->filter($r, $filter);
        $AllProfessionals = new LengthAwarePaginator(
                array_slice($AllProfessionals, $offset, 9, true), count($AllProfessionals), 9, $page, ['path' => $r->url(), 'query' => $r->query()]
        );
        $sport_names = $this->sports->getAllSportsNames();
        return view('jobpost.search', compact('AllProfessionals', 'sport_names'));
    }

    public function filter($request, $filter) {

        $companys = [];
        //$query = CompanyInformation::get();

        if ($filter['professional_type'] != null) {
            $company_ids = [];
            foreach ($filter['professional_type'] as $data) {
                $str = ':"' . $data;
                $my_service_data = UserService::where('company_id', '!=', null)->where('servicetype', 'LIKE', '%' . $str . '%')->get();
                foreach ($my_service_data as $value2) {
                    array_push($company_ids, $value2['company_id']);
                }
            }
            $company = CompanyInformation::whereIn('id', $company_ids)->get()->toArray();
            if (count($company) != 0) {
                $companys = array_merge($companys, $company);
            }
        }
        if ($filter['selected_sport'] != null) {
            $company_ids = [];
            $my_service_data = UserService::where('company_id', '!=', null)->where('sport', $filter['selected_sport'])->get();
            foreach ($my_service_data as $value2) {
                array_push($company_ids, $value2['company_id']);
            }
            $company = CompanyInformation::whereIn('id', $company_ids)->get()->toArray();
            if (count($company) != 0) {
                $companys = array_merge($companys, $company);
            }
        }
        if ($filter['activity_for'] != null) {
            $company_ids = [];
            foreach ($filter['activity_for'] as $data) {
                $str = ':"' . $data;
                $my_service_data = UserService::where('company_id', '!=', null)->where('activitydesignsfor', 'LIKE', '%' . $str . '%')->get();
                foreach ($my_service_data as $value2) {
                    array_push($company_ids, $value2['company_id']);
                }
            }
            $company = CompanyInformation::whereIn('id', $company_ids)->get()->toArray();
            if (count($company) != 0) {
                $companys = array_merge($companys, $company);
            }
        }
        if ($filter['activity_type'] != null) {
            $company_ids = [];
            foreach ($filter['activity_type'] as $data) {
                $str = ':"' . $data;

                $my_service_data = UserService::where('company_id', '!=', null)->where('activitytype', 'LIKE', '%' . $str . '%')->get();
                foreach ($my_service_data as $value2) {
                    array_push($company_ids, $value2['company_id']);
                }
            }
            // dd($company_ids);
            $company = CompanyInformation::whereIn('id', $company_ids)->get()->toArray();
            if (count($company) != 0) {
                $companys = array_merge($companys, $company);
            }
        }
        if ($filter['age_range'] != null) {
            $company_ids = [];
            foreach ($filter['age_range'] as $data) {
                $str = ':"' . $data;

                $my_service_data = UserService::where('company_id', '!=', null)->where('agerange', 'LIKE', '%' . $str . '%')->get();
                foreach ($my_service_data as $value2) {
                    array_push($company_ids, $value2['company_id']);
                }
            }
            $company = CompanyInformation::whereIn('id', $company_ids)->get()->toArray();
            if (count($company) != 0) {
                $companys = array_merge($companys, $company);
            }
        }
        if ($filter['language'] != null) {
            $company_ids = [];
            foreach ($filter['language'] as $data) {
                $str = ':"' . $data;

                $my_service_data = UserProfessionalDetail::where('company_id', '!=', null)->where('languages', 'LIKE', '%' . $str . '%')->get();
                foreach ($my_service_data as $value2) {
                    array_push($company_ids, $value2['company_id']);
                }
            }
            $company = CompanyInformation::whereIn('id', $company_ids)->get()->toArray();
            if (count($company) != 0) {
                $companys = array_merge($companys, $company);
            }
        }
        if (@$filter['location'] != null) {
            $company = CompanyInformation::where('city', 'LIKE', $filter['location'] . '%')->get()->toArray();
            if (count($company) != 0) {
                $companys = array_merge($companys, $company);
            }
        }
        if ($filter['activity_exp'] != null) {
            $company_ids = [];
            foreach ($filter['activity_exp'] as $data) {
                $str = ':"' . $data;
                $my_service_data = UserProfessionalDetail::where('company_id', '!=', null)->where('experience_level', 'LIKE', '%' . $str . '%')->get();
                foreach ($my_service_data as $value2) {
                    array_push($company_ids, $value2['company_id']);
                }
            }
            $company = CompanyInformation::whereIn('id', $company_ids)->get()->toArray();
            if (count($company) != 0) {
                $companys = array_merge($companys, $company);
            }
        }
        if ($filter['personality_habit'] != null) {
            $company_ids = [];
            foreach ($filter['personality_habit'] as $data) {
                $str = ':"' . $data;
                $my_service_data = UserProfessionalDetail::where('company_id', '!=', null)->where('personality', 'LIKE', '%' . $str . '%')->get();
                foreach ($my_service_data as $value2) {
                    array_push($company_ids, $value2['company_id']);
                }
            }
            $company = CompanyInformation::whereIn('id', $company_ids)->get()->toArray();
            if (count($company) != 0) {
                $companys = array_merge($companys, $company);
            }
        }
        if ($filter['fitness_goal'] != null) {
            foreach ($filter['fitness_goal'] as $value) {
                $query->where('details.goals_option', 'like', '%' . $value . '%');
            }
        }
        if ($filter['activity_location'] != null) {
            $company_ids = [];
            if(isset($request->activity_location)) {
            foreach ($request->activity_location as $data) {
                $str = ':"' . $data;
                $my_service_data = UserProfessionalDetail::where('company_id', '!=', null)->where('work_locations', 'LIKE', '%' . $str . '%')->get();
                foreach ($my_service_data as $value2) {
                    array_push($company_ids, $value2['company_id']);
                }
            }
            }
            $company = CompanyInformation::whereIn('id', $company_ids)->get()->toArray();
            if (count($company) != 0) {
                //array_push($companys,$company);
                $companys = array_merge($companys, $company);
            }
        }

//   $resultnew =  new LengthAwarePaginator(
//     			array_slice($result, $offset, $perPage, true),  
//     			count($result), 
//     			$perPage, 
//     			$page, 
//     			['path' => $request->url(), 'query' => $request->query()]  
//     		);
        return $companys;
        //return $query->groupBy('users.id')->paginate(9);
    }

    public function filter1($filter) {
        $query = User::select('users.*', 'users.id AS professional_id', DB::raw('group_concat(distinct(CONCAT(UCASE(LEFT(service.sport, 1))))) as user_sports'), 'reviews.avg_rating', 'users_favourite.favourite_user_id as fav_user_id')
                ->leftjoin("user_services as service", DB::raw('service.user_id'), '=', 'users.id')
                ->leftjoin("user_professional_details as details", DB::raw('details.user_id'), '=', 'users.id')
                ->with('states')
                ->leftjoin('users_favourite', function ($join) {
                    $join->on('users_favourite.favourite_user_id', '=', 'users.id');
                    $join->where('users_favourite.user_id', '=', Auth::user()->id);
                })
                ->leftjoin(DB::raw('(select reviewfor_userid,round(avg(rating),2) as avg_rating from reviews group by reviewfor_userid) as reviews '), DB::raw('reviews.reviewfor_userid'), '=', 'users.id')
                ->where('users.is_deleted', '0')
                ->where('users.role', 'business')
                ->where('users.activated', 1);

        // echo $filter['professional_type'];die;
        if ($filter['professional_type'] != null) {
            foreach ($filter['professional_type'] as $value) {
                $query->where('service.servicetype', 'like', '%' . $value . '%');
            }
        }
        if ($filter['selected_sport'] != null) {
            $query->where("service.sport", $filter['selected_sport']);
        }
        if ($filter['activity_for'] != null) {
            foreach ($filter['activity_for'] as $value) {
                $query->where('service.activitydesignsfor', 'like', '%' . $value . '%');
            }
        }
        if ($filter['activity_type'] != null) {

            foreach ($filter['activity_type'] as $value) {
                $query->where('service.activitytype', 'like', '%' . $value . '%');
            }
        }
        if ($filter['age_range'] != null) {
            foreach ($filter['age_range'] as $value) {
                $query->where('service.agerange', 'like', '%' . $value . '%');
            }
        }
        if ($filter['language'] != null) {
            foreach ($filter['language'] as $value) {
                $query->where('details.languages', 'like', '%' . $value . '%');
            }
        }
        if (@$filter['location'] != null) {
            if (is_numeric($filter['location'])) {
                $query->where('users.zipcode', 'like', '%' . @$filter['location'] . '%');
            } else {
                $query->where('users.address', 'like', '%' . @$filter['location'] . '%');
            }
        }
        if ($filter['activity_exp'] != null) {
            
        }
        if ($filter['personality_habit'] != null) {

            foreach ($filter['personality_habit'] as $value) {
                $query->where('details.personality', 'like', '%' . $value . '%');
            }
        }
        if ($filter['fitness_goal'] != null) {
            foreach ($filter['fitness_goal'] as $value) {
                $query->where('details.goals_option', 'like', '%' . $value . '%');
            }
        }
        if ($filter['activity_location'] != null) {

            foreach ($filter['activity_location'] as $value) {
                $query->where('service.servicelocation', 'like', '%' . $value . '%');
            }
        }
        return $query->groupBy('users.id')->paginate(9);
    }

    /* sam filter end */

    public function getDirecthire(Request $request) {
        if (isset($request->selected_sport)) {
            $request->session()->put('selected_sport', $request->selected_sport);
        } else {
            $request->session()->forget('selected_sport');
        }

        if (isset($request->level_of_experience)) {
            $request->session()->put('level_of_experience', $request->level_of_experience);
        } else {
            $request->session()->forget('level_of_experience');
        }

        if (isset($request->who_is_training)) {
            $request->session()->put('who_is_training', $request->who_is_training);
        } else {
            $request->session()->forget('who_is_training');
        }

        if (isset($request->gender)) {
            $request->session()->put('gender', $request->gender);
        } else {
            $request->session()->forget('gender');
        }

        if (isset($request->personality)) {
            $request->session()->put('personality', $request->personality);
        } else {
            $request->session()->forget('personality');
        }

        if (isset($request->availability_days)) {
            $request->session()->put('availability_days', $request->availability_days);
        } else {
            $request->session()->forget('availability_days');
        }

        if (isset($request->selected_location)) {
            $request->session()->put('selected_location', $request->selected_location);
            if ($request->selected_location == '') {
                //If selected_location is not set -> unset miles_radius_filter  
                $request->session()->forget('miles_radius_filter');
            } else {
                //If selected_location and miles_radius_filter both are set  
                if (isset($request->miles_radius_filter)) {
                    $request->session()->put('miles_radius_filter', $request->miles_radius_filter);
                } else {
                    $request->session()->forget('miles_radius_filter');
                }
            }
        } else {
            $request->session()->forget('selected_location');
            //If selected_location is not set -> unset miles_radius_filter  
            $request->session()->forget('miles_radius_filter');
        }

        if (isset($request->selected_location_lat)) {
            $request->session()->put('selected_location_lat', $request->selected_location_lat);
        } else {
            $request->session()->forget('selected_location_lat');
        }

        if (isset($request->selected_location_lng)) {
            $request->session()->put('selected_location_lng', $request->selected_location_lng);
        } else {
            $request->session()->forget('selected_location_lng');
        }

        if (isset($request->professional_type)) {
            $request->session()->put('professional_type', $request->professional_type);
        } else {
            $request->session()->forget('professional_type');
        }

        if (isset($request->filter_review_star)) {
            $request->session()->put('filter_review_star', $request->filter_review_star);
        } else {
            $request->session()->forget('filter_review_star');
        }

        $selectedSpot = $request->session()->get('selected_sport') ? $request->session()->get('selected_sport') : null;
        $levelOfExp = $request->session()->get('level_of_experience') ? $request->session()->get('level_of_experience') : null;
        $whoIsTraining = $request->session()->get('who_is_training') ? $request->session()->get('who_is_training') : null;
        $gender = $request->session()->get('gender') ? $request->session()->get('gender') : null;
        $personality = $request->session()->get('personality') ? $request->session()->get('personality') : null;
        $availability_days = $request->session()->get('availability_days') ? $request->session()->get('availability_days') : null;
        $selected_location = $request->session()->get('selected_location') ? $request->session()->get('selected_location') : null;
        $selected_location_lat = $request->session()->get('selected_location_lat') ? $request->session()->get('selected_location_lat') : null;
        $selected_location_lng = $request->session()->get('selected_location_lng') ? $request->session()->get('selected_location_lng') : null;
        $miles_radius_filter = $request->session()->get('miles_radius_filter') ? $request->session()->get('miles_radius_filter') : 0;
        $professional_type = $request->session()->get('professional_type') ? $request->session()->get('professional_type') : '1';
        $filter_review_star = $request->session()->get('filter_review_star') ? $request->session()->get('filter_review_star') : null;

        $sports = $this->sports->getAlphabetsWiseSportsNames();
        $sport_names = $this->sports->getAllSportsNames();
        $businessType = Miscellaneous::businessType();
        $programType = Miscellaneous::programType();
        $programFor = Miscellaneous::programFor();
        $numberOfPeople = Miscellaneous::numberOfPeople();
        $ageRange = Miscellaneous::ageRange();
        $expLevel = Miscellaneous::expLevel();
        $serviceLocation = Miscellaneous::serviceLocation();
        $pFocuses = Miscellaneous::pFocuses();
        $duration = Miscellaneous::duration();
        $servicePriceOption = Miscellaneous::servicePriceOption();
        $specialDeals = Miscellaneous::specialDeals();
        $activity = Miscellaneous::activity();
        $teaching = Miscellaneous::teaching();
        $languages = Miscellaneous::getLanguages();
        $timeSlots = Miscellaneous::getTimeSlot();
        $sports_select = '';
        if ($sports) {
            $sports_select .= "<option value=''>Choose Activity</option>";
            foreach ($sports as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    if (count($value1->child)) {
                        $sports_select .= "<optgroup label='" . $value1->title . "'>";
                        foreach ($value1->child as $key2 => $value2) {
                            $selected = null; // ($service==$key2)?"selected":"";
                            $sports_select .= "<option value='" . $key2 . "' " . $selected . " >" . $value2 . "</option>";
                        }
                        $sports_select .= "</optgroup>";
                    } else {
                        $selected = null; //($service==$value1->value)?"selected":"";
                        $sports_select .= "<option value='" . $value1->value . "' " . $selected . ">" . $value1->title . "</option>";
                    }
                }
            }
        }

        $all = CompanyInformation::paginate(20);

        return view('jobpost.directhire', [
            'AllProfessionals' => $all,
            'sports' => $sports,
            'sport_names' => $sport_names,
            'businessType' => $businessType,
            'pageTitle' => "DIRECT HIRE",
            'activity' => $activity,
            'programType' => $programType,
            'ageRange' => $ageRange,
            'alllanguages' => $languages,
            'pFocuses' => $pFocuses,
            'serviceLocation' => $serviceLocation,
            'sports_select' => $sports_select,
        ]);
    }

    public function getInstanthire(Request $request) {
        if (isset($request->selected_sport)) {
            $request->session()->put('selected_sport', $request->selected_sport);
        } else {
            $request->session()->forget('selected_sport');
        }
        
        if (isset($request->level_of_experience)) {
            $request->session()->put('level_of_experience', $request->level_of_experience);
        } else {
            $request->session()->forget('level_of_experience');
        }

        if (isset($request->who_is_training)) {
            $request->session()->put('who_is_training', $request->who_is_training);
        } else {
            $request->session()->forget('who_is_training');
        }

        if (isset($request->gender)) {
            $request->session()->put('gender', $request->gender);
        } else {
            $request->session()->forget('gender');
        }

        if (isset($request->personality)) {
            $request->session()->put('personality', $request->personality);
        } else {
            $request->session()->forget('personality');
        }

        if (isset($request->availability_days)) {
            $request->session()->put('availability_days', $request->availability_days);
        } else {
            $request->session()->forget('availability_days');
        }

        if (isset($request->selected_location)) {
            $request->session()->put('selected_location', $request->selected_location);
            if ($request->selected_location == '') {
                //If selected_location is not set -> unset miles_radius_filter  
                $request->session()->forget('miles_radius_filter');
            } else {
                //If selected_location and miles_radius_filter both are set  
                if (isset($request->miles_radius_filter)) {
                    $request->session()->put('miles_radius_filter', $request->miles_radius_filter);
                } else {
                    $request->session()->forget('miles_radius_filter');
                }
            }
        } else {
            $request->session()->forget('selected_location');
            //If selected_location is not set -> unset miles_radius_filter  
            $request->session()->forget('miles_radius_filter');
        }

        if (isset($request->selected_location_lat)) {
            $request->session()->put('selected_location_lat', $request->selected_location_lat);
        } else {
            $request->session()->forget('selected_location_lat');
        }

        if (isset($request->selected_location_lng)) {
            $request->session()->put('selected_location_lng', $request->selected_location_lng);
        } else {
            $request->session()->forget('selected_location_lng');
        }

        if (isset($request->professional_type)) {
            $request->session()->put('professional_type', $request->professional_type);
        } else {
            $request->session()->forget('professional_type');
        }

        if (isset($request->filter_review_star)) {
            $request->session()->put('filter_review_star', $request->filter_review_star);
        } else {
            $request->session()->forget('filter_review_star');
        }

        $selectedSpot = $request->session()->get('selected_sport') ? $request->session()->get('selected_sport') : null;
        $levelOfExp = $request->session()->get('level_of_experience') ? $request->session()->get('level_of_experience') : null;
        $whoIsTraining = $request->session()->get('who_is_training') ? $request->session()->get('who_is_training') : null;
        $gender = $request->session()->get('gender') ? $request->session()->get('gender') : null;
        $personality = $request->session()->get('personality') ? $request->session()->get('personality') : null;
        $availability_days = $request->session()->get('availability_days') ? $request->session()->get('availability_days') : null;
        $selected_location = $request->session()->get('selected_location') ? $request->session()->get('selected_location') : null;
        $selected_location_lat = $request->session()->get('selected_location_lat') ? $request->session()->get('selected_location_lat') : null;
        $selected_location_lng = $request->session()->get('selected_location_lng') ? $request->session()->get('selected_location_lng') : null;
        $miles_radius_filter = $request->session()->get('miles_radius_filter') ? $request->session()->get('miles_radius_filter') : 0;
        $professional_type = $request->session()->get('professional_type') ? $request->session()->get('professional_type') : '1';
        $filter_review_star = $request->session()->get('filter_review_star') ? $request->session()->get('filter_review_star') : null;

        $sports = $this->sports->getAlphabetsWiseSportsNames();
        $sport_names = $this->sports->getAllSportsNames();
        $businessType = Miscellaneous::businessType();
        $programType = Miscellaneous::programType();
        $programFor = Miscellaneous::programFor();
        $numberOfPeople = Miscellaneous::numberOfPeople();
        $ageRange = Miscellaneous::ageRange();
        $expLevel = Miscellaneous::expLevel();
        $serviceLocation = Miscellaneous::serviceLocation();
        $pFocuses = Miscellaneous::pFocuses();
        $duration = Miscellaneous::duration();
        $servicePriceOption = Miscellaneous::servicePriceOption();
        $specialDeals = Miscellaneous::specialDeals();
        $activity = Miscellaneous::activity();
        $teaching = Miscellaneous::teaching();
        $languages = Miscellaneous::getLanguages();
        $timeSlots = Miscellaneous::getTimeSlot();
        $sports_select = '';
        if ($sports) {
            $sports_select .= "<option value=''>Choose Activity</option>";
            foreach ($sports as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    if (count($value1->child)) {
                        $sports_select .= "<optgroup label='" . $value1->title . "'>";
                        foreach ($value1->child as $key2 => $value2) {
                            $selected = null; // ($service==$key2)?"selected":"";
                            $sports_select .= "<option value='" . $key2 . "' " . $selected . " >" . $value2 . "</option>";
                        }
                        $sports_select .= "</optgroup>";
                    } else {
                        $selected = null; //($service==$value1->value)?"selected":"";
                        $sports_select .= "<option value='" . $value1->value . "' " . $selected . ">" . $value1->title . "</option>";
                    }
                }
            }
        }

        $companyData = $servicePrice = $businessSpec = [];
        $serviceData = BusinessServices::where('instant_booking', 1)->get();
        if (isset($serviceData)) {
            foreach ($serviceData as $service) {
                $company = CompanyInformation::where('id', $service['cid'])->get();
                $company = isset($company[0]) ? $company[0] : [];
                if(!empty($company)) {
                $companyData[$company['id']][] = $company;
                }
                
                $price = BusinessPriceDetails::where('cid', $service['cid'])->get();
                $price = isset($price[0]) ? $price[0] : [];
                if(!empty($company)) {
                $servicePrice[$company['id']][] = $price;
                }
                
                $business_spec = BusinessService::where('cid', $service['cid'])->get();
                $business_spec = isset($business_spec[0]) ? $business_spec[0] : [];
                if(!empty($company)) {
                $businessSpec[$company['id']][] = $business_spec;
                }
            }
        }
        //$servicesData = isset($servicesData[0]) ? $servicesData[0] : [];
        //dd($serviceData[0]);
        return view('jobpost.instanthire', [
            'serviceData' => $serviceData,
            'companyData' => $companyData,
            'servicePrice' => $servicePrice,
            'businessSpec' => $businessSpec,
            'sports' => $sports,
            'sport_names' => $sport_names,
            'businessType' => $businessType,
            'pageTitle' => "DIRECT HIRE",
            'activity' => $activity,
            'programType' => $programType,
            'ageRange' => $ageRange,
            'alllanguages' => $languages,
            'pFocuses' => $pFocuses,
            'serviceLocation' => $serviceLocation,
            'sports_select' => $sports_select,
        ]);
    }

    public function getBookingServiceData(Request $request) {
        $search_string = "%" . $request->date . "%";
        $data = UserService::where('user_id', $request->user_id)->where('available_dates', 'LIKE', $search_string)->get();
        // return resposne()->json(['status'=>200,'data'=>$data]);
        foreach ($data as $value) {
            $value['serve_time_slot'] = json_decode($value['serve_time_slot']);
            $numberofpeople = json_decode($value['numberofpeople'], true);
            $people = $numberofpeople[0];
            $booking = UserBookingStatus::where('business_id', $request->user_id)->where('service_id', $value['id'])->where('status', 'confirmed')->get();
            $pp = 0;
            foreach ($booking as $value2) {
                $det = UserBookingDetail::where('booking_id', $value2['id'])->first();
                $d = json_decode($det->booking_detail, true);
                $pp = $pp + $d['numberofpersons'];
            }
            $value['available_seats'] = $people - $pp;
        }
        return response()->json(['status' => 200, 'data' => $data]);
    }

    public function directhireBookProfile($user_id) {
        if ($user_id == Auth::User()->id) {
            return redirect('/')->with('alert-info', "You are not able to view this profile at this time");
        }

        // $sports = Miscellaneous::getMiscellaneous('sports', 'title', true);
        $sports = $this->sports->getAlphabetsWiseSportsNames();
        $sports_names = $this->sports->getAllSportsNames();
        $sports_child_parent = $this->sports->getSportsChildParentWise();

        $UserProfileDetail = $this->users->getUserProfileDetail1($user_id);

        $userSpotPrice = $userSport = array();

        if (count($UserProfileDetail['service']) > 0) {
            foreach ($UserProfileDetail['service'] as $service) {

                if (@$sports_child_parent[$service['sport']] > 0) {
                    if (isset($sports_names[$service['sport']])) {
                        $userSport[@$sports_names[@$sports_child_parent[$service['sport']]]]['child'][$service['sport']] = @$sports_names[$service['sport']];
                        $userSpotPrice[$service['sport']] = $service['price'];
                    }
                } else {
                    if (isset($sports_names[$service['sport']])) {
                        $userSport[@$sports_names[$service['sport']]]['self'][$service['sport']] = @$sports_names[$service['sport']];
                        $userSpotPrice[$service['sport']] = $service['price'];
                    }
                }
            }
        }
        $sports_select = '';
        if ($sports) {
            $sports_select .= "<option value=''>Choose Activity</option>";
            foreach ($sports as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    if (count($value1->child)) {
                        $sports_select .= "<optgroup label='" . $value1->title . "'>";
                        foreach ($value1->child as $key2 => $value2) {
                            $selected = null; // ($service==$key2)?"selected":"";
                            $sports_select .= "<option value='" . $key2 . "' " . $selected . " >" . $value2 . "</option>";
                        }
                        $sports_select .= "</optgroup>";
                    } else {
                        $selected = null; //($service==$value1->value)?"selected":"";
                        $sports_select .= "<option value='" . $value1->value . "' " . $selected . ">" . $value1->title . "</option>";
                    }
                }
            }
        }

        $aval = UserService::where('company_id', $user_id)->get();
        $final_available = [];
        $current = date("Y-m-d");
        foreach ($aval as $value) {
            $dates = json_decode($value['available_dates']);
            foreach ($dates as $value2) {
                $time = strtotime($value2);
                $d2 = date("d m Y", $time);
                if ($time >= strtotime($current)) {
                    array_push($final_available, $d2);
                }
            }
        }
        if (count($final_available) == 0)
            return redirect('/')->with('alert-info', "Booking dates not available");
        $businessType = Miscellaneous::businessType();
        $programType = Miscellaneous::programType();
        $programFor = Miscellaneous::programFor();
        $numberOfPeople = Miscellaneous::numberOfPeople();
        $ageRange = Miscellaneous::ageRange();
        $expLevel = Miscellaneous::expLevel();
        $serviceLocation = Miscellaneous::serviceLocation();
        $pFocuses = Miscellaneous::pFocuses();
        $duration = Miscellaneous::duration();
        $servicePriceOption = Miscellaneous::servicePriceOption();
        $specialDeals = Miscellaneous::specialDeals();
        $activity = Miscellaneous::activity();
        $teaching = Miscellaneous::teaching();
        $languages = Miscellaneous::getLanguages();
        $timeSlots = Miscellaneous::getTimeSlot();
        $family = UserFamilyDetail::where('user_id', Auth::user()->id)->get();
        //print_r($final_available);die;
        return view('jobpost.directhire-businessprofile-book', [
            'UserProfileDetail' => $UserProfileDetail,
            'userSport' => $userSport,
            'userSpotPrice' => $userSpotPrice,
            'sports' => $sports,
            'sports_names' => $sports_names,
            'user_id' => $aval[0]->user_id,
            'businessType' => $businessType,
            'pageTitle' => "DIRECT HIRE",
            'family' => $family,
            'activity' => $activity,
            'programType' => $programType,
            'ageRange' => $ageRange,
            'alllanguages' => $languages,
            'pFocuses' => $pFocuses,
            'serviceLocation' => $serviceLocation,
            'sports_select' => $sports_select,
            'final_available' => $final_available,
        ]);
    }

    public function getCompareProfessionalDetail($id) {

        $professional_id = array();
        if (isset($id) && $id != "") {
            $professional_id = explode(",", $id);
        }
        $profiledetail = $this->users->getUserProfileDetail2($professional_id, array('professional_detail', 'certification', 'service'));
        $return = array();
        if (count($professional_id) == 0) {
            $return['status'] = false;
            return json_encode($return);
        }

        // print_r(count($profiledetail));die;

        $sports_names = $this->sports->getAllSportsNames();
        $data = array();
        foreach ($profiledetail as $profile) {
            // print_r($profile);die;
            $c_names = '';
            // foreach($profile->company as $x => $co) {
            //     //if($x == 0)
            //         $c_names = $c_names.$co->company_name;
            //     if($x+1 != count($profile->company)){
            //         $c_names = $c_names.', ';
            //     }
            // }

            $data["profile_" . $profile->id] = array();
            $data["profile_" . $profile->id]['company_names'] = $profile->company_name;
            $data["profile_" . $profile->id]['explevel'] = ($profile->ProfessionalDetail->experience_level != "") ? json_decode(Miscellaneous::getBusinessProfileAnswers($profile->ProfessionalDetail->experience_level)) : "-";

            if ($profile->ProfessionalDetail->train_to !== "") {
                $train_to = explode(',', $profile->ProfessionalDetail->train_to);
                if (count($train_to) > 0) {
                    $train_concat = "";
                    foreach ($train_to as $val) {
                        if ($train_concat === "") {
                            $train_concat = Miscellaneous::getAnswers($val);
                        } else {
                            $train_concat .= ', ' . Miscellaneous::getAnswers($val);
                        }
                    }
                }
            }

            $data["profile_" . $profile->id]['train_to'] = ($profile->ProfessionalDetail->train_to != "") ? json_decode($train_concat) : "-";

            if ($profile->ProfessionalDetail->personality !== "") {
                $personality = explode(',', $profile->ProfessionalDetail->personality);
                if (count($personality) > 0) {
                    $personality_concat = "";
                    foreach ($personality as $val) {
                        if ($personality_concat === "") {
                            $personality_concat = Miscellaneous::getAnswers($val);
                        } else {
                            $personality_concat .= ', ' . Miscellaneous::getAnswers($val);
                        }
                    }
                }
            }

            $data["profile_" . $profile->id]['personality'] = ($profile->ProfessionalDetail->personality != "") ? json_decode($personality_concat) : "-";
            if ($profile->ProfessionalDetail->availability != "") {
                $profile->ProfessionalDetail->availability = json_decode($profile->ProfessionalDetail->availability);
                if (gettype($profile->ProfessionalDetail->availability) != 'object') {
                    $profile->ProfessionalDetail->availability = json_decode($profile->ProfessionalDetail->availability);
                }
                // $profile->ProfessionalDetail->availability = json_encode($profile->ProfessionalDetail->availability);
            }
            $data["profile_" . $profile->id]['availability'] = ($profile->ProfessionalDetail->availability != "") ? $profile->ProfessionalDetail->availability : "-";
            $data["profile_" . $profile->id]['professional_type'] = ($profile->ProfessionalDetail->professional_type != "") ? ucfirst($profile->ProfessionalDetail->professional_type) : "-";
            $data["profile_" . $profile->id]['willing_to_travel'] = ($profile->ProfessionalDetail->willing_to_travel != "") ? str_replace(",", ", ", ucfirst($profile->ProfessionalDetail->willing_to_travel)) : "-";
            $data["profile_" . $profile->id]['travel_miles'] = ($profile->ProfessionalDetail->travel_miles != "") ? str_replace(",", ", ", $profile->ProfessionalDetail->travel_miles) : "-";

            $data["profile_" . $profile->id]['certification'] = "-";
            $data["profile_" . $profile->id]['service'] = "-";
            $data["profile_" . $profile->id]['sport'] = "-";

            if (count($profile->certification) > 0) {
                $certification = array();
                foreach ($profile->certification as $certi) {
                    $certification[] = $certi->title;
                }
                $data["profile_" . $profile->id]['certification'] = implode(", ", $certification);
            }
            if (count($profile->service) > 0) {
                $userservice = array();
                $sport = array();
                foreach ($profile->service as $service) {
                    if (isset($sports_names[$service->sport])) {
                        $userservice[] = ucfirst($service->title);
                        $sport[] = ucfirst($sports_names[$service->sport]);
                    }
                }

                $data["profile_" . $profile->id]['service'] = implode(", ", $userservice);
                $data["profile_" . $profile->id]['sport'] = implode(", ", array_unique($sport));

                if ($data["profile_" . $profile->id]['service'] == '')
                    $data["profile_" . $profile->id]['service'] = '-';
                if ($data["profile_" . $profile->id]['sport'] == '')
                    $data["profile_" . $profile->id]['sport'] = '-';
            }
        }

        $return['status'] = true;
        $return['data'] = $data;
        return json_encode($return);
    }

//     public function directhireViewProfile($user_id) {  
//       // $sports = Miscellaneous::getMiscellaneous('sports', 'title', true);
//       $sports = $this->sports->getAlphabetsWiseSportsNames();
//       $sports_names = $this->sports->getAllSportsNames();
//       $UserProfileDetail = $this->users->getUserProfileDetail1($user_id);
//      // $UserProfileDetail = $this->users->getUserProfileDetail($user_id, array('professional_detail','history','company','education','certification','service'));
//      //// print_r($UserProfileDetail);die;
// //dd($UserProfileDetail['ProfessionalDetail']);
//     //   if(isset($UserProfileDetail['ProfessionalDetail']) && @count($UserProfileDetail['ProfessionalDetail']) > 0){
//     //       $UserProfileDetail['ProfessionalDetail'] = UserProfessionalDetail::getFormedProfile($UserProfileDetail['ProfessionalDetail']);
//     //   }
//       $userSpotPrice = $userSport = array();
//       $userSport[""] = "Select Sport";
//       if(@count(@$UserProfileDetail['service']) > 0) {
//         foreach($UserProfileDetail['service'] as $service) {
//           if(isset($sports_names[$service['sport']]))
//           {
//             $userSport[$service['sport']] = $service['sport'];
//             $userSpotPrice[$service['sport']] = $service['price'];
//           }
//         }
//       }
//       $sports_select = '';
//       if($sports){
//         $sports_select .= "<option value=''>Choose Activity</option>";
//         foreach ($sports as $key => $value) {
//             foreach ($value as $key1 => $value1) {
//                 if(count($value1->child)){
//                     $sports_select .= "<optgroup label='".$value1->title."'>";
//                     foreach ($value1->child as $key2 => $value2) {
//                         $selected =null;// ($service==$key2)?"selected":"";
//                         $sports_select .= "<option value='".$key2."' ".$selected." >".$value2."</option>";
//                     }
//                     $sports_select .= "</optgroup>";
//                 } else {
//                     $selected = null;//($service==$value1->value)?"selected":"";
//                     $sports_select .= "<option value='".$value1->value."' ".$selected.">".$value1->title."</option>";
//                 }
//             }
//         }
//     }
//       $businessType = Miscellaneous::businessType();
//       $programType = Miscellaneous::programType();
//       $programFor = Miscellaneous::programFor();
//       $numberOfPeople = Miscellaneous::numberOfPeople();
//       $ageRange = Miscellaneous::ageRange();
//       $expLevel = Miscellaneous::expLevel();
//       $serviceLocation = Miscellaneous::serviceLocation();
//       $pFocuses = Miscellaneous::pFocuses();
//       $duration = Miscellaneous::duration();
//       $servicePriceOption = Miscellaneous::servicePriceOption();
//       $specialDeals = Miscellaneous::specialDeals();
//       $activity = Miscellaneous::activity();
//       $teaching = Miscellaneous::teaching();
//       $languages = Miscellaneous::getLanguages();
//       $timeSlots = Miscellaneous::getTimeSlot();
//       $approve = Evidents::where('user_id',$user_id)->get();
//       return view('jobpost.directhire_businessprofile', [
//             'UserProfileDetail' => $UserProfileDetail,
//             'userSport' => $userSport,
//             'userSpotPrice' => $userSpotPrice,
//             'sports' => $sports,
//             'sports_names' => $sports_names,
//             'businessType' => $businessType,
//             'programType' => $programType,
//             'programFor' => $programFor,
//             'numberOfPeople' => $numberOfPeople,
//             'ageRange' => $ageRange,
//             'expLevel' => $expLevel,
//             'serviceLocation' => $serviceLocation,
//             'pFocuses' => $pFocuses,
//             'duration'=> $duration,
//             'specialDeals' => $specialDeals,
//             'servicePriceOption' => $servicePriceOption,
//             'pageTitle' => "DIRECT HIRE",
//             'approve'=>$approve,
//             'activity'=>$activity,
//             'alllanguages' => $languages,
//             'sports_select' => $sports_select,
//       ]);
//     }

    public function directhireViewProfile($user_id) {
        $company = CompanyInformation::with('employmenthistory', 'education', 'users', 'certification', 'service', 'skill', 'ProfessionalDetail')->where('id', $user_id)->first();
        $company['company_images'] = $company['company_images'] == null ? [] : json_decode($company['company_images']);
        $max_price = UserService::where('company_id', $company['id'])->max('price');
        $min_price = UserService::where('company_id', $company['id'])->min('price');
        //    print_r($company['company_images']);die;
        $user_professional_detail = UserProfessionalDetail::where('company_id', $user_id)->first();
        $user_professional_detail->availability = $user_professional_detail->availability != null ? json_decode(json_decode($user_professional_detail->availability)) : null;
        // return $user_professional_detail->availability->sunday_start;
        // $service = '';
        $services = UserService::where('company_id', $company['id'])->get();
        foreach ($services as $key2 => $value2) {
            $sport = Sports::where('id', $value2['sport'])->first();
            $value2['amenties'] = $sport['sport_name'];
        }
        return view('home.individual-page-new', compact('company', 'user_professional_detail', 'services', 'max_price', 'min_price'));
    }

    public function viewbusinessprofile($user_id) {
        $UserProfileDetail = $this->users->getUserProfileDetail($user_id);

        if (isset($UserProfileDetail['ProfessionalDetail']) && count($UserProfileDetail['ProfessionalDetail']) > 0) {
            $UserProfileDetail['ProfessionalDetail'] = UserProfessionalDetail::getFormedProfile($UserProfileDetail['ProfessionalDetail']);
        }

        $sports_names = $this->sports->getAllSportsNames();
        return view('jobpost.viewbusinessprofile', [
            'UserProfileDetail' => $UserProfileDetail,
            'sports_names' => $sports_names
        ]);
    }

    public function postSearchProfile($selected_sport) {
        $ProfessionalsDetail = $this->users->getAllProfessionals($selected_sport);
        return json_encode($ProfessionalsDetail);
    }

    public function postSaveDirecthireRequest(Request $request) {
        $loggedinUser = Auth::user();
        $data = array();

        $who = [];

        foreach ($request->whoistraining as $value) {
            if ($value == 'me') {
                array_push($who, $value);
            } else {
                $d = UserFamilyDetail::where('id', $value)->first();
                if ($d->email != null) {
                    array_push($who, $d->email);
                }
            }
        }


        $data = [
            'booking_type' => 'direct',
            'user_id' => getLoggedInUserId(),
            'business_id' => $request->business_id,
            'sport' => $request->selectcatagory,
            'status' => 'requested',
            'booking_detail' => json_encode(array('activitytype' => $request->activitytype,
                'numberofpersons' => $request->numberofpersons,
                'activitylocation' => $request->activitylocation,
                'whoistraining' => $who)),
            'schedule' => json_encode($request->hours),
            'price' => $request->price,
            'service_id' => $request->service_id
        ];

        $cart = array('user_id' => getLoggedInUserId(), 'price' => str_replace("$", "", $request->price), 'numberofpersons' => $request->numberofpersons, 'service_choice' => $request->selectcatagory,
            'salestaxpercentage' => $request->salestaxpercentage,
            'duestaxpercentage' => $request->duestaxpercentage);

        $status = $this->bookings->saveBookingStatus($data, $cart, "no");
        //  print_r($status);die;
        $request->session()->flash($status['type'], $status['msg']);
        $response = array(
            'type' => $status['type'],
            'msg' => $status['msg'],
            'bookid' => $status['bookid']
        );
        return Response::json($response);
        exit();
    }

    public function postBookProfessional(Request $request) {
        $status = $this->bookings->bookprofessional($request);
        $request->session()->flash($status['type'], $status['msg']);
        $response = array(
            'type' => $status['type'],
            'msg' => $status['msg']
        );
        return Response::json($response);
        exit();
    }

    public function GetBookingList($status = null) {
        $loggedinUser = Auth::user();
        $sportsList = $this->sports->getAllSportsNames(1);

        if (Auth::user()->role == "business") {
            if ($status == null)
                $status = 'confirmed';
            $jobpostobj = $this->bookings->getBookingList($postedUserId = null, $loggedinUser['id'], $paginate = 5, $status);
            $view = 'jobpost.professional.mybooking';
        }else {
            $jobpostobj = $this->bookings->getBookingList($loggedinUser['id'], $hiredUserId = null, $paginate = 5, $status);
            $view = 'jobpost.customer.mybooking';
        }
        return view($view, [
            'jobpostobj' => $jobpostobj,
            'sportsList' => $sportsList,
            'pageTitle' => "MY BOOKINGS"
        ]);
    }

    public function Getjobmatchingskill(Request $request) {
        if (!Gate::allows('matching_job_access')) {
            $request->session()->flash('alert-danger', 'Access Restricted');
            return redirect('/');
        }
        $loggedinUser = Auth::user();
        $joblist = $this->bookings->getJoblistMatchingSkill($loggedinUser['id'], $paginate = 5);
        $sportsList = $this->sports->getAllSportsNames(1);
        return view('jobpost.professional.mymatchingjobs', [
            'joblist' => $joblist,
            'sportsList' => $sportsList,
            'pageTitle' => "JOB MATCHING MY SKILLS"
        ]);
    }

    public function Getjobs($id) {

        if (Auth::check()) {
            if (isset($id) && is_numeric($id)) {

                $jobsObj = Jobpostquestions::WHERE('jobid', $id)->get()->toArray();

                // $qutObj = Quote::SELECT('quote')->WHERE('job_id',$id)->first();
                $qutObj = array();
                $qutObj['quote'] = array();

                $userQut = ($qutObj['quote']) ? $qutObj['quote'] : '';

                $questions = Miscellaneous::getQuestions();

                foreach ($jobsObj as $key => $value) {
                    //$answers = Miscellaneous::getAnswers();
                    $jobsObj[$key]['question'] = $questions[$value['question_id']];


                    $goalstr = "";
                    if ($value['question_id'] !== 'qoutes' && $value['question_id'] !== 'days_available' && $value['question_id'] !== 'time_available' && $value['question_id'] !== 'travel_upto' && $value['question_id'] !== 'goal' && $value['question_id'] !== 'train_location') {

                        $jobsObj[$key]['full_answer'] = Miscellaneous::getAnswers($value['answer']);
                    } else if ($value['question_id'] === 'days_available' || $value['question_id'] === 'time_available') {

                        if (strpos($value['answer'], '|') !== false) {
                            $replace = strtoupper(str_replace('|', ',', $value['answer']));

                            if (strpos($replace, '_') !== false) {
                                $replace = strtoupper(str_replace('_', ' ', $replace));
                            }
                        } else {
                            $replace = ucfirst($value['answer']);
                        }

                        $jobsObj[$key]['full_answer'] = $replace;
                    } else if ($value['question_id'] === 'goal') {
                        if (strpos($value['answer'], '|') !== false) {
                            $goal = str_replace('|', ',', $value['answer']);
                            $goal = explode(',', $goal);
                            if (is_array($goal)) {
                                foreach ($goal as $val) {
                                    $goalstr .= Miscellaneous::getAnswers($val) . ',';
                                }
                            }

                            $jobsObj[$key]['full_answer'] = $goalstr;
                        } else {

                            $jobsObj[$key]['full_answer'] = Miscellaneous::getAnswers($value['answer']);
                        }
                    } else {
                        $jobsObj[$key]['full_answer'] = "";
                    }
                }

                $data = array();
                $data['jobid'] = $id;
                $data['quote'] = $userQut;
                $data['jobsObj'] = $jobsObj;

                if ($data) {
                    return view::make('jobpost.jobs')->with('data', $data);
                }
            } else {
                return redirect::to('/')->withError(['error' => 'Invalid request']);
            }
        } else {
            return redirect::to('/');
        }
    }

    public function viewBooking($id) {
        // echo "in"; die();
        if (isset($id) && is_numeric($id)) {
            $bookingObj = $this->bookings->getBookingDetail($id);
            $sportsList = $this->sports->getAllSportsNames(1);

            $quote_user_id = null;
            if (Auth::user()->role == "business")
                $quote_user_id = Auth::user()->id;

            $bookingQuotes = $this->bookings->getQuoteList($booking_id = $id, $quote_user_id, $id = null, $paginate = 5);
            $bookingObj['bookingQuotes'] = $bookingQuotes;

            $jobsObj = Miscellaneous::getBookingQuestionObject($bookingObj['jobpostquestions']);

            $bookingObj['jobpostquestions'] = $jobsObj;
            $bookingObj['awardedQuote'] = array();

            if (Auth::user()->role == "business") {

                $view = 'jobpost.professional.viewbooking';
            } else {
                $view = 'jobpost.customer.viewbooking';
                // find out awarded quote if any
                if ($bookingObj['business_id'] > 0) {
                    foreach ($bookingQuotes as $bookingQuote) {
                        if ($bookingQuote->user_id == $bookingObj['business_id']) {
                            $awardedQuote = $bookingQuote;
                            $bookingObj['awardedQuote'] = $awardedQuote;
                        }
                    }
                }
            }
            $data = array();
            $data['jobid'] = $id;
            $data['jobsObj'] = $bookingObj;
            // echo '<pre>'; print_r($data['jobsObj']['user_id']); die();
            $fuser_id = $data['jobsObj']['user_id'];
            $followdetail = User::where('id', $data['jobsObj']['user_id'])
                    ->select('id')
                    ->with(['follows' => function ($q) use($fuser_id) {
                            $q->where('user_id', '=', Auth::User()->id);
                            $q->where('follower_id', '=', $fuser_id);
                        }])
                    ->with(['favourites' => function ($q) use($fuser_id) {
                            $q->where('user_id', '=', Auth::User()->id);
                            $q->where('favourite_user_id', '=', $fuser_id);
                        }])
                    ->first();

            return view($view, [
                'data' => $data,
                'booking_id' => $booking_id,
                'followdetail' => $followdetail,
                'sportsList' => $sportsList,
                'pageTitle' => "MY BOOKINGS"
            ]);
        } else {
            return redirect::to('/mybooking')->withError(['error' => 'Invalid request']);
        }
    }

    public function confirmBooking(Request $request) {

        $status = $this->bookings->confirmBooking($request->booking_id);

        $request->session()->flash($status['type'], $status['msg']);
        $response = array(
            'type' => $status['type'],
            'msg' => $status['msg']
        );
        return Response::json($response);
        exit();
    }

    public function rejectBooking(Request $request) {

        $status = $this->bookings->rejectBooking($request->booking_id, $request->reject_reason);

        $request->session()->flash($status['type'], $status['msg']);
        $response = array(
            'type' => $status['type'],
            'msg' => $status['msg']
        );
        return Response::json($response);
        exit();
    }

    public function PostQuote($booking_id) {
        $bookingObj = $this->bookings->getBookingDetail($booking_id);
        $jobsObj = Miscellaneous::getBookingQuestionObject($bookingObj['jobpostquestions']);
        $sportsList = $this->sports->getAllSportsNames(1);
        $bookingQuote = $this->bookings->getQuoteList($booking_id, Auth::User()->id);

        $bookingQuote = $bookingQuote->toArray();
        $userQuote = array();
        if (count($bookingQuote) > 0)
            $userQuote = $bookingQuote[0];

        //get maximum allowed quote count
        $totalAndMaxQuotesForBooking = $this->bookings->getTotalAndMaxQuotesForBooking($booking_id);

        $bookingObj['jobpostquestions'] = $jobsObj;
        $data = [
            'jobid' => $booking_id,
            'jobsObj' => $bookingObj
        ];

        return view('jobpost.professional.postquote', [
            'data' => $data,
            'userQuote' => $userQuote,
            'totalAndMaxQuotesForBooking' => $totalAndMaxQuotesForBooking,
            'sportsList' => $sportsList,
            'pageTitle' => "MY BOOKINGS"
        ]);
    }

    public function SavePostQuote(Request $request) {
        $validator = Validator::make($request->all(), [ 'quote_price' => 'required', 'rate_type' => 'required', 'quote_desc' => 'required'], [ 'required' => 'The :attribute is required.']);
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
        }

        if (!isset($request->quote_id) && $request->quote_id == 0) {
            $totalAndMaxQuotesForBooking = $this->bookings->getTotalAndMaxQuotesForBooking($request->booking_id);

            if (@$totalAndMaxQuotesForBooking['total_quotes'] >= @$totalAndMaxQuotesForBooking['max_quotes']) {
                $response = array(
                    'type' => 'danger',
                    'msg' => 'Max quote limit reached for this booking.',
                );
                return Response::json($response);
            }
        }

        $data = array();
        $data['id'] = $request->quote_id;
        $data['user_id'] = Auth::User()->id;
        $data['booking_id'] = $request->booking_id;
        $data['quote_price'] = $request->quote_price;
        $data['rate_type'] = $request->rate_type;
        $data['quote'] = $request->quote_desc;
        $response = $this->bookings->saveBookingQuote($data, $totalAndMaxQuotesForBooking);
        return Response::json($response);
    }

    public function DeletePostQuote(Request $request) {
        $response = $this->bookings->deleteBookingQuote($request->id);
        return Response::json($response);
    }

    public function GetUserQuoteList() {
        if (Auth::User()->role == "business") {
            $joblist = $this->bookings->getUserBookingListHavingQuotes(Auth::User()->id, null, $paginate = 5);
            $view = 'jobpost.professional.myquote';
        } else {
            $joblist = $this->bookings->getUserBookingListHavingQuotes(null, Auth::User()->id, $paginate = 5);
            $view = 'jobpost.customer.myquote';
        }

        $sportsList = $this->sports->getAllSportsNames(1);
        return view($view, [
            'joblist' => $joblist,
            'sportsList' => $sportsList,
            'pageTitle' => "MY QUOTES"
        ]);
    }

    public function test() {
        $booking_id = 36;
        $booking = UserBookingStatus::with('UserBookingDetail')->with('Jobpostquestions')->findOrFail($booking_id);
        $user = User::findOrFail($booking->user_id);
        $professional = array();
        if ($booking->booking_type == "direct") {
            $professional = User::findOrFail($booking->business_id);
        }

        return view('jobpost.testmail', [
            'user' => $user,
            'booking' => $booking,
            'professional' => $professional,
            'pageTitle' => "MY BOOKINGS"
        ]);
    }

    /* sam code */

    public function times($u, $t) {
        $UserService = UserService::where(['user_id' => $u, 'sport' => $t])->get();
        $time = $UserService[0]['serv_time_slot'];
        return view('jobpost.time', ['time' => $time]);
    }

    public function savetime(Request $r) {
        if (empty($r->hours)) {
            return response()->json(['status' => 0, 'msg' => "Please choose time slot"]);
        }

        $s = UserBookingDetail::where(['booking_id' => $r->bookid])->update(['schedule' => json_encode($r->hours)]);

        return response()->json(['status' => 1]);
    }

    public function getactivity(Request $request, $userid, $ser_id) {
        //   print_r($userid);die;
        $UserService = UserService::where(['user_id' => $userid, 'sport' => $ser_id])->get();




        $s = json_decode($UserService[0]['activitytype']);
        $location = json_decode($UserService[0]['servicelocation']);
        $data = '';
        if (!empty($s)) {
            $data .= '<option value="">Choose Activity Type</option>';
            foreach ($s as $op) {
                $op1 = str_replace('_', ' ', strtoupper($op));
                $data .= '<option value="' . $op . '">' . $op1 . '</option>';
            }
        } else {
            $data .="<option value='' disabled>Option not avilable</option>";
        }
        $locations = '';
        if (!empty($location)) {
            $locations .= '<option value="">Choose Location</option>';
            foreach ($location as $op) {
                $op1 = str_replace('_', ' ', strtoupper($op));
                $locations .= '<option value="' . $op . '">' . $op1 . '</option>';
            }
        } else {
            $locations .="<option value='' disabled>Option not avilable</option>";
        }
        $numberofpeople = json_decode($UserService[0]['numberofpeople'], true);

        $duestaxpercentage = $UserService[0]['duestaxpercentage'];
        $salestaxpercentage = $UserService[0]['salestaxpercentage'];
        $people = $numberofpeople[0];
        $s = $this->bookings->getBookingList($postedUserId = null, $userid, $paginate = 100, 'confirmed', 'time');
        $m = array();
        foreach ($s as $p) {
            $m[] = $p['id'];
        }
        //    $pp = UserBookingDetail::where('sport',$ser_id)->whereIn('booking_id',$m)->count();
        // foreach($data as $value){
        $ser = UserService::where('id', $request->service_id)->first();
        $nn = json_decode($ser->numberofpeople, true);
        $people = $nn[0];
        $booking = UserBookingStatus::where('business_id', $request->userid)->where('service_id', $ser->id)->where('status', 'confirmed')->get();
        $pp = 0;
        foreach ($booking as $value2) {
            $det = UserBookingDetail::where('booking_id', $value2['id'])->first();
            $d = json_decode($det->booking_detail, true);
            $pp = $pp + $d['numberofpersons'];
        }
        //$value['available_seats'] = $people-$pp;
        //  }

        return response()->json(['status' => true, 'price' => $UserService[0]['price'], 'available' => $people - $pp, 'option' => $data, 'location' => $locations, "duestaxpercentage" => $duestaxpercentage, "salestaxpercentage" => $salestaxpercentage]);
    }

    public function cart($data) {
        return (Fit_Cart::create($data)) ? true : false;
    }

    public function getcart(Request $request) {
//$cartitems = Fit_Cart::where('user_id',getLoggedInUserId())->where('booking_id',$request->booking_id)->get();
        $cartitems = Fit_Cart::where('user_id', getLoggedInUserId())->get();
        if (count($cartitems) != 0) {
            foreach ($cartitems as $item) {
                $sport = Sports::where('id', $item['service_choice'])->get();
                $item['sport'] = $sport[0]->sport_name;
                $items[] = $item;
            }
        } else {
            $items = [];
        }

        return view('jobpost.cart', compact('items'));
    }

    public function deletecart($id, $bid) {
        $delete = Fit_Cart::where(['user_id' => getLoggedInUserId(), 'id' => $id])->delete();
        UserBookingDetail::where(['booking_id' => $bid])->delete();
        UserBookingStatus::where(['id' => $bid])->delete();
        if ($delete) {
            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function addnote($b, $n) {

        UserBookingDetail::where(['booking_id' => $b])->update(['note' => $n]);
        return response()->json(['status' => 1]);
    }

    public function pay(Request $request) {
        $items = Fit_Cart::where('user_id', getLoggedInUserId())->count();
        if ($items == 0) {

            return response()->json(['status' => 0, "msg" => "Not able to go Next Please add Booking in cart"]);
        }
        $user = User::where('id', $request->user_id)->first();
        $user_service = UserService::where('id', $request->service_id)->first();
        if ($user_service->terms_conditions != 'undefined')
            $terms_conditions = $user_service->terms_conditions;
        else
            $terms_conditions = "";
        $name = $user->firstname . ' ' . $user->lastname;
        return view('pay', compact('name', 'terms_conditions'));
    }

    public function editcart($bkid, $cid, $user_id) {
        $sports = $this->sports->getAlphabetsWiseSportsNames();
        $sports_names = $this->sports->getAllSportsNames();
        $sports_child_parent = $this->sports->getSportsChildParentWise();
        $UserProfileDetail = $this->users->getUserProfileDetail($user_id, array('professional_detail'));
        $userSpotPrice = $userSport = array();
        $family = UserFamilyDetail::where('user_id', Auth::user()->id)->get();
        if (count($UserProfileDetail['service']) > 0) {
            foreach ($UserProfileDetail['service'] as $service) {

                if (@$sports_child_parent[$service['sport']] > 0) {
                    if (isset($sports_names[$service['sport']])) {
                        $userSport[@$sports_names[@$sports_child_parent[$service['sport']]]]['child'][$service['sport']] = @$sports_names[$service['sport']];
                        $userSpotPrice[$service['sport']] = $service['price'];
                    }
                } else {
                    if (isset($sports_names[$service['sport']])) {
                        $userSport[@$sports_names[$service['sport']]]['self'][$service['sport']] = @$sports_names[$service['sport']];
                        $userSpotPrice[$service['sport']] = $service['price'];
                    }
                }
            }
        }

        $businessType = Miscellaneous::businessType();
        $cartitems = Fit_Cart::where('id', $cid)->get();
        $UserService = UserService::where(['user_id' => $user_id, 'sport' => @$cartitems[0]['service_choice']])->get();
        $s = json_decode(@$UserService[0]['activitytype']);
        $location = json_decode(@$UserService[0]['servicelocation']);
        $note = UserBookingDetail::where(['booking_id' => $bkid])->get();
        return view('jobpost.edit', [
            'UserProfileDetail' => $UserProfileDetail,
            'userSport' => $userSport,
            'userSpotPrice' => $userSpotPrice,
            'sports' => $sports,
            'sports_names' => $sports_names,
            'user_id' => $user_id,
            'businessType' => $businessType,
            'bookid' => $bkid,
            'cid' => $cid,
            'user_id' => $user_id,
            'cartinfo' => $cartitems,
            'note' => $note,
            'location' => $location,
            'time' => @$UserService[0]['serv_time_slot'],
            'family' => $family,
        ]);
    }

    public function updatecart(Request $r) {

        $cart = array(
            'price' => str_replace('$', '', $r->price),
            'numberofpersons' => $r->numberofpersons,
            'service_choice' => $r->selectcatagory,
            'salestaxpercentage' => $r->salestaxpercentage,
            'duestaxpercentage' => $r->duestaxpercentage
        );
        $bookstatus = array(
            'sport' => $r->selectcatagory,
            'booking_detail' => json_encode(array('activitytype' => $r->activitytype,
                'numberofpersons' => $r->numberofpersons,
                'activitylocation' => $r->activitylocation,
                'whoistraining' => $r->whoistraining,
                'username', $r->username,
                'lastname', $r->username,
                'phone', $r->username,
                'email' => $r->email)),
            'schedule' => json_encode($r->hours),
            'price' => $r->price,
            'note' => $r->comment,
            'schedule' => json_encode($r->hours),
        );
        $details = UserBookingDetail::where(['booking_id' => $r->bookid])->update($bookstatus);
        $cartitems = Fit_Cart::where('id', $r->cid)->update($cart);
        if ($details && $cartitems) {

            return response()->json(['status' => 1]);
        } else {
            return response()->json(['status' => 0]);
        }
    }

    public function cartpayment(Request $request) {
        return view('jobpost.cart-payment');
    }

    public function confirmpayment(Request $request) {
        return view('jobpost.confirm-payment');
    }
    
    public function cartpaymentinstant(Request $request) {
        $companyData = $servicePrice = $businessSpec = [];
        $serviceData = BusinessServices::where('cid', $_GET['cid'])->where('instant_booking', 1)->get();
        if (isset($serviceData)) {
            foreach ($serviceData as $service) {
                $company = CompanyInformation::where('id', $service['cid'])->get();
                $company = isset($company[0]) ? $company[0] : [];
                if(!empty($company)) {
                $companyData[$company['id']][] = $company;
                }
                
                $price = BusinessPriceDetails::where('cid', $service['cid'])->get();
                $price = isset($price[0]) ? $price[0] : [];
                if(!empty($company)) {
                $servicePrice[$company['id']][] = $price;
                }
                
                $business_spec = BusinessService::where('cid', $service['cid'])->get();
                $business_spec = isset($business_spec[0]) ? $business_spec[0] : [];
                if(!empty($company)) {
                $businessSpec[$company['id']][] = $business_spec;
                }
            }
        }
        return view('jobpost.cart-payment-instant',[
            'serviceData' => $serviceData,
            'companyData' => $companyData,
            'servicePrice' => $servicePrice,
            'businessSpec' => $businessSpec
            ]);
    }

    public function confirmpaymentinstant(Request $request) {
        return view('jobpost.confirm-payment-instant');
    }

    public function payment($token) {
        $payment = new StripePay;
        $paydata['email'] = Auth::user()->email;
        $paydata['amount'] = '';
        $paydata['token'] = $token;
        $paydata['currency_code'] = 'USD';
        $items = Fit_Cart::where('user_id', getLoggedInUserId())->get();
        $description = '';
        $amount = 0;
        foreach ($items as $item) {
            $times = json_decode($item->time['schedule'], true);
            $bookdays = count($times);
            $sport = Sports::where('id', $item['service_choice'])->get();
            $description .= $sport[0]->sport_name . ', ';
            $id[] = $item['booking_id'];
            $nameofitems[] = array('bookid' => $item['booking_id'], 'number of persons' => $item['numberofpersons'], 'sport name' => $sport[0]->sport_name);
            $booking_id = $item['booking_id'];
            $amount += ($item['price'] * $item['numberofpersons'] * $bookdays) + (($item['price'] * $item['numberofpersons'] * $bookdays) * ($item['duestaxpercentage'] + $item['salestaxpercentage']) / 100);
        }
        $name = UserBookingStatus::where('id', $booking_id)->get();
        $username = User::where('id', $name[0]->business_id)->get();

        $paydata['amount'] = $amount;

        $paydata['item_name'] = rtrim($description, ", ");
        $paydata['nameofitems'] = json_encode($nameofitems);
        $stripeResponse = $payment->chargeAmountFromCard($paydata);

        $amount = $stripeResponse["amount"] / 100;

        $param_type = 'ssdssss';
        $param_value_array = array(
            $amount,
            $stripeResponse["currency"],
            $stripeResponse["balance_transaction"],
            $stripeResponse["status"],
            json_encode($stripeResponse)
        );
        $paymentdata = array(
            'email' => Auth::user()->email,
            'item_number' => $paydata['nameofitems'],
            'amount' => $amount,
            'currency_code' => $stripeResponse["currency"],
            'txn_id' => $stripeResponse["balance_transaction"],
            'payment_status' => $stripeResponse["status"],
            'payment_response' => json_encode($stripeResponse)
        );
        $status = Payment::create($paymentdata);

        if ($status && ($stripeResponse["status"] == 'succeeded')) {

            $username = $username[0]->firstname . ' ' . $username[0]->lastname;
            UserBookingStatus::whereIn('id', $id)->update(['status' => 'confirmed']);
            $items = Fit_Cart::where('user_id', getLoggedInUserId())->delete();

            foreach ($id as $i) {
                // MailService::sendEmailBooking($i);
                $BookingDetail = $this->bookings->getBookingDetail($i);
                MailService::sendEmailBookingConfirm($BookingDetail);
            }
            return response()->json(['status' => true, 'msg' => 'succeeded', 'name' => $username]);
        } else {
            return response()->json(['status' => false, 'msg' => $stripeResponse["status"], 'msg2' => 'Your Payment is failed']);
        }
    }

}
