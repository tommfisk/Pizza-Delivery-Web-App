<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:32',
            'phone' => 'required|digits:11',
            'email' => 'required|email',
            'postcode' => 'required|size:7',
            'password' => 'required|min:8'
        ], [
            'firstname.required' => 'Please input your first name',
            'firstname.max' => 'First name must be 32 characters or lower',
            'phone.required' => 'Please input your phone number',
            'phone.digits' => 'Phone number must be valid',
            'email.required' => 'Please input your email address',
            'email.email' => 'Email must be valid',
            'postcode.required' => 'Please input your postcode',
            'postcode.size' => 'Postcode must be valid (no spaces)',
            'password.required' => 'Please input a password',
            'password.min' => 'Password must be 8 characters or higher'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'postcode' => $data['postcode'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
