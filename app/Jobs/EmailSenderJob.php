<?php

namespace App\Jobs;

use App\Mail\RegistrationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailSenderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected array $request = [];
    /**
     * Create a new job instance.
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
//        Log::info("test");

        Mail::to($this->request['email'])
            ->send(new RegistrationMail($this->request));
    }
}
