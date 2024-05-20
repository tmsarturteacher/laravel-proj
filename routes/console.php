<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

//Artisan::command('statistic:send-on-email 1 --withSendEmail', function () {
//    $this->info("run statistic:send-on-email command");
//})->everyMinute();
