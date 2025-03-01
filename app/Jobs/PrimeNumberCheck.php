<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class PrimeNumberCheck implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected int $number)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->isPrimeNumber()) {
            Log::channel('prime-number')->info("$this->number: number found at " . now());
        }
    }

    /**
     * Check if number is `Prime` number
     *
     * @return boolean
     */
    private function isPrimeNumber(): bool
    {
        if ($this->number == 1) {
            return false;
        }

        for ($i = 2; $i <= $this->number / 2; $i++) {
            if ($this->number % $i == 0) {
                return false;
            }
        }

        return true;
    }
}
