<?php



namespace App\Http\Controllers;



use App\Http\Requests;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Repositories\UserRepository;

use Auth;

use App\Sports;

use App\Repositories\SportsCategoriesRepository;

use App\Repositories\SportsRepository;



use App\Repositories\ProfessionalRepository;

use App\AddrStates;

use App\AddrCities;

use App\AddrCountries;

use App\CompanyInformation;

use App\Miscellaneous;

use App\Languages;

use DB;

class HomeController extends Controller

{



    protected $sports_cat;



    public function __construct(SportsCategoriesRepository $sports_cat,SportsRepository $sports, ProfessionalRepository $professional){

        $this->sports_cat = $sports_cat;

        $this->sports = $sports;

        $this->professional = $professional;

    }

    /**

     * Display a list of all of the user's home.

     *

     * @param  Request  $request

     * @return Response

     */

    public function index(Request $request)

    {   

        $all_categories = $this->sports_cat->getAllSportsCategories();

        $most_searched_sports = $this->sports->getSportsFromCatId(1);



        // Get happening now data



        $flag = 'topprof';

        $sport_names = $this->sports->getAllSportsNames();

        

        if($flag){



            $professionals_list = $this->professional->getTopBookedProfessionals($flag);

        }



        //var_dump($professionals_list); die;



        if(@$professionals_list)

        {

            $flag = 'topprof';

             

        } else {



         $professionals_list=array();

        }

        //die;



        //$professionals_list = $this->professional->getTopBookedProfessionals('topprof');



        //print_r($sport_names); die;

//print_r($popup);die;

// if($request->popup == 'login'){

//     return view('home.index', [

//             'product_categories' => $all_categories,

//             'most_searched_sports' => $most_searched_sports,

//             'professionals_list' => $professionals_list,

//             'sport_names' => $sport_names,

//             'popup' => 'login'

//         ]);

// }



		//for book activity model

		$activity = Miscellaneous::activity();

		$all_categories = $this->sports_cat->getAllSportsCategories();

        

		

		//$sports_list = $this->sports->getSportsFromCatId('all');

		

		$return = Sports::select(DB::raw('sports.*'),DB::raw('sports_categories.category_name'),DB::raw('IF((select count(*) from sports as sports1 where sports1.is_deleted = "0" AND sports1.parent_sport_id = sports.id ) > 0,1,0) as has_child'))

       ->leftjoin("sports_categories", DB::raw('sports.category_id'), '=', 'sports_categories.id');

        $return->where('sports.is_deleted','0');

        $return->where('sports.parent_sport_id',NULL);

        $return->groupBy('sports.id');

        $return->orderBy('sports.sport_name');

        $sports_list  = $return->get();

		   

		

		$expLevel = Miscellaneous::expLevel();

		$dayactivity = Miscellaneous::dayactivity();

		$participateActivity = Miscellaneous::participateActivity();

		$expProfessional = Miscellaneous::expProfessional();

		$teaching = Miscellaneous::teaching();

		$gender = Miscellaneous::gender();

		$activeLevel = Miscellaneous::activeLevel();

		$expActivity = Miscellaneous::expActivity();

		$ageRange = Miscellaneous::ageRange();

		$getTimeSlot = Miscellaneous::getTimeSlot();

		$trainingLocation = Miscellaneous::trainingLocation();

		$serviceLocation = Miscellaneous::serviceLocation();

		$StartActivity = Miscellaneous::StartActivity();

		$travelUpto = Miscellaneous::travelUpto();

		$language = Languages::get();

return view('home.index', [

            'product_categories' => $all_categories,

            'getTimeSlot' => $getTimeSlot,

            'most_searched_sports' => $most_searched_sports,

            'professionals_list' => $professionals_list,

            'sport_names' => $sport_names,

			'activity' => $activity,

			'sports_list' => $sports_list,

			'expLevel' => $expLevel,

			'ageRange' => $ageRange,

			'language' => $language,

			'expActivity' => $expActivity,

			'expProfessional' => $expProfessional,

			'activeLevel' => $activeLevel,

			'serviceLocation' => $serviceLocation,

			'teaching' => $teaching,

			'gender' => $gender,

			'participateActivity' => $participateActivity,

			'dayactivity' => $dayactivity,

			'trainingLocation' => $trainingLocation,

			'StartActivity' => $StartActivity,

			'travelUpto' => $travelUpto,

        ]);

        

    }



    public function allSports(Request $request){

        $all_categories = $this->sports_cat->getAllSportsCategories();

        $all_sports = $this->sports->getSportsFromCatId('all');

        return view('home.viewAllSports', [

            'product_categories' => $all_categories,

            'all_sports' => $all_sports

        ]);   

    }



    public function jsModalChildSports($id){

        $child_sports = $this->sports->getChildSportsList($id);

        $parent_sport = $this->sports->getSportDetail($id);

        

        return view('home.viewChildSports', [

            'child_sports' => $child_sports,

            'parent_sport_name' => @$parent_sport[0]['sport_name']

        ]);    

    }

    

   



    public function getFilter(UserRepository $users, Request $request)

