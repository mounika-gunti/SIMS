<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table='customers';

    // protected $fillable=[
    //     'name',
    //     'email',
    //     'phone_number',
    //     'payment_terms',
    //     'credit_days',
    //     'description',
    //     'shipping_country_id',
    //     'shipping_state_id',
    //     'shipping_city_id',
    //     'shipping_address',
    //     'billing_country_id',
    //     'billing_state_id',
    //     'billing_city_id',
    //     'billing_address',
    //     'gst_number',
    //     'assigned_to',
    // ];

    protected $guarded=[];

    public function country(){
        $this->belongsTo(Country::class,'country_id');
    }

    public function state(){
        $this->belongsTo(State::class,'states_id');
    }

    public function city(){
        $this->belongsTo(City::class,'city_id');
    }




}
