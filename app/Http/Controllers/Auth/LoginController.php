<?php

namespace App\Http\Controllers\Auth;
use Session;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    

    protected function redirectTo()
    {
        if(auth()->user()->isAdmin() ){
            return '/admin/';
        }
        return '/home';
    }

    public function login(\Illuminate\Http\Request $request)
        
    { 
     
        
        
        
        $user = User::where('email',$request->identify)->OrWhere('phone',$request->identify)->first();
    //   dd($user);
  
        if( $user === null ){
            return redirect()->back()->with('error','Inscrire, check your email or your phone Number');
        }
        if( $user->role === "oner" && $user->oner()->active == 0){
            return redirect()->back()->with('error','Contacter l\'administrateur pour activer votre compte');
        }
        if( $user->role === "cevent" && $user->cevent()->active == 0){
            return redirect()->back()->with('error','Contacter l\'administrateur pour activer votre compte');
        }
       
        
    
        $this->validateLogin($request);
    
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
    
            return $this->sendLockoutResponse($request);
        }
    
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
    
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
    
        return $this->sendFailedLoginResponse($request);
       
    
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username(){
        
        $value =request()->input('identify');
        // dd($value);
         $field= filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone' ;
         request()->merge([$field => $value]) ;
         return $field;




    }


}
