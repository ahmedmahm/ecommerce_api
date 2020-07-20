<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class RegisterController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return \Illuminate\Support\Facades\Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function register(Request $request)
    {
       // Here the request is validated. The validator method is located
       // inside the RegisterController, and makes sure the name, email
       // password and password_confirmation fields are required.
       $this->validator($request->all())->validate();

       // A Registered event is created and will trigger any relevant
       // observers, such as sending a confirmation email or any
       // code that needs to be run as soon as the user is created.
       event(new Registered($user = $this->create($request->all())));

       // After the user is created, he's logged in.
       $this->guard()->login($user);

       // And finally this is the hook that we want. If there is no
       // registered() method or it returns null, redirect him to
       // some other URL. In our case, we just need to implement
       // that method to return the correct response.
       return $this->registered($request, $user)
           ?: redirect($this->redirectPath());
   }

   protected function registered(Request $request, $user)
   {
       $user->generateToken();

       return $this->redirectTo;
   }
}
