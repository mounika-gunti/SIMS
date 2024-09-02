<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        $employee = Auth::user()->employee;
        // dd($employee);

        if (!$employee) {
            return view('dashboard.index', [
                'assignedCustomerCount' => 0,
                'gstCount' => 0,
                'ptCount' => 0,
            ]);
        }

        $customers = $employee->customers;
        // dd($customers);

        $gstCount = $customers->flatMap(function ($customer) {
            return $customer->services->filter(function ($service) {
                return $service->name === 'GST';
            });
        })->count();

        $ptCount = $customers->flatMap(function ($customer) {
            return $customer->services->filter(function ($service) {
                return $service->name === 'GST';
            });
        })->count();

        return view('dashboard.index', [
            'assignedCustomerCount' => $customers->count(),
            'gstCount' => $gstCount,
            'ptCount' => $ptCount,

        ]);
    }

    public function gst_tasks()
    {
        return view('dashboard.gst_tasks');
    }
}
