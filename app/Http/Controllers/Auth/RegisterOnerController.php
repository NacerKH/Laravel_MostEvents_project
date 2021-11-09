<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\Oner;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterOnerController extends Controller
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
    protected $redirectTo = '/home'; //RouteServiceProvider::HOME;

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
        $rules = $this->getRules();
        // dd($rules);
        return Validator::make($data, $rules);
    }
    public function showRegistrationForm()
    {

        return view('auth.register-oner');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'role' => 'oner',

            'adress' => $data['adress'],
            'phone' => $data['phone'],
            'gender' => ($data['gender'] == 'men') ? true : false,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        Oner::create([
            'name' => $data['onername'],
            'subscription_end_date' => Carbon::createFromFormat('Y-m-d H:i:s', now())->addMonths(1)->toDateString(),
            'active' => false,
            'user_id' => $user->id,

        ]);

        return $user;
    }
    public function getRules()
    {
        return $rules = [
            'firstname' => ['required', 'string', 'min:8', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'onername' => ['required', 'max:255'],
            'phone' => ['required', 'digits:8', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
