<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessServices extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'business_services';

    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cid',
        'userid',
        'serviceid',
        'service_type',
        'sport_activity',
        'program_name',
        'program_desc',
        'profile_pic',
        'instant_booking',
        'reserved_booking',
        'notice_value',
        'notice_key',
        'advance_value',
        'advance_key',
        'activity_value',
        'activity_key',
        'cancel_value',
        'cancel_key',
        'willing_to_travel',
        'miles',
        'select_service_type',
        'activity_location',
        'activity_for',
        'age_range',
        'group_size',
        'difficult_level',
        'activity_experience',
        'instructor_habit',
        'activity_meets',
        'starting',
        'schedule_until',
        'sales_tax',
        'dues_tax'
    ];
    
    public function businesscompanydetail() {
        return $this->hasMany(BusinessCompanyDetail::class, 'cid');
    }
}