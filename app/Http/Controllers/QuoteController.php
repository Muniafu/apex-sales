<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function store(Deal $deal)
    {
        // Retrieve necessary data from the
        $quote = $deal->quotes()->create();
        return $quote;
    }
}
