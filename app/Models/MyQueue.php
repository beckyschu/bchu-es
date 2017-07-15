<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyQueue extends Model
{

    public function fire($job, $data){
      $query = DB::insert('INSERT INTO myqueue (timestamp) VALUES(NOW())');

      $job->delete();
    }
}
