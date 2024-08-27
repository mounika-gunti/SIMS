<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'services';
    protected $guarded = [];

    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'customer_services', 'service_id', 'customer_id');
    }

    public function serviceOccurences()
    {
        return $this->hasMany(ServiceOccurence::class);
    }
}
