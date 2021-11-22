<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\CompanyInformation;

//Route::get('/home', 'HomeController@index')->name('homemy');
//Route::get('/home', 'HomeController@index')->name('homemy');
//Route::get('/', 'HomeController@index');


Route::get('signupVerification','UserProfileController@signupVerification')->name('signupVerification');
Route::get('createNewBusinessProfile/{cid?}','UserProfileController@createNewBusinessProfile')->name('createNewBusinessProfile');
Route::post('editBusinessProfile','UserProfileController@editBusinessProfile')->name('editBusinessProfile');
Route::post('editBusinessService','UserProfileController@editBusinessService')->name('editBusinessService');
Route::get('business/welcome','UserProfileController@welcomeBusinessProfile')->name('welcomeBusinessProfile');
Route::get('business/company','UserProfileController@companyBusinessProfile')->name('companyBusinessProfile');
Route::get('business/experience','UserProfileController@experienceBusinessProfile')->name('experienceBusinessProfile');
Route::get('business/specification','UserProfileController@specificationBusinessProfile')->name('specificationBusinessProfile');
Route::get('business/terms','UserProfileController@termsBusinessProfile')->name('termsBusinessProfile');
Route::get('business/verified','UserProfileController@verifiedBusinessProfile')->name('verifiedBusinessProfile');
Route::get('business/services','UserProfileController@servicesBusinessProfile')->name('servicesBusinessProfile');
Route::get('business/booking','UserProfileController@bookingBusinessProfile')->name('bookingBusinessProfile');

Route::get('businessjumps/{bstep?}/{cid?}','UserProfileController@businessJumps')->name('businessjumps');
Route::post('addbstep','UserProfileController@addbstep')->name('addbstep');
Route::post('addbusinesscompanydetail','UserProfileController@addbusinesscompanydetail')->name('addbusinesscompanydetail');
Route::match(['get','post'],'addbusinessexperience','UserProfileController@addbusinessexperience')->name('addbusinessexperience');
Route::post('addbusinessspecification','UserProfileController@addbusinessspecification')->name('addbusinessspecification');
Route::post('addbusinessterms','UserProfileController@addbusinessterms')->name('addbusinessterms');
Route::post('addbusinessverification','UserProfileController@addbusinessverification')->name('addbusinessverification');
Route::post('addbusinessservices','UserProfileController@addbusinessservices')->name('addbusinessservices');
Route::post('addbusinessbooking','UserProfileController@addbusinessbooking')->name('addbusinessbooking');
Route::get('send-sms-twillio','UserProfileController@sendCustomMessage');
Route::get('send-call-twillio','UserProfileController@makeCall');
Route::post('generateMessage/{otpCode}', 'UserProfileController@generateVoiceMessage')->name('generateMessage');

Route::get('make-new-logout',function(){
    if(Auth::check()){
        Auth::logout();
    }
    return 1;
});

Route::get('/blade-check1',function(){
    return view('home.mycheck');
});

Route::any('/blade-check/{company_id}','UserProfileController@getBladeDetail1')->name('companypage');
Route::get('/blade-new-check/{company_id}','UserProfileController@getBladeDetail');
Route::post('ckeditor/upload', 'Admin\HelpController@upload')->name('ckeditor.upload');
Route::get('get-my-location/{myloc}','UserProfileController@getBusinessClaim');
Route::get('get-business-detail/{valueid}','UserProfileController@getBusinessClaimDetaill');
Route::get('get-my-location-business','UserProfileController@getLocationBusinessClaimDetaill');
Route::get('claim-your-business','UserProfileController@businessClaim')->name('businessClaim');
Route::get('claim-your-business-detail','UserProfileController@showbusinessClaimDetail');
Route::post('make-verify-busiess-link','UserProfileController@SendVerificationlink');
Route::post('make-verify-busiess-link-via-phone-msg','UserProfileController@SendVerificationlinkMsg');
Route::post('make-otp-busiess-link-via-sms','UserProfileController@makeOTPMsg');
Route::post('addinstantHire','UserProfileController@addinstantHire')->name('addinstantHire');
Route::post('make-verify-busiess-link-via-phone-call','UserProfileController@SendVerificationlinkCall');
Route::get('verify-my-business/reset','UserProfileController@VerifySendVerificationlink');
Route::get('delete-image-company','UserProfileController@deleteImageCompany');
Route::get('delete-image-user','UserProfileController@deleteImageCompany1');
Route::get('delete-image-gallery','UserProfileController@deleteImageGallery');
Route::get('set-cover-photo','UserProfileController@setCoverPhoto');
Route::get('unset-cover-photo','UserProfileController@unsetCoverPhoto');
Route::get('search-result-location','UserProfileController@searchResultLocation');
Route::get('search-result-location1','UserProfileController@searchResultLocation1');
Route::get('/filter', 'HomeController@getFilter');
Route::get('/new-fun', 'UserProfileController@newFUn');

View::composer(['*'],function($view){
    if(Auth::check()){
        $count = CompanyInformation::where('user_id',Auth::user()->id)->count();
        $view->with('company_count',$count);
    }	
});

Route::get('/check',function(){
   $show_step = 1;
   return view('home.registration',compact('show_step'));
});

