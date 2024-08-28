<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    protected $table = 'employees';
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'phone_number',
        'whatsapp_number',
    ];


    public function customers()
    {
        return $this->hasMany(Customer::class, 'assigned_to');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}