<?php

namespace App\Http\Controllers;

use App\Models\ReportField;
use App\Models\ReportFilter;
use Illuminate\Http\Request;
use App\Models\Report;

class ReportsController extends Controller
{
    // Show the form for creating a new report

    public function create()
    {
        // Retrieve available fields
        $availableFields = ReportField::all();
        $availableFilters = ReportFilter::all();

        return view('report.create', [
            'availableFields' => $availableFields,
            'availableFilters' => $availableFilters,
        ]);
    }

    // Store a new report
    public function store(Request $request)
    {
        // Create a new report
        $report = new Report([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
        ]);
        $report->save();

        // Add selected fileds to the report
        $selectedFields = $request->input('fields');
        foreach ($selectedFields as $field) {
            $report->fields()->attach($field);
        }

        // Add selected filters to the report
        $selectedFilters = $request->input('filters');
        foreach ($selectedFilters as $filter) {
            $report->filters()->attach($filter);
        }

        // Redirect to the report index page
        return redirect()->route('reports.index')->with('success', 'Report created successfully.');
    }
}
