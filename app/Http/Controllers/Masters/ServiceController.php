<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceOccurrence;
use App\Http\Requests\ServiceRequest;
use Illuminate\Http\RedirectResponse;


class ServiceController extends Controller
{
    public function index()
    {
        return view('masters.services.index');
    }

    public function create()
    {
        return view('masters.services.create');
    }

    public function show()
    {
        return view('masters.services.view');
    }

    public function edit()
    {
        return view('masters.services.edit');
    }

    public function storeMonthly(Request $request)
    {

        // dd($request->all());
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'months' => 'array',
            'months.*' => 'in:january,february,march,april,may,june,july,august,september,october,november, december',
            'from_day' => 'array',
            'to_day' => 'array',
        ]);


        $service = Service::create([
            'name' => $validated['service_name'],
            'details' => $validated['details'],
            'frequency' => 'monthly',
        ]);


        foreach ($validated['months'] as $month) {
            ServiceOccurrence::create([
                'service_id' => $service->id,
                'frequency_type' => 'monthly',
                'month_name' => $month,
                'from_day' => $validated['from_day'][$month] ?? null,
                'to_day' => $validated['to_day'][$month] ?? null,
            ]);
        }

        return redirect()->route('services.index')->with('success', 'Monthly service added successfully.');
    }

    public function storeQuarterly(Request $request)
    {

        dd($request->all());
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'quarter_name' => 'array',
            'quarter_name.*' => 'in:january-march,april-june,july-september,october-december',
            'month_name' => 'array',
            'from_day' => 'array',
            'to_day' => 'array',
        ]);


        $service = Service::create([
            'service_name' => $validated['service_name'],
            'details' => $validated['details'],
            'frequency' => 'quarterly',
        ]);


        foreach ($validated['quarter_name'] as $quarter) {
            ServiceOccurrence::create([
                'service_id' => $service->id,
                'frequency_type' => 'quarterly',
                'quarter' => $quarter,
                'month' => $validated['month_name'][$quarter] ?? null,
                'from_day' => $validated['from_day'][$quarter] ?? null,
                'to_day' => $validated['to_day'][$quarter] ?? null,
            ]);
        }

        return redirect()->route('services.index')->with('success', 'Quarterly service added successfully.');
    }

    public function storeBiannually(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'biannual_name' => 'array',
            'biannual_name.*' => 'in:january-june,july-december',
            'month_name' => 'array',
            'from_day' => 'array',
            'to_day' => 'array',
        ]);


        $service = Service::create([
            'service_name' => $validated['service_name'],
            'details' => $validated['details'],
            'frequency' => 'biannually',
        ]);


        foreach ($validated['biannual_name'] as $biannual) {
            ServiceOccurrence::create([
                'service_id' => $service->id,
                'frequency_type' => 'biannually',
                'biannual' => $biannual,
                'month' => $validated['month_name'][$biannual] ?? null,
                'from_day' => $validated['from_day'][$biannual] ?? null,
                'to_day' => $validated['to_day'][$biannual] ?? null,
            ]);
        }

        return redirect()->route('services.index')->with('success', 'Biannual service added successfully.');
    }

    public function storeAnnually(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'annual_names' => 'array',
            'annual_names.*' => 'in:january-december',
            'from_month' => 'array',
            'from_day' => 'array',
            'to_month' => 'array',
            'to_day' => 'array',
        ]);


        $service = Service::create([
            'service_name' => $validated['service_name'],
            'details' => $validated['details'],
            'frequency' => 'annually',
        ]);


        foreach ($validated['annual_names'] as $annual) {
            ServiceOccurrence::create([
                'service_id' => $service->id,
                'frequency_type' => 'annually',
                'annual' => $annual,
                'from_month' => $validated['from_month'][$annual] ?? null,
                'from_day' => $validated['from_day'][$annual] ?? null,
                'to_month' => $validated['to_month'][$annual] ?? null,
                'to_day' => $validated['to_day'][$annual] ?? null,
            ]);
        }

        return redirect()->route('services.index')->with('success', 'Annual service added successfully.');
    }

    public function storeOneTime(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'details' => 'nullable|string',
            'from_day' => 'array',
            'to_day' => 'array',
        ]);

        $service = Service::create([
            'service_name' => $validated['service_name'],
            'details' => $validated['details'],
            'frequency' => 'one-time',
        ]);


        foreach ($validated['from_day'] as $index => $from_day) {
            ServiceOccurrence::create([
                'service_id' => $service->id,
                'frequency_type' => 'one-time',
                'from_day' => $from_day,
                'to_day' => $validated['to_day'][$index] ?? null,
            ]);
        }

        return redirect()->route('services.index')->with('success', 'One-time service added successfully.');
    }
}
