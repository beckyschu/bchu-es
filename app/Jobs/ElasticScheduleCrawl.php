<?php

namespace App\Jobs;

use App\Models;
use Illuminate\Support\Facades\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ElasticScheduleCrawl implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Models\Discovery $discovery)
    {
        //
            $this->onQueue('discovery');

            $this->discovery = $discovery;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

          // This crawl should not be run for some reason (probably been cancelled)
          // if (! $this->discovery->shouldRun()) return;

              // Log some info
              //Log::info('[Jobs\ElasticScheduleCrawl] [Crawl '.$this->discovery->url.'] Running command ');
              Log::info('[Jobs\ElasticScheduleCrawl] [PROCESSING JOB] Running command ');
    }
}
