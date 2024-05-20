<?php

namespace App\Http\Controllers;

use App\Events\UserEvent;
use App\Jobs\EmailSenderJob;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        EmailSenderJob::dispatch();
//        UserEvent::dispatch();

        return view('jobs.index');
    }
}
