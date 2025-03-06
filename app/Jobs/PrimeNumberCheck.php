<?php

namespace App\Jobs;

use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class PrimeNumberCheck implements ShouldQueue
{
    use Queueable, Batchable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected array $numbers)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->numbers as $number) {
            if ($this->isPrimeNumber($number)) {
                Log::channel('prime-number')->info("$number: number found at " . now());
            }
        }
    }

    /**
     * Check if number is `Prime` number
     *
     * @return boolean
     */
    private function isPrimeNumber(int $number): bool
    {
        if ($number == 1) {
            return false;
        }

        for ($i = 2; $i <= $number / 2; $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }

        return true;
    }
}
