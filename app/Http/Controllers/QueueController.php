<?php

namespace App\Http\Controllers;

use App\Jobs\ElasticScheduleCrawl;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Log;

class QueueController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
    * Send a reminder e-mail to a given user.
    *
    * @param  Request  $request
    * @param  int  $id
    * @return Response
    */
  public function add()
  {

                  // Add to queue for processing
                  dispatch(new ElasticScheduleCrawl());

                  // Log some info
                  Log::info('[Repositories\CrawlRepository] Dispatched Jobs\ElasticScheduleCrawl');

  }
}