Route::get('/', 'Frontend\HomeController@index');
Route::get('/home', 'Frontend\HomeController@index')->name('homemy');
Route::get('/new-register', 'Auth\AuthController@newRegister');
Route::post('/auth/uploadProfile', 'Auth\AuthController@uploadProfile111');
Route::get('/all-trainings', 'Frontend\HomeController@all_trainings');
Route::get('/all-sports', 'Frontend\HomeController@all_sports');
Route::get('/registration', 'Frontend\HomeController@registration')->name('registration');
Route::post('/auth/registration', 'Frontend\HomeController@postRegistration')->name('auth/registration');
Route::post('/user/resendverify', 'Frontend\HomeController@VerifyCodeResend');
Route::get('registration/confirm/{confirmation_code}', 'Frontend\HomeController@ResendEmail');
Route::get('verifyuser/{confirmation_code}', 'Frontend\HomeController@UserAccountVerify');
Route::get('/userlogin', 'Frontend\LoginController@index')->name('userlogin');
Route::post('auth/userlogin', 'Frontend\LoginController@postLogin')->name('auth/userlogin');
Route::get('/userlogout', 'Frontend\LoginController@logout');

Auth::routes();

Route::any('logout', function (Request $request) {
    Auth::logout();
    return redirect('/');
});

Route::post('searchaction','HomeController@searchaction');
Route::post('searchactioncity','HomeController@searchactioncity');
Route::post('searchactionlocation','HomeController@searchactionlocation');
Route::post('searchactionactivity','HomeController@searchactionactivity');
Route::get('/profile/editCustomerProfile/{user_id}','UserProfileController@familyProfileUpdate');
Route::post('/submit-family-form','UserProfileController@submitFamilyForm');
Route::post('/submit-family-form1','UserProfileController@submitFamilyForm1');
Route::post('/skip-family-form1','UserProfileController@skipFamilyForm1');
Route::post('/submit-family-form-with-skip','UserProfileController@submitFamilyFormWithSkip');
Route::get('/join/{id}/{user_id?}','ZoomController@index')->name('call');

Route::group(['middleware' => ['auth']], function()
{
Route::get('/createmeeting','ZoomController@createmeeting');
Route::get('/oncall/{mid}','ZoomController@oncall')->name('oncall');
Route::post('/store','ZoomController@store')->name('store');
Route::post('/invite','ZoomController@invite')->name('invite');
});

/* 09-june 2020 */
Route::get('/getactivitychoice/{userid}/{ser_id}','LessonController@getactivity')->name('activitychoice');
Route::get('/cart','LessonController@getcart');
Route::get('/deletecart/{id}/{bid}','LessonController@deletecart');
Route::get('/addnote/{b}/{n}','LessonController@addnote');
Route::get('/pay','LessonController@pay');
Route::get('/payment/{token}','LessonController@payment');
Route::get('/editcart/{bkid}/{cid}/{user_id}','LessonController@editcart');
Route::get('/savetime/{u}/{t}','LessonController@times');
Route::get('/get-booking-service-data','LessonController@getBookingServiceData');
Route::post('/savetimes','LessonController@savetime');
Route::post('/updatecart','LessonController@updatecart');
Route::post('/samfilter','LessonController@samfilter')->name('samfilter');