    {

       /* print_r($request->all());
        exit;*/

        if($request->label == '' && $request->zipcode == ''){

            return redirect('/search-result-location?location='.$request->location.'&page=1&page_size=10');

        }

        $this->users = $users;

        $selected_label = isset($request->label) ? $request->label: NULL;

        $selected_location = isset($request->location) ? $request->location: NULL;

        $selected_zipcode = isset($request->zipcode) ? $request->zipcode: NULL;

        


        if(isset($request->top))

        {

           $result = $this->users->getTopFilter($selected_label);

        }

        else

        {

            $result = $this->users->getFilter($selected_label, $selected_location, $selected_zipcode);

        }

        foreach($result as $key1=> $value)

        {

            $str = '';

            if(count($value['service']) != 0)

            {

                foreach($value['service'] as $key2=>$value2){

                   $sport_id = Sports::where('id',$value2['sport'])->first();

                   if(!empty($sport_id)){

                         $str = $str.$sport_id['sport_name'];

                         if((($key2+1) != count($value['service']))){

                             $str=$str.', ';

                         }

                   }

     

                }

                $result[$key1]['user_sports']=$str;

            }

            else{

                $result[$key1]['user_sports']=$str;

            }

        }

        

      // dd($result);

       

        return view('home.searchresult', [

            'result' => $result,

            'selected_label' => $selected_label,

            'selected_location' => $selected_location,

            'selected_zipcode' => $selected_zipcode,

            'pageTitle' => "Search"

      ]);

    }

	public function searchaction(Request $request)

	{

		 if($request->get('query'))	

		{

			$array_data=array();

			$query = $request->get('query');

			//$query = $request->get('query');

		  	$data_city = Sports::where('sport_name', 'LIKE', "%{$query}%")->get();

			foreach($data_city as $city)

			{

				$array_data[]=$city->sport_name;

			}

			$data_state = CompanyInformation::where('company_name', 'LIKE', "%{$query}%")->get();

			foreach($data_state as $state)

			{

				$array_data[]=$state->company_name;

			}

			sort($array_data);

			

			

			$output = '<ul id="country-list">';

		  	foreach($array_data as $row)

		  	{

				

		   		$output .= '<li class="searchclick" data-num="'.trim($row).'">'.$row.'</li>';

		  	}

		  	$output .= '</ul>';

		  	echo $output;

		 }

	}

	public function searchactioncity(Request $request)

	{

		 if($request->get('query'))	

		{

			$array_data=array();

			$query = $request->get('query');
			

			//$query = $request->get('query');

		  	$data_city = AddrCities::where('city_name', 'LIKE', "%{$query}%")->get();

			foreach($data_city as $city)

			{

				$array_data[]=$city->city_name;

			}

			$data_state = CompanyInformation::where('company_name', 'LIKE', "%{$query}%")->get();

			foreach($data_state as $state)

			{

				$array_data[]=$state->company_name;

			}

			sort($array_data);

			

			

			$output = '<ul id="country-list">';

		  	foreach($array_data as $row)

		  	{

				

		   		$output .= '<li class="searchclickcity" data-num="'.trim($row).'">'.$row.'</li>';

		  	}

		  	$output .= '</ul>';

		  	echo $output;

		 }

	}

	public function searchactionactivity(Request $request)

	{

		if($request->get('query'))	

		{

			/*$query = $request->get('query');

		  	$data = Sports::where('sport_name', 'LIKE', "%{$query}%")->get();

			

			$output = '<ul id="country-list">';

		  	foreach($data as $row)

		  	{

				

		   		$output .= '<li class="searchclickactivity" data-num="'.trim($row->sport_name).'">'.$row->sport_name.'</li>';

		  	}

		  	$output .= '</ul>';

		  	echo $output;*/

				 if($request->get('query'))	

		{

			$array_data=array();

			$query = $request->get('query');

			$query = $request->get('query');

		  	$data_city = Sports::where('sport_name', 'LIKE', "%{$query}%")->get();

			foreach($data_city as $city)

			{

				$array_data[]=$city->sport_name;

			}

			$data_state = CompanyInformation::where('company_name', 'LIKE', "%{$query}%")->get();

			foreach($data_state as $state)

			{

				$array_data[]=$state->company_name;

			}

			sort($array_data);

			

			

			$output = '<ul id="country-list">';

		  	foreach($array_data as $row)

		  	{

				

		   		$output .= '<li class="searchclickactivity" data-num="'.trim($row).'">'.$row.'</li>';

		  	}

		  	$output .= '</ul>';

		  	echo $output;

		 }

		 }

	}

	

	function searchactionlocation(Request $request)

	{

		/*if($request->get('query'))	

		{

			$query = $request->get('query');

		  	$data_city = AddrCities::where('city_name', 'LIKE', "%{$query}%")->get();

			$array_data=array();

			foreach($data_city as $city)

			{

				$array_data[]=$city->city_name;

			}

			$data_state = AddrStates::where('state_name', 'LIKE', "%{$query}%")->get();

			foreach($data_state as $state)

			{

				$array_data[]=$state->state_name;

			}

			sort($array_data);

			

			

			$output = '<ul id="country-list">';

		  	foreach($array_data as $row)

		  	{

				

		   		$output .= '<li class="searchclicklocation" data-num="'.trim($row).'">'.$row.'</li>';

		  	}

		  	$output .= '</ul>';

		  	echo $output;

		}*/

	}

	

}