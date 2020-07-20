<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
   {
       $this->validateLogin($request);

       if ($this->attemptLogin($request)) {
           $user = $this->guard()->user();
           $user->generateToken();

           return response()->json([
               'data' => $user->toArray(),
           ]);
       }

       return $this->redirectTo;
   }

   public function logout(Request $request)
   {
       $user = Auth::guard('api')->user();

       if ($user) {
           $user->api_token = null;
           $user->save();
           return response()->json(['data' => 'User logged out.'], 200)->isRedirect('/home');
       }


   }


}
