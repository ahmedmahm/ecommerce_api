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
        $name = $request['name'];
        $email = $request['email'];
        $user = new User();
        Mail::to($email)->send(new Welcome($name));
        return response()->json(['status' => 'Email Sent'],200);
    }
}
