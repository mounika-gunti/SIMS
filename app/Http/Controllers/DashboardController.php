<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WorkStatus;

class DashboardController extends Controller
{
    public function index()
    {
        $employee = Auth::user()->employee;

        if (!$employee) {
            return view('dashboard.index', [
                'assignedCustomerCount' => 0,
                'serviceCounts' => [],
            ]);
        }

        $customers = $employee->customers;

        $serviceCounts = $customers->flatMap(function ($customer) {
            return $customer->services;
        })->groupBy('name')->map->count();

        return view('dashboard.index', [
            'assignedCustomerCount' => $customers->count(),
            'serviceCounts' => $serviceCounts,
        ]);
    }


    public function tasks(Request $request, $type)
    {

        $type = $request->query('type', $type);
        $currentMonth = now()->format('F');
        $customers = \App\Models\Customer::all();

        $tasks = WorkStatus::with('customer', 'service')
            ->whereHas('service', function ($query) use ($type) {
                $query->where('name', $type);
            })
            ->where('customer_id', Auth::user()->id)
            ->get();

        $completedTasks = $tasks->filter(function ($task) {
            return $task->status === 'done';
        });

        return view('dashboard.tasks', [
            'type' => $type,
            'tasks' => $tasks,
            'completedTasks' => $completedTasks,
            'customers' => $customers,
            'currentMonth' => $currentMonth,
        ]);
    }

    public function updateStatus(Request $request)
    {
        $task = WorkStatus::find($request->task_id);
        $task->status = $request->status;
        $task->save();

        return redirect()->back()->with('success', 'Task status updated successfully.');
    }
}
