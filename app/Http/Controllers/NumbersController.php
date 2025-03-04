<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumbersRequest;
use App\Jobs\PrimeNumberCheck;
use Illuminate\Support\Facades\Bus;

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
            Bus::dispatch(new PrimeNumberCheck($number));
        }

        return response()->json(['success' => true]);
    }
}
