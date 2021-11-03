<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


use App\Models\Oner;
use App\Models\Cevent;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('welcome');
    }
    public function pagehome()
    {
        if(!empty(auth()->user()->id) ){
            $list = Oner::where('active',true)->inRandomOrder()->paginate(5);
            $listc = Cevent::where('active',true)->inRandomOrder()->paginate(5);
            $liste = Event::where('active',true)->inRandomOrder()->paginate(5);
          
       return view('app.home',compact('list','listc','liste'));
        }  
        
    }
  
    public function Contact()
    {
        
        return view('contact');
    }  public function speaker()
    {
        
        return view('speaker');
    }
    public function pay($id)
      
    {  
        $user=User::where('id',$id)->first();
        
        return view('payment',compact('user'));
    }
    public function store()
    { 
        $data =request()->validate([
            'subject'=>'required',
            'email'=>'required|email',
            'message' => 'required',
            'name'=>'required'
        ]);
      
       
          Mail::to('mednaceur199530@gmail.com')->send(new ContactMail($data));

     return  redirect()->back()->with('success', 'Votre email a été envoyer avec succees!');
    }
    
    public function search(){

        request()->validate([
            'q' => 'required|min:3'
        ]);

        $q = request()->input('q');

        $oner = Oner::where('name', 'like', "%$q%")
                ->get();
        $items = Event::where('name', 'like', "%$q%")
                ->orWhere('description', 'like', "%$q%")
                ->get();
        return view('app.search-results', compact ('oner', 'items'));
    }
    

}
