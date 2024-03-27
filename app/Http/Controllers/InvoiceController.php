<?php

namespace App\Http\Controllers;

use App\Invoices;
use App\Http\Controllers\Quote;

class InvoiceController extends Controller
{
    public function convert(Quote $quote)
    {
        // Fetch the necessary data from the quote

        // Create a new invoice
        $invoice = new Invoice();
        $invoice->quote_id = $quote->id;

        // Assign other invoice attributes

        // Save the invoice
        $invoice->save();

        return response()->json(['message' => 'Invoice created successfully']);
    }
}
