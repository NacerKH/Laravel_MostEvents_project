<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Oner;
use Session;
class OnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
            $oners = Oner::paginate(5);
            return view('admin.oners.index',compact('oners'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.oners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      {  $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'onerName' => ['required', 'max:255'],
            'phone' => ['required', 'integer', 'min:7'],
            'adress' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'firstname' => $request->get('firstName'),
            'lastname' => $request->get('lastName'),
            'role' => 'oner',
            'phone' => $request->get('phone'),
            'adress' => $request->get('adress'),
            'gender' => ($request->get('gender')=='male')?true:false,
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        Oner::create([
            'name' => $request->get('onerName'),
            'active' => false,
            'user_id' => $user->id,
        ]);
         $user->save();
        }
        return redirect()->back()->with('success', 'Space Oner successfully created!');
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oner = Oner::find($id);
       
        return view("admin.oners.show", compact('oner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Oner::find($id)->delete();
        Toastr::success('Oner was deleted.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function approve($id){
        $oner = Oner::find($id);
        $oner->active = 1;
        $oner->save();
        /* Notification::route('mail',$reservation->email )
            ->notify(new ReservationConfirmed()); */
        //Toastr::success('Reservation successfully confirmed.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
