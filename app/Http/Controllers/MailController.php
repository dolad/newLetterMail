<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendNewsLetter;
use Log;

class MailController extends Controller
{  
    public function index()
    {

        SendNewsLetter::dispatch();
        Log::info('NewLetter Sent ');
        return 'NewsLetter Sent ';
    }
      
}
