<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Models\Discovery;
use App\Contracts\DiscoveryRepositoryInterface;
use App\Http\Controllers\QueueController;

Route::get('/', function () {
    return view('discoveries.index', [
        'discoveries' => App\Models\Discovery::all(),
    ]);
});

Route::get('/search', function (DiscoveryRepositoryInterface $repository) {
    $discoveries = $repository->search((string) request('q'));

    return view('discoveries.index', [
    	'discoveries' => $discoveries,
    ]);
});

Route::get('/queue/add', 'QueueController@add');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/example', function () {
    return view('example.index');
});
