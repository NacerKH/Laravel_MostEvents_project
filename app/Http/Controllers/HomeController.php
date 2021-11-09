<?php

namespace App\Http\Controllers;
use Carbon\Carbon;


use App\Models\Oner;
use App\Models\User;
use App\Models\Event;
use App\Models\Cevent;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

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
        // /   $date=Oner::first();
      
      
   
        
        return view('welcome');
    }
    public function pagehome()
    {
        if(!empty(auth()->user()->id) ){
            $list = Oner::where('active',true)->orderByDesc('id')->paginate(5);
            $listc = Cevent::where('active',true)->orderByDesc('id')->paginate(5);
            $liste = Event::where('active',true)->orderByDesc('id')->paginate(5);
          
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
    public function store(Request $request )
    { 
        $request  =request()->validate([
            'subject'=>'required',
            'email'=>'required|email',
            'message' => 'required',
            'name'=>'required'
        ]);
      
       
          Mail::to('mednaceur199530@gmail.com')->send(new ContactMail($request));
          return response()->json([
            'status' => true,
            'msg' => 'تم الحفظ بنجاح',
           
        ]);

          

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
