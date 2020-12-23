<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsLetterMail;
use Log;

class SendNewsLetter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Redis::throttle('any_key')->allow(5)->every(30)->then(function () {
        $recipient = 'adavidoladele@gmail.com';
		Mail::to($recipient)->send(new NewsLetterMail());
        Log::info('NewsLetters');
        throw new \Exception("I am throwing this exception", 1);
        }, function () {
            return $this->release(2);
        });
    }
}