/* 09-june 2020 end */
Route::get('/allSports', 'HomeController@allSports')->name('list-all-sports');
Route::get('home/jsModalChildSports/{id}', 'HomeController@jsModalChildSports');
Route::group(array('prefix' => 'admin'), function(){

    Route::get('/', 'Admin\AdminAuthController@index');
    Route::post('/login', 'Admin\AdminAuthController@PostLogin');
    Route::get('/register', 'Admin\AdminAuthController@GetRegister');
    Route::post('/register', 'Admin\AdminAuthController@PostRegister');	
    Route::get('/background_check_faq','Admin\CheckFaqController@index')->name('background_check_faq');
    Route::get('/add_new_background_check_faq','Admin\CheckFaqController@create')->name('background_check_faq-add');
    Route::post('/background_check_faq_store','Admin\CheckFaqController@store')->name('background_check_faq_create');
    Route::post('/background_check_faq_update','Admin\CheckFaqController@update')->name('background_check_faq_update');
    Route::get('/background_check_faq_view/{id}','Admin\CheckFaqController@view')->name('background_check_faq_view');
    Route::get('/delete_background_check_faq/{id}','Admin\CheckFaqController@delete')->name('background_check_faq_delete');
    Route::get('/vatted_business_faq','Admin\BusinessFaqController@index')->name('vatted_business_faq');
    Route::get('/add_new_vatted_business_faq','Admin\BusinessFaqController@create')->name('vatted_business_faq-add');
    Route::post('/vatted_business_faq_store','Admin\BusinessFaqController@store')->name('vatted_business_faq_create');
    Route::post('/vatted_business_faq_update','Admin\BusinessFaqController@update')->name('vatted_business_faq_update');
    Route::get('/vatted_business_faq_view/{id}','Admin\BusinessFaqController@view')->name('vatted_business_faq_view');
    Route::get('/delete_vatted_business_faq/{id}','Admin\BusinessFaqController@delete')->name('vatted_business_faq_delete');

    //forgot password routes
    Route::get('/forgotpassword', 'Admin\AdminAuthController@GetForgotpassword');  
    Route::get('/dashboard', 'Admin\AdminUserController@index');
    Route::get('/profile/editprofiledetail', 'Admin\AdminUserProfileController@viewProfile');
    Route::post('/profile/editprofiledetail', 'Admin\AdminUserProfileController@editProfileDetail');
    Route::post('/profile/editProfilePicture', 'Admin\AdminUserProfileController@editProfilePicture');

    //cms
    Route::get('/cms', 'Admin\CmsController@listCmsModules');
    Route::get('/cms/edit/{id}', 'Admin\CmsController@viewCmsModule');  
    Route::post('/cms/edit/{id}', 'Admin\CmsController@postCmsModule');  

    //Manage Customers
    Route::get('/customers', 'Admin\AdminUserController@viewCustomers');
    Route::post('/customers', 'Admin\AdminUserController@postCustomers');
    Route::get('/customers/edit/{id}', 'Admin\AdminUserController@getCustomerDetails');
    Route::get('/customers/view/{id}', 'Admin\AdminUserController@viewCustomerDetails');
    Route::post('/customers/edit/{id}', 'Admin\AdminUserController@postCustomerDetails');
    Route::get('/customers/delete/{id}', 'Admin\AdminUserController@deleteCustomer');
    Route::get('/customers/deactivate/{id}', 'Admin\AdminUserController@deactivateCustomer');

    //reportedfeeds
    Route::get('/reportedfeeds', 'Admin\ReportedFeedsController@index')->name('reportedfeed-list');
    Route::get('/reportedfeeds/view/{id}', 'Admin\ReportedFeedsController@view');
    Route::post('/reportedfeeds/delete-reportedfeed', 'Admin\ReportedFeedsController@delete')->name('delete-reportedfeed');  
    Route::post('/reportedfeeds/deleteAll', 'Admin\ReportedFeedsController@deleteAll')->name('delete-reportedfeeds');
    Route::post('/reportedfeeds/allow-reportedfeed', 'Admin\ReportedFeedsController@allowFeed')->name('allow-reportedfeed');

    //plans
    Route::get('/plans/membership-plan', 'Admin\PlansController@index')->name('plan-list');
    Route::get('/plans/create', 'Admin\PlansController@create')->name('create-new-membership-plan');  
    Route::get('/plans/edit/{id}', 'Admin\PlansController@edit');  
    Route::post('/plans/update/{id}', 'Admin\PlansController@update')->name('update-plan');  
    Route::post('/plans/store', 'Admin\PlansController@store')->name('create-plan');  
    Route::DELETE('/plans/delete-plan', 'Admin\PlansController@delete')->name('delete-plan');  
    Route::post('/plans/deactivate-plan', 'Admin\PlansController@deactivate')->name('deactivate-plan'); 
    Route::post('/plans/activate-plan', 'Admin\PlansController@activate')->name('activate-plan'); 
    Route::post('/plans/deleteAll', 'Admin\PlansController@deleteAll')->name('delete-plans');

    // Slider
    Route::get('/slider', 'Frontend\SliderController@index')->name('slider');
    Route::get('/slider/create', 'Frontend\SliderController@create')->name('create-new-slider'); 
    Route::post('/slider/store', 'Frontend\SliderController@store')->name('create-slider');
    Route::DELETE('/slider/delete-slider', 'Frontend\SliderController@delete')->name('delete-slider');
    Route::get('/slider/edit/{id}', 'Frontend\SliderController@edit');
    Route::post('/slider/update/{id}', 'Frontend\SliderController@update')->name('update-slider'); 
    Route::get('/slider/delete/{id}', 'Frontend\SliderController@delete');

    //Trainer
    Route::get('/trainer', 'Frontend\TrainerController@index')->name('trainer');
    Route::get('/trainer/create', 'Frontend\TrainerController@create')->name('create-new-trainer');
    Route::post('/trainer/store', 'Frontend\TrainerController@store')->name('create-trainer'); 
    Route::DELETE('/trainer/delete-trainer', 'Frontend\TrainerController@delete')->name('delete-trainers');
    Route::get('/trainer/edit/{id}', 'Frontend\TrainerController@edit');
    Route::post('/trainer/update/{id}', 'Frontend\TrainerController@update')->name('update-trainer'); 
    Route::get('/trainer/delete/{id}', 'Frontend\TrainerController@delete');

    // Online classes and activities
    Route::get('/online', 'Frontend\OnlineController@index')->name('online');
    Route::get('/online/create', 'Frontend\OnlineController@create')->name('create-new-online'); 
    Route::post('/online/store', 'Frontend\OnlineController@store')->name('create-online');
    Route::DELETE('/online/delete-online', 'Frontend\OnlineController@delete')->name('delete-online');
    Route::get('/online/edit/{id}', 'Frontend\OnlineController@edit');
    Route::post('/online/update/{id}', 'Frontend\OnlineController@update')->name('update-online'); 
    Route::get('/online/delete/{id}', 'Frontend\OnlineController@delete');

    // Person classes and activities
    Route::get('/person', 'Frontend\PersonController@index')->name('person');
    Route::get('/person/create', 'Frontend\PersonController@create')->name('create-new-person'); 
    Route::post('/person/store', 'Frontend\PersonController@store')->name('create-person');
    Route::DELETE('/person/delete-person', 'Frontend\PersonController@delete')->name('delete-person');
    Route::get('/person/edit/{id}', 'Frontend\PersonController@edit');
    Route::post('/person/update/{id}', 'Frontend\PersonController@update')->name('update-person'); 
    Route::get('/person/delete/{id}', 'Frontend\PersonController@delete');

    //Trainer
    Route::get('/discover', 'Frontend\DiscoverController@index')->name('discover');
    Route::get('/discover/create', 'Frontend\DiscoverController@create')->name('create-new-discover');
    Route::post('/discover/store', 'Frontend\DiscoverController@store')->name('create-discover'); 
    Route::DELETE('/discover/delete-trainer', 'Frontend\DiscoverController@delete')->name('delete-discovers');
    Route::get('/discover/edit/{id}', 'Frontend\DiscoverController@edit');
    Route::post('/discover/update/{id}', 'Frontend\DiscoverController@update')->name('update-discover'); 
    Route::get('/discover/delete/{id}', 'Frontend\DiscoverController@delete');

    Route::get('/unclaimbusiness', 'Admin\PlansController@businessUnclaim');
    Route::get('/claimbusiness', 'Admin\PlansController@businessClaim');
    Route::get('/delete_claim/{id}','Admin\PlansController@deleteClaim')->name('claim_delete');
    Route::post('/import-claimbusiness', 'Admin\PlansController@addBusinessClaim');
    Route::post('/ignore-replace-claimbusiness', 'Admin\PlansController@ignoreReplaceBusinessClaim');

    //Feedbacks
    Route::get('/feedbacks', 'Admin\FeedbackController@index');
    Route::get('/feedbacks/view/{id}', 'Admin\FeedbackController@viewFeedback');

    //Booking
    Route::get('/bookings', 'Admin\BookingController@index');
    Route::get('/bookings/directHireDetails/{id}', 'Admin\BookingController@directHireDetails');
    Route::get('/bookings/quickHireDetails/{id}', 'Admin\BookingController@quickHireDetails');

    //Professionals Controller
    Route::get('/professionals', 'Admin\AdminProfessionalsController@index')->name('professionals-list');
    Route::post('/professionals', 'Admin\AdminProfessionalsController@postProfessionals');
    Route::get('/professionals/view/{id}', 'Admin\AdminProfessionalsController@view')->name('professionals-view');
    Route::post('/professionals/deleteAll', 'Admin\AdminProfessionalsController@deleteAll')->name('delete-professionals');
    Route::post('/professionals/approve-professional', 'Admin\AdminProfessionalsController@Approve')->name('approve-professional');

    // Business user

    //Professionals Controller
    Route::get('/businessusers', 'Admin\AdminBusinessController@index')->name('professionals-list');
    Route::post('/businessusers', 'Admin\AdminBusinessController@postProfessionals');
    Route::get('/businessusers/view/{id}', 'Admin\AdminBusinessController@view')->name('professionals-view');
    Route::post('/businessusers/deleteAll', 'Admin\AdminBusinessController@deleteAll')->name('delete-professionals');
    Route::post('/businessusers/approve-professional', 'Admin\AdminBusinessController@Approve')->name('approve-professional');

    // Professional Reject with Reason
    Route::post('/professionals/reject-professional', 'Admin\AdminProfessionalsController@rejectProfessional')->name('reject-professional'); 

    // Business user Reject with Reason
    Route::post('/businessusers/reject-professional', 'Admin\AdminBusinessController@rejectProfessional')->name('reject-professional');   

    //Sports
    Route::get('/sports', 'Admin\SportsController@index')->name('sports-list');
    Route::get('/sports/create', 'Admin\SportsController@create')->name('create-new-sport');  
    Route::post('/sports/store', 'Admin\SportsController@store')->name('store-new-sport'); 
    Route::post('/sports/deactivate-sport', 'Admin\SportsController@deactivate')->name('deactivate-sport');
    Route::post('/sports/activate-sport', 'Admin\SportsController@activate')->name('activate-sport');
    Route::get('/sports/edit/{id}', 'Admin\SportsController@getEdit')->name('get-edit-sport');
    Route::post('/sports/edit/{id}', 'Admin\SportsController@postEdit')->name('post-edit-sport');  
    Route::post('/sports/sports-ajax-get-list', 'Admin\SportsController@getAjaxSportListFromCat')->name('sports-ajax-get-list');
    Route::post('/happening/happening-now-ajax-get-list', 'Admin\SportsController@getAjaxHappeningNow')->name('happening-now-ajax-get-list');

    // Newsletters
    Route::get('/newsletters', 'Admin\NewsletterController@index')->name('newsletters-list');
    Route::post('/newsletters', 'Admin\NewsletterController@postNewsletter');
    Route::get('/newsletters/delete/{id}', 'Admin\NewsletterController@delete');
    Route::get('/newsletters/create', 'Admin\NewsletterController@create')->name('send-newsletter-email');
    Route::post('/newsletters/send-email', 'Admin\NewsletterController@store')->name('send-newsletter');

    Route::get('/logout', function(){
        return Redirect::to('/admin');
    });

    /* Help desk by sam */
    Route::get('/helpdesk','Admin\HelpController@index')->name('helpdesk');
    Route::get('/add_new_help','Admin\HelpController@create')->name('helpdesk-add');
    Route::post('/help_store','Admin\HelpController@store')->name('help_create');
    Route::post('/help_update','Admin\HelpController@update')->name('help_update');
    Route::get('/help_view/{id}','Admin\HelpController@view')->name('help_view');
    Route::get('/delete_help/{id}','Admin\HelpController@delete')->name('help_delete');
    /* Help desk by sam end*/
});

