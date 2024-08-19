<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    protected $table = 'employees';
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'phone_number',
        'whatsapp_number',
        'address',
        'designation_id',
        'branch_id',
        'aadhar_number',
        'aadhar_attach_link',
        'pan_number',
        'pan_attach_link',
        'bank_name',
        'ifsc',
        'account_no',
        'emergency_contact_name',
        'emergency_contact_phone_number',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the branch associated with the employee.
     */


    /**
     * Get the designation associated with the employee.
     */


    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }
}