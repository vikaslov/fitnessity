<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessPriceDetails extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'business_price_details';

    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userid',
        'cid',
        'serviceid',
        'pay_chk',
        'pay_session',
        'pay_price',
        'pay_discountcat',
        'pay_discounttype',
        'pay_discount',
        'pay_estearn',
        'pay_setnum',
        'pay_setduration',
        'pay_after'
    ];
    
}