// Task Routes
// Route::get('/tasks', 'TaskController@index');
// Route::post('/task', 'TaskController@store');
// Route::delete('/task/{task}', 'TaskController@destroy');
// Route::get('/testTwilio', 'TaskController@testTwilio');
// Route::post('/testTwilio', 'TaskController@testTwilio');

Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::post('auth/updateStep', 'Auth\AuthController@updateStep');
Route::post('auth/savegender', 'Auth\AuthController@saveGender');
Route::post('auth/saveaddress', 'Auth\AuthController@saveaddress');
Route::get('verify/{confirmation_code}', 'Auth\AuthController@verifyUserAccount');

// Registration Routes...
Route::post('auth/register', 'Auth\AuthController@postRegister')->name('reg');
Route::post('auth/resendverify', 'Auth\AuthController@resendVerifyCode');
Route::get('register/confirm/{confirmation_code}', 'Auth\AuthController@getResendEmail');
Route::get('auth/registerBusiness', 'Auth\AuthController@getRegisterbusiness');
Route::post('auth/registerBusiness', 'Auth\AuthController@postRegisterbusiness');
Route::get('/mytest', 'Auth\AuthController@test');

// new user type addition 17-05-2019 -- myzeal
Route::get('auth/registerProfessional', 'Auth\AuthController@getRegisterprofessional');
Route::post('auth/registerProfessional', 'Auth\AuthController@postRegisterprofessional');

