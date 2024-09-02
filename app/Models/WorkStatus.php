<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkStatus extends Model
{
    use HasFactory;

    protected $table = 'work_status';

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    protected $dates = ['from_date', 'to_date', 'action_on'];
}