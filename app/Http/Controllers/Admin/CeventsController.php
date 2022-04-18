<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use App\Models\Cevent;
use App\Models\Event;
use Illuminate\Support\Facades\Hash;
use Session;


class CeventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cevents = Cevent::paginate(5);
            return view('admin.cevent.index',compact('cevents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cevent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            
            'phone' => ['required', 'integer', 'min:7'],
            'adress' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'firstname' => $request->get('firstName'),
            'lastname' => $request->get('lastName'),
            'role' => 'cevent',
            'phone' => $request->get('Phone'),
            'adress' => $request->get('Adress'),
            'gender' => ($request->get('gender')=='male')?true:false,
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        Cevent::create([
            'cevent_id' => $user->id,
            'active' => false,
                           ]);
        $user->save();
        }
        return redirect()->back()->with('success', 'CreatorEvent  successfully created! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cevent = Cevent::find($id);
        $ceventPost = $cevent->post();
        return view("admin.cevent.show", compact('cevent' ,'ceventPost' ));
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
        Cevent::find($id)->delete();
        Toastr::success(' Creato Event was deleted.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function approve($id){
        $cevent = Cevent::find($id);
        $cevent->active = 1;
        $cevent->save();
        /* Notification::route('mail',$reservation->email )
            ->notify(new ReservationConfirmed()); */
        //Toastr::success('Reservation successfully confirmed.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

}
