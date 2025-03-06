<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumbersRequest;
use App\Jobs\ChunkNumbers;
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
        Bus::dispatch(new ChunkNumbers($request->input('numbers')));

        return response()->json(['success' => true]);
    }
}
