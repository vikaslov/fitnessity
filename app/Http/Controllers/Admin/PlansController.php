<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\PlanRepository;

use App\Plan;
use App\BusinessClaim;
use App\CompanyInformation;
use App\UserService;
use App\Sports;
use App\User;
use Auth;
use Redirect;
use Response;
use DB;
use Validator;
use Image;
use Excel;
use App\Imports\ClaimImport;
use Maatwebsite\Excel\HeadingRowImport;


class PlansController extends Controller
{   
    protected $plan;
    public $error = '';

    public function __construct(PlanRepository $plan)
    {
        $this->middleware('admin');
        $this->plan = $plan;    
    }

    public function index()
    {
        $plans = $this->plan->getAllPlans();

        return view('admin.plan.index', [
            'plans' => $plans,
            'pageTitle' => 'Manage Membership Plans'
        ]);
    }
    
       public function deleteClaim($id){
            $save = BusinessClaim::where('id',$id)->delete();
            if($save){
                session(['key' => 'success']);
                session(['msg' => 'Delete Succesfully !']); 
            return redirect('admin/claimbusiness');
            }
}
   
    public function businessUnclaim()
    {
        $claims = BusinessClaim::where('is_verified',0)->get();

        return view('admin.plan.unclaim', [
            'claims' => $claims,
            'pageTitle' => 'Manage Business Claim'
        ]);
    }
    
    public function businessClaim(Request $request)
    {
        $claims = CompanyInformation::get();
        foreach($claims as $value){
            $user = User::where('id',$value['user_id'])->first();
            $value['company_user_name'] = $user->firstname.' '.$user->lastname; 
            $services = UserService::where('company_id',$value['id'])->get();
            $str = '';
            foreach($services as $key2=>$value2){
               $sport =Sports::where('id',$value2['sport'])->first();
               $str = $str.$sport['sport_name'];
               if(($key2+1) != count($services)){
                   $str = $str.', ';
               }
           }
           $value['activity']=$str;
        }
         return view('admin.plan.claim', [
            'claims' => $claims,
            'pageTitle' => 'Manage Business Claim'
        ]);
    }
    
    public function addBusinessClaim(Request $request)
    {
        if($request->hasFile('import_file')){
			$ext = $request->file('import_file')->getClientOriginalExtension();
			if($ext != 'csv' && $ext != 'csvx' && $ext != 'xls' && $ext != 'xlsx' )
			{
				//Session::flash('error',"File format is not supported.");
				//return redirect()->back();
				return response()->json(['status'=>500,'message'=>'File format is not supported.']);
			}
			ini_set('max_execution_time', 10000); 
			$headings = (new HeadingRowImport)->toArray($request->file('import_file'));
				if(!empty($headings)){
					foreach($headings as $key => $row) {
					    $firstrow = $row[0];
					   // print_r($row);
						if(  $firstrow[0] != 'business_name' || 
							 $firstrow[1] != 'activity' ||
							 $firstrow[2] != 'location'|| 
						 $firstrow[3] != 'website' || 
							 $firstrow[4] != 'phone'|| 
						 $firstrow[5] != 	'address'
						) {
							$this->error = 'Problem in header.';
						break;
					}
					}
				}
				if($this->error != '')
                {
                	return response()->json(['status'=>500,'message'=>$this->error]);
                }
            \Session::forget('user');
            \Session::forget('notuser');
			Excel::import(new ClaimImport, $request->file('import_file'));
			$repeat_data=\Session::get('user') != null ? \Session::get('user') : [];
			$not_repeat_data=\Session::get('notuser') != null ? \Session::get('notuser') : [];

// 			Excel::load($request->file('import_file')->getRealPath(), function ($reader) {
// 				$excel_data    =   $reader->toArray();
// 				if(!empty($excel_data)){
// 					foreach($excel_data as $key => $row) {
// 						$firstrow = $row;	
// 						if( !array_key_exists('business_name', $firstrow) || 
// 							!array_key_exists('activity', $firstrow) ||
// 							!array_key_exists('location', $firstrow)|| 
// 							!array_key_exists('website', $firstrow)|| 
// 							!array_key_exists('phone', $firstrow)|| 
// 							!array_key_exists('address', $firstrow)
// 						) {
// 							$this->error = 'Problem in header.';
// 						break;
// 					}
// 					else{
// 						if($row['business_name'] == '' ){
// 							$this->error = 'Error in data inserted';
// 							break;

// 						}
// 						$business_claim = new BusinessClaim();
// 						$business_claim->business_name = ucfirst($row['business_name']);
// 						$business_claim->activity = ($row['activity']);
// 						$business_claim->location = ($row['location']);
// 						$business_claim->website = ($row['website']);
// 						$business_claim->phone = ($row['phone']);
// 						$business_claim->address = ($row['address']);
// 						$business_claim->save();
// 					}
// 				}
// 			}
// 		});
        }

        if($this->error != '')
        {
        // 	Session::flash('error',$this->error);
        // 	return redirect()->back();
        	return response()->json(['status'=>500,'message'=>$this->error]);
        }
        else{
            return response()->json(['status'=>200,'message'=>'File imported Successfully','repeat_data'=>$repeat_data,'not_repeat_data'=>$not_repeat_data]);
        // 	Session::flash('success','File imported Successfully');
        // 	return redirect()->back();
        }
    }
    
