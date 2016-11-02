<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
            'first_name'    => array('required','max:255','regex:/(^[A-Za-z0-9 -]+$)+/'),
            'last_name'     => array('required','max:255','regex:/(^[A-Za-z0-9 -]+$)+/'),
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|min:3|confirmed',
            'date_of_birth' => 'required|date|before:today',
            'street_number' => array('required','max:255','regex:/(^[A-Za-z0-9 -]+$)+/'),
            'postalcode'    => array('required','max:10','regex:/(^[A-Za-z0-9 -]+$)+/'),
            'ip_adress'     => 'required|ip',
            'city'          => array('required','max:255','regex:/(^[A-Za-z0-9 -]+$)+/'),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'date_of_birth' => $data['date_of_birth'],
            'street_number' => $data['street_number'],
            'postalcode' => $data['postalcode'],
            'city' => $data['city'],
            'ip_adress' => Request::ip(),
            'isAdmin' => false,
            'password' => bcrypt($data['password']),
        ]);
    }
}
