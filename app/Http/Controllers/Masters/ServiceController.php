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
        return view('masters.service.view');
    }

    public function edit()
    {
        return view('masters.services.edit');
    }

    public function store(ServiceRequest $request): RedirectResponse
    {


        dd($request->all());
        $validated = $request->validated();

        $service = Service::create([
            'name' => $validated['service_name'],
            'details' => $validated['details'],
            'frequency' => $validated['frequency'],
        ]);

        ServiceOccurrence::create([
            'service_id' => $service->id,
            'frequency_type' => $validated['frequency'],
            'month_name' => $validated['month_name'] ?? null,
            'quarter_name' => $validated['quarter_name'] ?? null,
            'biannual_name' => $validated['biannual_name'] ?? null,
            'from_day' => $validated['from_day'] ?? null,
            'to_day' => $validated['to_day'] ?? null,
            'from_month' => $validated['from_month'] ?? null,
            'to_month' => $validated['to_month'] ?? null,
        ]);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }
}