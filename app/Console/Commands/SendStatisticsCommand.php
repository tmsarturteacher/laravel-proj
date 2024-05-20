<?php

namespace App\Console\Commands;

use App\Mail\RegistrationMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendStatisticsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statistic:send-on-email {userId} {email?} {user=yes} {--withSendEmail}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command send users statistic on Admin email';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $user = "";
        if ($this->argument('email')) {
            $user = User::where('email', $this->argument('email'))->first();
        } else {
            $user = User::find($this->argument('userId'));
        }

        try {

            if ($this->option('withSendEmail')) {
                Mail::to($user['email'])->send(new RegistrationMail($user->toArray()));

                $this->info("Email has been sent");
            } else {
                $this->info(json_encode($user));
            }
        } catch (\Exception $e) {
            $this->error("Error: ". $e->getMessage());
        }

//        dd($this->arguments());
//        Log::info(json_encode($user));
    }
}
