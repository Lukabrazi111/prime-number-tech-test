<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Bus;

class ChunkNumbers implements ShouldQueue
{
    use Queueable;

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
        $numberChunks = array_chunk($this->numbers, 20);

        $processedChunks = collect($numberChunks)->map(function ($nums) {
            return new PrimeNumberCheck($nums);
        });

        Bus::batch($processedChunks)->dispatch();
    }
}
