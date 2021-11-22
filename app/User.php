<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','new_password_key','username'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public $timestamps = false;
    
    protected $appends = ['about_me','network_count','about_business'];
    
    
    function getAboutMeAttribute() {

        $about_me = "";

        if($this->role == "customer"){
            if(isset($this['customerDetail']['about_me']) && !empty($this['customerDetail']['about_me'])) {
                $about_me = $this['customerDetail']['about_me'];
            }
            return $about_me;
        }

        if($this->role == "business"){
            if(isset($this['ProfessionalDetail']['about_me']) && !empty($this['ProfessionalDetail']['about_me'])) {
                $about_me = $this['ProfessionalDetail']['about_me'];
            }
            return $about_me;

        }

    }
    
    



    function getAboutBusinessAttribute() {

        

        if($this->role == "business"){

            return $this['ProfessionalDetail']['about_business'];



        }

    }



    function getNetworkCountAttribute() {

        

      return UserNetwork::where('status','accepted')

                         ->where(function($q) {

                                $q->where('user_id', $this->id)

                                  ->orWhere('friend_id', $this->id);

                            })

                         ->count();

    }



   



    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    



    /**

     * The attributes excluded from the model's JSON form.

     *

     * @var array

     */

  //  protected $hidden = ['password'];



    /**

     * Get all of the tasks for the user.

     */

    // public function tasks()

    // {

    //     return $this->hasMany(Task::class);

    // }



    public function employmenthistory()

    {

        return $this->hasMany(UserEmploymentHistory::class)->orderBy('is_present', 'desc')->orderBy('service_start', 'desc');

    }

    public function company()
    {
        return $this->hasMany(CompanyInformation::class);
    }

    public function education()

    {

        return $this->hasMany(UserEducation::class);

    }



    public function certification()

    {

        return $this->hasMany(UserCertification::class);

    }



    public function service()

    {

        return $this->hasMany(UserService::class);

    }
    
    public function skill()

    {

        return $this->hasMany(UserSkillAward::class);

    }



    public function UserSecurityQuestion()

    {

        return $this->hasMany(UserSecurityQuestion::class);

    }


    public function UserMembership()

    {

        return $this->hasMany(UserMembership::class);

    }



    public function ProfessionalDetail()

    {

        return $this->hasOne(UserProfessionalDetail::class);

    }



    public function SocialAccount()

    {

        return $this->hasOne(SocialAccount::class);

    }



    public function BookingStatus()

    {

        return $this->hasMany(UserBookingStatus::class);

    }



    public function Review()

    {

        return $this->hasMany(Review::class);

    }



    public function countries()

    {

        return $this->belongsTo(AddrCountries::class, 'country', 'country_code');

    }



    public function states()

    {

        return $this->belongsTo(AddrStates::class, 'state', 'id');

    }



    public function cities()

    {

        return $this->belongsTo(AddrCities::class, 'city', 'id');

    }



    public function networks()

    {

        return $this->hasMany(UserNetwork::class);

    }



    public function customerDetail()

    {

        return $this->hasOne(UserCustomerDetail::class);

    }



    public function favourites()

    {

        return $this->hasMany(UserFavourite::class,'favourite_user_id', 'id');

    }



    public function follows()

    {

        return $this->hasMany(UserFollower::class, 'follower_id', 'id');

    }

}
