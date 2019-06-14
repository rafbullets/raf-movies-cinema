<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $a = \App\Movie::create([
        "name"=> "Hello World",
	"description"=> "asdf",
	"length" => 120
    ]);

    dd($a);
})->describe('Display an inspiring quote');