//login with social media
Route::group(['middleware'], function () {
    Route::get('socialauth/socialLogin/{provider}', 'Auth\SocialAuthController@socialLogin');
    Route::get('socialauth/socialRegister/{provider}/{usertype}', 'Auth\SocialAuthController@socialRegister');
    Route::get('socialauth/handleProviderCallbackLogin/{provider}', 'Auth\SocialAuthController@handleProviderCallbackLogin');
});

// Facebook login
Route::get('login/facebook', 'LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'LoginController@handleFacebookCallback');

// Google login
Route::get('login/google', 'LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'LoginController@handleGoogleCallback');

// Password reset link request routes...
Route::post('/password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::get('/password/reset', 'Auth\PasswordController@getReset');
Route::post('/password/reset', 'Auth\PasswordController@postReset')->name('password.reset');
Route::get('auth/jsModallogin', 'Auth\AuthController@jsModallogin');
Route::get('auth/jsModallogin/{sport_id}', 'Auth\AuthController@jsModallogin');
Route::get('auth/jsModalregister', 'Auth\AuthController@jsModalregister');
Route::get('auth/jsModalpassword', 'Auth\AuthController@jsModalpassword');
Route::post('newsletters/saveNewsletter','NewsletterController@saveNewsletter');
Route::get('unsubscribe', 'NewsletterController@getUnsubscribe');
Route::post('unsubscribe', 'NewsletterController@unsubscribe');

/*Route::get('socialauth/login', 'Auth\SocialAuthController@getLogin');
Route::get('socialauth/handleProviderCallbackLogin', 'Auth\SocialAuthController@handleProviderCallbackLogin');*/

//profile routes starts
Route::get('background-check-faq', 'UserProfileController@getBackgroundCheckFAQ');
Route::post('update-picture', 'UserProfileController@uploadPic');
Route::get('vetted-business-faq', 'UserProfileController@getVettedBussinessFAQ');
Route::get('profile/getQuestions', 'UserProfileController@getQuestions');

// Route::get('profile/{userid}', 'UserProfileController@index');
Route::get('profile/createProfile', 'UserProfileController@createProfile');
Route::post('profile/saveProfileHistory', 'UserProfileController@saveProfileHistory');
Route::post('/upgarde/businessProfile', 'UserProfileController@upgradeBusinessProfile');
Route::post('/upgarde/createBusiness', 'UserProfileController@createBusinessProfile');
Route::post('/profile/switchaccount', 'UserProfileController@switchAccount');
Route::get('/company/{company_name}/{type?}', 'UserProfileController@companyDetail');
Route::get('profile/createProfileSecurity', 'UserProfileController@createProfileSecurity');
Route::post('profile/saveProfileSecurity', 'UserProfileController@saveProfileSecurity');
Route::get('profile/createProfileMembership', 'UserProfileController@createProfileMembership');
Route::post('profile/saveProfileMembership', 'UserProfileController@saveProfileMembership');
Route::post('profile/sendProfileToReview/{status}', 'UserProfileController@sendProfileToReview');
Route::get('profile/viewProfile', 'UserProfileController@viewProfile')->name('profile-viewProfile');
Route::get('profile/viewProfile1', 'UserProfileController@viewProfile1');
Route::get('business-detail-delete/{business_id}', 'UserProfileController@businessDelete');
Route::get('profile/change-password', 'UserProfileController@viewChangePassword');
Route::post('change-password/reset', 'UserProfileController@postChangePassword');

/////////made by me////////
Route::get('family-member-delete/{family_id}', 'UserProfileController@deleteFamily');
Route::post('add-family-detail', 'UserProfileController@addFamilyDetail');
Route::post('/profile/create/company', 'UserProfileController@createCompany');
Route::post('/profile/create/newService', 'UserProfileController@createNewService');
Route::get('/profile/delete-service', 'UserProfileController@deleteNewService');
Route::post('/mybusinessusertag', 'UserProfileController@mybusinessusertag');
Route::get('/manage/company', 'UserProfileController@manageCompany')->name('manageCompany');
Route::get('/manage/service/{company_id}', 'UserProfileController@manageService')->name('manageService');
Route::get('/pcompany/delete/{company_id}', 'UserProfileController@deleteCompany');
Route::get('/pcompany/edit/{company_id}', 'UserProfileController@editCompany');
Route::get('/pcompany/view/{company_id}', 'UserProfileController@viewPCompany');
Route::get('/newtest', 'UserProfileController@newtest');
Route::post('/favourite', 'UserProfileController@Pfavourite')->name('favourite');
Route::post('/follow_company', 'UserProfileController@Pfollow')->name('follow_company');
Route::post('/remove_follower', 'UserProfileController@removefollower')->name('remove_follower');
Route::post('/unfollow_company', 'UserProfileController@Punfollow_company')->name('unfollow_company');
Route::post('/follow_back', 'UserProfileController@Pfollow_back')->name('follow_back');
Route::post('/follower_company', 'UserProfileController@Pfollower')->name('follower_company');
Route::post('/unfollower_company', 'UserProfileController@Punfollower')->name('unfollower_company');
Route::post('/company-image-upload', 'UserProfileController@companyImageUpload');
Route::post('/user-multi-image-upload', 'UserProfileController@userImageUpload');
Route::get('personal-profile/add-family', 'UserProfileController@addFamily');
Route::post('/gallery-upload', 'UserProfileController@galleryUpload')->name('file-upload');
Route::get('gallery-picture/{user_id}', 'UserProfileController@galleryList')->name('file-list');
Route::post('profile/editProfilePicture', 'UserProfileController@editProfilePicture');
Route::post('profile/editCompanyPicture', 'UserProfileController@editCompanyPicture');
Route::post('profile/editBannerPicture', 'UserProfileController@editBannerPicture');
Route::post('profile/editProfileDetail', 'UserProfileController@editProfileDetail');
Route::get('profile/editProfileHistory', 'UserProfileController@editProfileHistory');
Route::post('profile/saveEditedProfileHistory', 'UserProfileController@saveEditedProfileHistory');
Route::get('profile/editProfileSecurity', 'UserProfileController@editProfileSecurity');
Route::get('profile/editProfileMembership', 'UserProfileController@editProfileMembership');
Route::post('editprofile/addeducationdetail', 'UserProfileController@EducationValidator');
Route::post('editprofile/addcertificatedetail', 'UserProfileController@CertificationValidator');
Route::post('editprofile/addhistorydetail', 'UserProfileController@historyValidator');
Route::post('editprofile/addskillawarddetail', 'UserProfileController@skillAwardValidator');
Route::post('deleteprofile/data', 'UserProfileController@deleteData');
Route::post('service/editservicedetail', 'UserProfileController@editservicedetail');

/* my popups routes */
Route::get('/evident', 'UserProfileController@evident');
Route::post('/evidentdata', 'UserProfileController@evidentdata');
Route::get('/get_serviceform', 'UserProfileController@get_serviceform');
Route::get('/get_serviceform1', 'UserProfileController@get_serviceform1');
Route::get('/get_serviceform2/{id}', 'UserProfileController@get_serviceform2');
Route::get('/getMyService', 'UserProfileController@getMyService1');
Route::get('/get_createcompanyform', 'UserProfileController@get_createcompanyform');
Route::get('/get_serviceform/{id}', 'UserProfileController@get_serviceform');
Route::get('/getmyservices', 'UserProfileController@getmyservices');
Route::post('/myemail', 'Auth\AuthController@myemail');

//profile routes ends
Route::group(['middleware' => ['auth']], function()
{
    //favourite routes
    Route::post('/isfavourite','UsersFavouriteController@isFavourite');
    Route::get('favourite/index', 'UsersFavouriteController@index');
    // timline route starts
    Route::get('timeline', 'TimelineController@index');
    // Timeline Feed - Like Route
    Route::post('timeline-ajax-feed-like', 'TimelineController@addLikeFeed')->name('timeline.feed-like');
    Route::post('timeline-ajax-feed-comments', 'TimelineController@showAllComments')->name('timeline.feed-comments');
    Route::post('timeline-ajax-remove-media-item', 'TimelineController@removeMediaItemGallery')->name('timeline.ajax-remove-media-item-gallery');
    Route::post('timeline-get-single-ajax-feed', 'TimelineController@getSingleProfileFeedPostById')->name('timeline.get-ajax-single-profile-feed');
    Route::post('timeline-get-single-ajax-personal-feed', 'TimelineController@getSinglePersonalProfileFeedPostById')->name('timeline.get-ajax-single-personal-feed');
    Route::post('timeline-ajax-edit-gallery-feed-title', 'TimelineController@updateFeedGalleryTitle')->name('timeline.edit-gallery-feed-title');
    Route::post('timeline-ajax-edit-feed-video-file', 'TimelineController@updateFeedVideoFile')->name('timeline.edit-feed-video-file');
    Route::post('timeline-delete-feed', 'TimelineController@deleteFeedById')->name('timeline.delete-feed-post');
    Route::post('timeline-get-ajax-feed', 'TimelineController@getFeedByFeedId')->name('timeline.get-ajax-feed');
    Route::post('timeline-get-ajax-personal-feed', 'TimelineController@getPersonalFeedByFeedId')->name('timeline.get-ajax-personal-feed');
    Route::post('timeline-ajax-feed-post-comment', 'TimelineController@postComment')->name('timeline.post-comment');
    Route::post('timeline-ajax-feed-delete-comment', 'TimelineController@deleteComment')->name('timeline.delete-comment');
    Route::post('timeline-ajax-feed-post-edit-comment', 'TimelineController@postEditComment')->name('timeline.edit-post-comment');
    Route::post('timeline-ajax-feed-unlike', 'TimelineController@removeLikeFeed')->name('timeline.feed-unlike');
    Route::any('timeline-ajax-add-feed-content', 'TimelineController@addFeedContent')->name('timeline.add-feed-content');
    Route::post('timeline-ajax-share-timeline-feed', 'TimelineController@shareTimeLineFeed')->name('timeline.share-time-line-feed');
    Route::post('timeline-ajax-upload-video-feed', 'TimelineController@uploadVideoFeed')->name('timeline.upload-video-feed');
    Route::post('timeline-ajax-upload-gallery-feed', 'TimelineController@uploadGalleryFeed')->name('timeline.upload-gallery-feed');
    Route::post('timeline-ajax-edit-upload-gallery-feed', 'TimelineController@editUploadGalleryFeed')->name('timeline.edit-upload-gallery-feed');
    Route::post('timeline-ajax-report-feed', 'TimelineController@reportFeed')->name('timeline.report-feed');
    Route::post('timeline-ajax-feed-post-reply-comment', 'TimelineController@postReplyComment')->name('timeline.post-reply-comment');
    Route::post('timeline-ajax-feed-delete-reply-comment', 'TimelineController@deleteReplyComment')->name('timeline.delete-reply-comment');
    Route::post('timeline-ajax-feed-post-edit-reply-comment', 'TimelineController@postEditReplyComment')->name('timeline.edit-post-reply-comment');
    Route::post('timeline-ajax-feed-replies', 'TimelineController@showAllReplies')->name('timeline.feed-replies');

    //All routes you'd like to handle that way
    Route::get('/mytimeline', 'TimelineController@getMytimeline');
    Route::get('/ourprogram', 'TimelineController@getOurprogram');
    Route::get('/mytimelineimages', 'TimelineController@getMyTimelineImages');
    Route::get('/mytimelinevideos', 'TimelineController@getMyTimelineVideos');
    Route::any('timeline-ajax-view-more-media', 'TimelineController@viewMoreMedia')->name('timeline.view-more-media');
    Route::post('timeline-get-all-feed', 'TimelineController@getUserFeeds')->name('timeline.get-all-feed');
    Route::post('timeline-get-my-feed', 'TimelineController@getMyFeeds')->name('timeline.get-my-feed');
    Route::post('timeline-ajax-add-favorite-media', 'TimelineController@addToFavoriteUserMedia')->name('timeline.ajax-add-favorite-media');
    Route::post('timeline-ajax-remove-favorite-media', 'TimelineController@removeToFavoriteUserMedia')->name('timeline.ajax-remove-favorite-media');
    // timline route ends
});



Route::get('/timeline/feed/{feed_id}', 'TimelineController@getFeed');
// Quick Hire Lesson Route
Route::get('auth/lesson', 'Auth\AuthController@jsModalBookLesson');
Route::get('auth/quickhire1', 'Auth\AuthController@jsModalQuickHire1');
Route::get('auth/quickhire2', 'Auth\AuthController@jsModalQuickHire2');
Route::get('auth/quickhire3', 'Auth\AuthController@jsModalQuickHire3');
Route::get('auth/quickhire4', 'Auth\AuthController@jsModalQuickHire4');
Route::get('auth/quickhire5', 'Auth\AuthController@jsModalQuickHire5');
Route::get('auth/quickhire6', 'Auth\AuthController@jsModalQuickHire6');
Route::get('auth/quickhire7', 'Auth\AuthController@jsModalQuickHire7');
Route::get('auth/quickhire8', 'Auth\AuthController@jsModalQuickHire8');
Route::get('auth/quickhire9', 'Auth\AuthController@jsModalQuickHire9');

Route::post('apicall/testIosNotification', 'TestNotificationController@send_notification_ios');
Route::get('apicall/testIosNotification', 'TestNotificationController@send_notification_ios');
Route::get('lesson/jsModallesson/{modalname}', 'LessonController@jsModallesson');
Route::get('lesson/jsModallesson/{modalname}/{sportId}', 'LessonController@jsModallesson');
Route::post('lesson/getquotes', 'LessonController@PostQuotes');

//Route::get('/mypostedjobs', 'LessonController@Getmypostedjobs');
//Route::get('/mybooking', 'LessonController@GetProfessionalBookingList');
//Route::get('/mybooking/{status}', 'LessonController@GetProfessionalBookingList');

Route::get('/mybooking', 'LessonController@GetBookingList');
Route::get('/mybooking/{status}', 'LessonController@GetBookingList');
Route::get('/jobmatchingskill', 'LessonController@Getjobmatchingskill');
Route::get('/jobs/{id}', 'LessonController@Getjobs');
Route::get('/jobs/submit/{id}', 'LessonController@GetjobsSubmit');
Route::get('/booking/postquote/{booking_id}', 'LessonController@PostQuote');
Route::post('/booking/savepostquote', 'LessonController@SavePostQuote');
Route::get('/booking/myquote', 'LessonController@GetUserQuoteList');
Route::post('/booking/deletepostquote', 'LessonController@DeletePostQuote');
Route::get('/viewbusinessprofile/{user_id}', 'LessonController@viewbusinessprofile');
Route::any('/direct-hire', 'LessonController@getDirecthire');
Route::any('/instant-hire', 'LessonController@getInstanthire');
Route::get('/directhire/viewprofile/{user_id}', 'LessonController@directhireViewProfile');
Route::get('/directhire/bookprofile/{user_id}', 'LessonController@directhireBookProfile');
Route::get('/searchProfile/{selected_sport}', 'LessonController@postSearchProfile');
Route::post('/savedirecthirerequest', 'LessonController@postSaveDirecthireRequest');
Route::any('/direct-hire/cart-payment', 'LessonController@cartpayment');
Route::any('/direct-hire/confirm-payment', 'LessonController@confirmpayment');
Route::get('/direct-hire/getCompareProfessionalDetail/{id}', 'LessonController@getCompareProfessionalDetail');
Route::any('/instant-hire/cart-payment', 'LessonController@cartpaymentinstant');
Route::any('/instant-hire/confirm-payment', 'LessonController@confirmpaymentinstant');
Route::get('/instant-hire/getCompareProfessionalDetail/{id}', 'LessonController@getCompareProfessionalDetailInstant');

//booking status and details
Route::get('/viewBooking/{booking_id}', 'LessonController@viewBooking');
Route::post('/book-professional', 'LessonController@postBookProfessional');
Route::post('/booking/confirmBooking', 'LessonController@confirmBooking');
Route::post('/booking/rejectBooking', 'LessonController@rejectBooking');

//address routes
// Route::get('/get-country-list','UserProfileController@getCountryList');
Route::get('/get-state-list','UserProfileController@getStateList');
Route::get('/get-city-list','UserProfileController@getCityList');

//reviews
Route::get('/reviews', 'ReviewController@Index');
Route::get('/reviews/add', 'ReviewController@getAdd');
Route::post('/reviews/save', 'ReviewController@postSave');
Route::post('/reviews/update', 'ReviewController@reviewUpdate')->name('reviews.update-review');
Route::post('/reviews/delete-review', 'ReviewController@reviewDelete')->name('reviews.delete-review');

//feedback about fitnessity
Route::get('/feedback/jsModalfeedback', 'FeedbackController@jsModalfeedback');
Route::post('/feedback/saveFeedback', 'FeedbackController@saveFeedback');

//Terms & Condition Route
Route::get('terms-condition', 'PageController@GetTermsPage');
Route::get('privacy-policy', 'PageController@GetPrivacyPage');

//footer links
Route::get('/about-us', 'PageController@GetPageAboutUs');
Route::get('/how-it-works-customer', 'PageController@GetPageHowItWorksCustomer');
Route::get('/how-it-works-business', 'PageController@GetPageHowItWorksBusiness');
Route::get('/discover', 'PageController@GetPageDiscover');
Route::get('/be-a-part', 'PageController@GetPageBeaPart');
Route::get('/hire-trainer', 'PageController@GetPageHireTrainer');
Route::get('/store', 'PageController@GetPageStore');
Route::get('/jobs', 'PageController@GetPageJobs');
Route::get('/contact-us', 'PageController@GetPageContactUs');
Route::get('/help', 'PageController@get_qa')->name('q');
Route::post('/getans', 'PageController@getans')->name('qanw');
Route::get('/customer-support', 'PageController@CustomerSupport')->name('customer');
Route::get('/business-support', 'PageController@BusinessSupport')->name('business');
Route::get('/help-center', 'PageController@HelpCenter')->name('help');
Route::get('/help-dask/{id}', 'PageController@helpans')->name('qap');
Route::post('/contact-us', 'PageController@PostPageContactUs');
Route::get('/network', 'PageController@GetPageNetwork');
Route::get('/userevents', 'PageController@GetPageUserEvents');
Route::get('/popularsearch', 'PageController@GetPagePopularSearch');
Route::get('/forum', 'PageController@GetPageForum');
Route::get('/news', 'PageController@GetPageNews');
Route::get('/testmail', 'LessonController@test');
Route::get('/user/sport-alert', 'UserProfileController@showSportAlertbox');
Route::post('/getlanguage', 'UserProfileController@getlanguage');

// Route::filter('author_check', function () { 
// 	if ( !Session::has('user') || !Session::get('user')->id ) { 
// 		//return View::make('login');
// 		return Redirect::to('/auth/jsModallogin'); 
// 	}
// });

// home page banner search filter
//view netwrok user profile
// network routes

Route::group(['middleware' => 'auth'], function () {
    // Route::resource('network', 'NetworkController');
    Route::any('/network/getcontacts', 'NetworkController@GetContacts');
    Route::post('/network/sendemailinvitation', 'NetworkController@sendEmailInvitation');
    Route::post('/network/sendinvitation', 'NetworkController@sendInvitation');    
    Route::post('/network/sendfriendrequest', 'NetworkController@sendFriendRequest');
    Route::post('/network/filterregisteredcontacts', 'NetworkController@filterRegisteredContacts');
    Route::get('/network/mynetwork', 'NetworkController@getMyNetwork');
    Route::get('/network/removeNetwork', 'NetworkController@removeNetwork');
    Route::get('/network/acceptNetwork', 'NetworkController@acceptNetwork');
    Route::get('/network/getMyNetwork', 'NetworkController@getMyNetworkAjax');
    Route::get('/network/getNetworkRequestReceived', 'NetworkController@getNetworkRequestReceivedAjax');
    Route::get('/network/getNetworkRequestSent', 'NetworkController@getNetworkRequestSentAjax');
    Route::get('/network/pendingNetworkInvitation', 'NetworkController@pendingNetworkInvitation');
    Route::get('/network/viewprofile/{user_id}', 'NetworkController@networkViewProfile');
    Route::post('/network/user/follow', 'NetworkController@userFollow');
    Route::post('/network/user/unfollow', 'NetworkController@userUnfollow');
    Route::get('/network/follow', 'NetworkController@Followers');
    Route::get('/network/followers', 'NetworkController@usereFollowers');
    Route::get('/network/followings', 'NetworkController@usereFolloweings');
    // Route::get('/outlookSignin', 'NetworkController@outlookSignin');
    // Route::get('/authorize', 'NetworkController@getOutlooktoken');
});

Route::get('/personal-profile/booking-info', 'UserProfileController@bookinginfo');
Route::get('/personal-profile/calendar', 'UserProfileController@calendar')->name('calendar');
Route::post('/fullcalenderAjax', 'UserProfileController@cajax')->name('fullcalenderAjax');
Route::get('/personal-profile/favorite', 'UserProfileController@favorite');
Route::get('/personal-profile/followers', 'UserProfileController@followers');
Route::get('/personal-profile/following', 'UserProfileController@following');
Route::get('/personal-profile/payment-info', 'UserProfileController@paymentinfo');
Route::post('/personal-profile/payment-save', 'UserProfileController@paymentsave')->name('paymentsave');
Route::post('/personal-profile/payment-delete', 'UserProfileController@paymentdelete')->name('paymentdelete');
Route::get('/personal-profile/review', 'UserProfileController@review');
Route::get('/personal-profile/user-profile', 'UserProfileController@userprofile')->name('user-profile');
Route::post('updateuserprofile', 'UserProfileController@updateuserprofile')->name('updateuserprofile');
Route::post('savemycoverphoto', 'UserProfileController@savemycoverphoto')->name('savemycoverphoto');
Route::post('removeusercoverphoto', 'UserProfileController@removeusercoverphoto')->name('removeusercoverphoto');
Route::post('updatechangepassword', 'UserProfileController@updatechangepassword')->name('updatechangepassword');
Route::post('addFamilyMember', 'UserProfileController@addFamilyMember')->name('addFamilyMember');
Route::post('removefamily', 'UserProfileController@removefamily')->name('removefamily');