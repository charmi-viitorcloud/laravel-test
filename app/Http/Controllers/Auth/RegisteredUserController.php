<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'firstname' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'lastname' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dob' => ['required'],
            'g-recaptcha-response' => 'recaptcha',//recaptcha validation
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
            'g-recaptcha-response' => 'required|captcha',
        ]);

        // Mail::to("charmi.santoki@viitor.cloud")->send(new TestMail($user));

        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
       


         // return "Email Sent";
    }
}
