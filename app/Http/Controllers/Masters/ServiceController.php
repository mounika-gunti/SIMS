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
        $service = Service::create([
            'name' => $request->service_name,
            'details' => $request->details,
            'frequency' => $request->frequency_type,
        ]);

        foreach ($request->monthly_type_list as $row) {
            ServiceOccurrence::create([
                'service_id' => $service->id,
                'frequency_type' => $request->frequency_type,
                'month_name' => $row['month_name'],
                'from_day' => $row['from_day'],
                'to_day' => $row['to_day'],
            ]);


            return redirect()->route('services.index')->with('success', 'Monthly services added successfully.');
        }
    }


    public function storeQuarterly(Request $request)
    {
        // dd($request->all());
        $service = Service::create([
            'name' => $request->service_name,
            'details' => $request->details,
            'frequency' => $request->frequency_type,
        ]);

        foreach ($request->quarterly_type_list as $row) {
            ServiceOccurrence::create([
                'service_id' => $service->id,
                'frequency_type' => $request->frequency_type,
                'quarter_name' => $row['quarter_name'],
                'from_month' => $row['from_month'],
                'from_day' => $row['from_day'],
                'to_day' => $row['to_day'],
                'to_month' => $row['to_month'],
            ]);
        }

        return redirect()->route('services.index')->with('success', 'Quarterly services added successfully.');
    }

    public function storeBiannually(Request $request)
    {
        // dd($request->all());
        $service = Service::create([
            'name' => $request->service_name,
            'details' => $request->details,
            'frequency' => $request->frequency_type,
        ]);

        foreach ($request->biannual_type_list as $row) {
            ServiceOccurrence::create([
                'service_id' => $service->id,
                'frequency_type' => $request->frequency_type,
                'biannual_name' => $row['biannual_name'],
                'from_month' => $row['from_month'],
                'from_day' => $row['from_day'],
                'to_day' => $row['to_day'],
                'to_month' => $row['to_month'],
            ]);
        }

        return redirect()->route('services.index')->with('success', 'Quarterly services added successfully.');
    }


    public function storeAnnually(Request $request)
    {
        dd($request->all());
        $service = Service::create([
            'name' => $request->service_name,
            'details' => $request->details,
            'frequency' => $request->frequency_type,
        ]);

        foreach ($request->annual_type_list as $row) {
            ServiceOccurrence::create([
                'service_id' => $service->id,
                'frequency_type' => $request->frequency_type,
                'from_month' => $row['from_month'],
                'from_day' => $row['from_day'],
                'to_day' => $row['to_day'],
                'to_month' => $row['to_month'],
            ]);
        }

        return redirect()->route('services.index')->with('success', 'Quarterly services added successfully.');
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
