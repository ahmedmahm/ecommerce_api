<?php

namespace App\Http\Controllers\Mail;

use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function sendWelcomeMail(Request $request)
    {
        Mail::to('ahmedmahmoud.1@gmx.de')->send(new Welcome());
        return response()->json(['status' => 'Email Sent'],200);
    }
}