    public function ignoreReplaceBusinessClaim(Request $request)
    {
        $searchIDs = json_decode($request->searchIDs);
       
        if($request->ignore_replace == 'ignore')
        {
            $d = json_decode($request->datas);
            foreach($d as $key=>$value){
               // print_r($value);
                if(in_array($key,$searchIDs))
                    $business_claim = new BusinessClaim();
                else
                    $business_claim = BusinessClaim::where('website',$value[3])->first();
				$business_claim->business_name = ucfirst($value[0]);
				$business_claim->activity = ($value[1]);
				$business_claim->location = ($value[2]);
				$business_claim->website = ($value[3]);
				$business_claim->phone = ($value[4]);
				$business_claim->address = ($value[5]);
				$business_claim->save();
            }
                return response()->json(['status'=>200,'message'=>'File ignored Successfully']);
    
        }
        else{
            $d = json_decode($request->datas);
            foreach($d as $key=>$value){
                if(in_array($key,$searchIDs))
                    $business_claim = BusinessClaim::where('website',$value[3])->first();
                else
                    $business_claim = new BusinessClaim();
               // $business_claim = BusinessClaim::where('business_name',$value[0])->first();
				$business_claim->business_name = ucfirst($value[0]);
				$business_claim->activity = ($value[1]);
				$business_claim->location = ($value[2]);
				$business_claim->website = ($value[3]);
				$business_claim->phone = ($value[4]);
				$business_claim->address = ($value[5]);
				$business_claim->save();
            }
                return response()->json(['status'=>200,'message'=>'File replaced Successfully']);
    
        }
        
    }

    public function create()
    {
        return view('admin.plan.create', [            
            'pageTitle' => 'Add New Membership Plan'
        ]);
    }

    public function store(Request $request)
    {
        $validator = $this->saveValidator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $status = $this->plan->create($request->all());

        if($status)
        {
            session(['key' => 'success']);
            session(['msg' => 'Membership Plan Created Succesfully !']);    
        }

        return redirect()->route('plan-list');
    }

    protected function saveValidator($data)
    {
        return Validator::make($data, [            
            'title' => 'required|max:255|unique:membership_plans',
            'price_per_month' => 'required|integer',
            'quote_per_month' =>'required|integer',
            'description' =>'required'
        ],
        [
            'title.required' => 'Provide a title',
            'price_per_month.required' => 'Provide a Price per month',
            'quote_per_month.required' => 'Provide a Quote per month',
            'description.required' => 'Provide a description',
        ]);
    }

    protected function updateValidator($data,$id)
    {
        return Validator::make($data, [            
            'title' => 'required|max:255|unique:membership_plans,title,'.$id,
            'price_per_month' => 'required|integer',
            'quote_per_month' =>'required|integer',
            'description' =>'required'
        ],
        [
            'title.required' => 'Provide a title',
            'price_per_month.required' => 'Provide a Price per month',
            'quote_per_month.required' => 'Provide a Quote per month',
            'description.required' => 'Provide a description',
        ]);
    }

    public function edit($id)
    {
        $plan = $this->plan->getById($id);

        if($plan)
        {
            return view('admin.plan.edit', [
                'pageTitle' => 'Edit Membership Plan',
                'plan' => $plan
            ]);
        }

        return redirect()->route('plan-list');   
    }

    public function update($id, Request $request)
    {
        $validator = $this->updateValidator($request->all(),$id);
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $status = $this->plan->update($id, $request->all());

        if($status)
        {
            session(['key' => 'success']);
            session(['msg' => 'Membership Plan Updated Succesfully !']);    
        }

        return redirect()->route('plan-list');
    }

    public function delete(Request $request)
    {
        $status = $this->plan->deleteItem($request->id);

        if($status)
        {
            return json_encode([
                'status' => true
            ]);
        }
        
        return json_encode([
            'status' => false
        ]);
    }

    public function deactivate(Request $request)
    {
        $status = $this->plan->update($request->id, array('is_deleted'=>'1'));

        if($status)
        {
            return json_encode([
                'status' => true
            ]);
        }
        
        return json_encode([
            'status' => false
        ]);
    }

    public function activate(Request $request)
    {
        $status = $this->plan->update($request->id, array('is_deleted'=>'0'));

        if($status)
        {
            return json_encode([
                'status' => true
            ]);
        }
        
        return json_encode([
            'status' => false
        ]);
    }

    /**
     * Delete Multiple Plans
     * 
     * @param Request $request
     * @return array
     */
    public function deleteAll(Request $request){
        $input = $request->all();

        if(isset($request->planIds) && count($request->planIds) > 0) {

            $update = Plan::whereIn('id', $input['planIds'])
                     ->update([
                        'is_deleted' => 1
                    ]);

            if(!$update) {
                $response = array(
                        'danger' => 'Some error while deactivating plans.',
                );
            } else {
                $response = array(
                    'success' =>  'Plans Deactivated Successfully.',
                ); 
            }

        } else {
            $response = array(
                    'danger' =>  'Please select at least one plan.',
            );
        }
        return Redirect::to('/admin/plans/membership-plan')->with('status',$response);
    }
}