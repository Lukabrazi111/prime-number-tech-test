<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumbersRequest;
use App\Jobs\PrimeNumberCheck;

class NumbersController extends Controller
{
    /**
     * Receive submitted numbers
     *
     * @param NumbersRequest $request
     */
    public function submitNumbers(NumbersRequest $request)
    {
        // Dispatch job per number
        foreach ($request->input('numbers') as $number) {
            PrimeNumberCheck::dispatch($number);
        }

        return response()->json(['success' => true]);
    }
}
