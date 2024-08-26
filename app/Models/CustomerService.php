<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerService extends Model
{
    use HasFactory;

    protected $table='customer_services';

    protected $guarded =[];


    public function customer(){
        return $this->belongsTo(Customer::class, 'customer');
    }
}