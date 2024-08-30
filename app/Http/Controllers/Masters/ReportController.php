<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\Service;
use App\Models\WorkStatus;
use App\Exports\ReportsExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function completed(Request $request)
    {
        $currentYear = Carbon::now()->year;
        $startYear = $currentYear - 5;
        $endYear = $currentYear + 5;
        $years = range($startYear, $endYear);

        $services = Service::all();

        $query = WorkStatus::with(['service', 'customer', 'employee'])
            ->where('status', 'done');

        if ($request->filled('year')) {
            $query->whereYear('from_date', $request->year);
        }

        if ($request->filled('month')) {
            $month = array_search($request->month, [
                'january' => 1,
                'february' => 2,
                'march' => 3,
                'april' => 4,
                'may' => 5,
                'june' => 6,
                'july' => 7,
                'august' => 8,
                'september' => 9,
                'october' => 10,
                'november' => 11,
                'december' => 12,
            ]);

            if ($month !== false) {
                $query->whereMonth('from_date', $month);
            }
        }

        if ($request->filled('service_name')) {
            $query->where('service_id', $request->service_name);
        }


        $reports = $query->get()->map(function ($report) {
            $report->from_date = $report->from_date ? Carbon::parse($report->from_date) : null;
            $report->action_on = $report->action_on ? Carbon::parse($report->action_on) : null;
            return $report;
        });

        return view('masters.reports.completed', compact('years', 'services', 'reports'));
    }

    public function non_completed(Request $request)
    {
        $currentYear = Carbon::now()->year;
        $startYear = $currentYear - 5;
        $endYear = $currentYear + 5;
        $years = range($startYear, $endYear);

        $services = Service::all();

        $query = WorkStatus::with(['service', 'customer', 'employee'])
            ->whereIn('status', ['not_done', 'created']);

        if ($request->filled('year')) {
            $query->whereYear('from_date', $request->year);
        }

        if ($request->filled('month')) {
            $month = array_search($request->month, [
                'january' => 1,
                'february' => 2,
                'march' => 3,
                'april' => 4,
                'may' => 5,
                'june' => 6,
                'july' => 7,
                'august' => 8,
                'september' => 9,
                'october' => 10,
                'november' => 11,
                'december' => 12,
            ]);

            if ($month !== false) {
                $query->whereMonth('from_date', $month);
            }
        }

        if ($request->filled('service_name')) {
            $query->where('service_id', $request->service_name);
        }

        $reports = $query->get()->map(function ($report) {
            $report->from_date = $report->from_date ? Carbon::parse($report->from_date) : null;
            $report->action_on = $report->action_on ? Carbon::parse($report->action_on) : null;
            return $report;
        });

        return view('masters.reports.non_completed', compact('years', 'services', 'reports'));
    }

    public function export()
    {
        return Excel::download(new ReportsExport, 'reports.xlsx');
    }
}