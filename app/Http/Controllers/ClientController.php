<?php

namespace App\Http\Controllers;
use App\Models\Bookt;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Storage;
use App\Http\Requests\UserValidation;


class ClientController extends Controller
{
   /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
   
    { 
        $users = User::where('id',$id)->get()->first();
        return view('Clientsatuts.index',compact('users'));
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        $event = Event::where('active',true)->get()->first();
        $bookts= Bookt::where('user_id',$id)->inRandomOrder()->paginate(5);
        
        
        return view('client.status',compact('bookts','event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $users = User::where('id',$id)->get()->first();
        return view('client.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserValidation $request, $id)
    
        {
        
            $user= User::find($id);
            if(!empty($user->id)){
                
                // $request->validate([
                //     'firstname' => 'required', 'string', 'min:8','max:255',
                //     'lastname' => 'required', 'string','min:8', 'max:255',
                //     'email' => "required|email|min:5|max:100|unique:users,id,".$user->id,
                //     'phone' => "required|numeric|min:7",
                //     'adress' => "required",
                //     'avatar' => "nullable|mimes:jpg,jpeg,png|image|max:2048"
                // ]);
                if(!empty($request->file('avatar'))){
                    $path = Storage::putFile('public',$request->file('avatar'));
                    $url = Storage::url($path);
                    $user->avatar = $url;
                }
                $user->firstname = $request->firstname;
                $user->lastname = $request->lastname;
                $user->email = $request->email;
                $user->adress = $request->adress;
                $user->phone = $request->phone;
                $user->save();
                return response()->json([
                    'status' => true,
                    'msg' => 'تم  التحديث بنجاح',
                ]);
            }
          
            return redirect()->back()->with('message','Data added Successfully');;
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
