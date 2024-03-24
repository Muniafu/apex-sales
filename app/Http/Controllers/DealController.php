<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Deal;

class DealController extends Controller
{
    // Add a new deal
    public function create(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validated([
            'account_id' => 'required|integer',
            'contact_id' => 'required|integer',
            'stage' => 'required|string',
            'closed_date' => 'required|date',
            'value' => 'required|numeric',
            'probability' => 'required|numeric',
        ]);

        // Create a new deal
        $deal = Deal::create($validatedData);

        // return a response indicating success or failure

        // Redirect to a specific page
    }

    // Update an existing deal
    public function update(request $request, $id)
    {
        // Find the deal by its ID
        $deal = Deal::findOrFail($id);

        // Validate the input data
        $validatedData = $request->validate([
            'stage' => 'required|string',
        ]);

        // Update the deal's stage
        $deal->stage = $validatedData['stage'];
        $deal->save();

        // Return response indicating success or failure

        // Redirect to a specific page
    }

    // Filter and view deals by stage, sales representative and account
    public function filterBy(request $request)
    {
        // Retrieve the input parameters
        $stage = $request->input('stage');
        $salesRep = $request->input('sales_rep');
        $account = $request->input('account');

        // Query the deals based on the input parameters
        $deals = Deal::when($stage, function ($query) use ($stage){
            return $query->where('stage', $stage);
        })
        ->when($salesRep, function ($query) use ($salesRep) {
            return $query->where('sales_rep', $salesRep);
        })
        ->when($account, function ($query) use ($account) {
            return $query->where('account', $account);
        })
        ->get();

        // Return the filtered deals as a response

        // Render a view
    }

    // Generate reports on deals by stage within specified data ranges 
    public function generateReport(Request $request)
    {
        // Retrieve the input parameters
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Query the deals within the specified data range and group them by stage
        $reportDate = Deal::whereBetween('closing_date', [$startDate, $endDate])
        ->groupBy('stage')
        ->select('stage', DB::raw('COUNT(*) as deal_count'))
        ->get();

        // Return the report data as a response

        //render a view
    }
}
