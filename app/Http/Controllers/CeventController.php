<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cevent;
use App\Models\Event;
use App\Models\Bookt;
use App\Models\Book;
use App\Models\Oner;
use App\Http\Requests\CreatoreventValidation;


use Illuminate\Support\Facades\DB;
use Storage;
use Illuminate\Support\Facades\Auth;

class CeventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('');
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  \App\Models\User  $user ,$id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user,$id)
    {   
        $cevent = Cevent::where('id',$id)->get()->first();
        $event = Event::where('active',true)->get()->first();
        $bookts= Bookt::where('id',$id)->get();
        $books= Book::where('user_id',$id)->inRandomOrder()->paginate(5);
        $oner = Oner::where('active',true)->inRandomOrder()->paginate(5);;
        $bookss= Book::where('oner_id',auth()->user()->id)->inRandomOrder()->paginate(5);
      
      
       
        if (auth()->user()->role === "client"){
            return view('cevent.show',compact('cevent','event'));
        }
        if($cevent->isManager()){
         return view('cevent.show_manager',compact('cevent', 'bookts', 'books','oner','bookss'));}

         return view('cevent.show',compact('cevent','event'));
       
    }

      

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { $cevent = Cevent::where('id',$id)->get()->first();
        return view('cevent.edit',compact('cevent'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatoreventValidation $request, $id)
    { 
      
        $cevent= Cevent::find($id);
        if(!empty($cevent->id)){
            
            // $request->validate([
                
            //     'email' => "required|email|min:5|max:100|unique:cevents,id,".$cevent->id,
            //     'phone' => "required|numeric|min:7",
            //     'adress' => "required",
            //     'picture' => "nullable|mimes:jpg,jpeg,png|image|max:2048"
            // ]);
            if(!empty($request->file('picture'))){
                $path = Storage::putFile('public',$request->file('picture'));
                $url = Storage::url($path);
                $cevent->picture = $url;
            }
            $cevent->ticket = $request->ticket;
            
            $cevent->save();
            $user = User::find(auth()->id());
            $user->email = $request->email;
            $user->firstname = $request->name;
            $user->lastname = $request->namee;
            $user->adress = $request->adress;
            $user->phone = $request->phone;
            $user->save();
        }
      
        return redirect()->back()->with('message','Creator events Update informations Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
