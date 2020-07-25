<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use http\Env\Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api',['except' => ['verify']]);
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function resend(Request $request)
    {
        if($request->user()->hasVerifiedEmail()){
            return response()->json([
                'message' => 'Already Verified'
            ]);
        }

        $request->user()->SendEmailVerificationNotification();

        if($request->wantsJson()){
            return response()->json([
                'message' => 'EmailSent'
            ]);
        }
    }

    /**
     * @param Request $request
     * @throws AuthenticationException
     */
    public function verify(Request $request)
    {

     /*   auth()->attempt($request->route('id'));
        if($request->route('id') != $request->user()->getKey()){
            throw new AuthenticationException;
        }*/

        if($request->user()->hasVerifiedEmail()){
            return response()->json([
                'message' => 'Already Verified'
            ]);
        }

        if($request->user()->markEmailAsVerified()){
            event(new Verified($request->user()));
        }
        return response()->json([
            'message' => 'Successfully Verified'
        ]);
    }
}
