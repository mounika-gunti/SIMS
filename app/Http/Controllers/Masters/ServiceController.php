<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceOccurence;
use App\Http\Requests\ServiceRequest;
use Illuminate\Http\RedirectResponse;


class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('masters.services.index', compact('services'));
    }

    public function create()
    {
        return view('masters.services.create');
    }

    public function show($id)
    {
        $service = Service::with('serviceOccurences')->findOrFail($id);
        return view('masters.services.view', compact('service'));
    }

    public function edit($id)
    {
        $service = Service::with('serviceOccurences')->findOrFail($id);

        $occurences = [
            'monthly' => $service->serviceOccurences->where('frequency_type', 'monthly')->map(function ($item) {
                return [
                    'month_name' => $item->month_name,
                    'from_day' => $item->from_day,
                    'to_day' => $item->to_day,
                ];
            })->keyBy('month_name')->toArray(),
            'quarterly' => $service->serviceOccurences->where('frequency_type', 'quarterly')->map(function ($item) {
                return [
                    'quarter_name' => $item->quarter_name,
                    'from_month' => $item->from_month,
                    'to_month' => $item->to_month,
                ];
            })->keyBy('quarter_name')->toArray(),
            'biannual' => $service->serviceOccurences->where('frequency_type', 'biannual')->map(function ($item) {
                return [
                    'biannual_name' => $item->biannual_name,
                    'from_date' => $item->from_date,
                    'to_date' => $item->to_date,
                ];
            })->keyBy('biannual_name')->toArray(),
        ];

        return view('masters.services.edit', compact('service', 'occurences'));
    }


    public function storeMonthly(Request $request)
    {
        $service = Service::create([
            'name' => $request->service_name,
            'details' => $request->details,
            'frequency' => $request->frequency_type,
        ]);

        foreach ($request->monthly_type_list as $row) {
            ServiceOccurence::create([
                'service_id' => $service->id,
                'frequency_type' => $request->frequency_type,
                'month_name' => $row['month_name'],
                'from_day' => $row['from_day'],
                'to_day' => $row['to_day'],
            ]);
        }

        return redirect()->route('services.index')->with('success', 'Monthly services added successfully.');
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
            ServiceOccurence::create([
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
            ServiceOccurence::create([
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
        // dd($request->all());
        $service = Service::create([
            'name' => $request->service_name,
            'details' => $request->details,
            'frequency' => $request->frequency_type,
        ]);

        foreach ($request->annually_type_list as $row) {
            ServiceOccurence::create([
                'service_id' => $service->id,
                'frequency_type' => $request->frequency_type,
                'from_month' => $row['from_month'],
                'from_day' => $row['from_day'],
                'to_day' => $row['to_day'],
                'to_month' => $row['to_month'],
            ]);
        }

        return redirect()->route('services.index')->with('success', 'Annually services added successfully.');
    }


    public function storeOneTime(Request $request)
    {
        // dd($request->all());
        $service = Service::create([
            'name' => $request->service_name,
            'details' => $request->details,
            'frequency' => $request->frequency_type,
        ]);

        foreach ($request->onetime_type_list as $row) {
            ServiceOccurence::create([
                'service_id' => $service->id,
                'frequency_type' => $request->frequency_type,
                'from_date' => $row['from_date'],
                'to_date' => $row['to_date'],
            ]);
        }
        return redirect()->route('services.index')->with('success', 'Quarterly services added successfully.');
    }
}
