<?php

namespace App\Http\Controllers;
use App\Models\Bookt;
use App\Models\Oner;
use App\Models\User;
use App\Models\Event;
use App\Models\Cevent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BookingtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        //dd($request->all());
        $request->validate([
        'nb_ticket' => "required|integer",
        
                         ]);
            $bookingt = new Bookt();
            $bookingt->user_id = auth()->id();
            $bookingt->cevent_id = $request->cevent_id;
            $bookingt->note = $request->note;
            $bookingt->nameevent = $request->nameevent;
            $bookingt->nb_ticket = $request->nb_ticket;
          $totall = Event::Where('id',$request->nameevent)->first();
           $t= $totall->price;
            
             
            //  $totale=$totall;
            
            
            $totall =( ($request->nb_ticket)*$t);
            $bookingt->total =$totall;
            $bookingt->save();
      
       return redirect()->back();

    }

  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function approve($id){
        $bookt = Bookt::find($id);
        $bookt->validate = 1;
        $bookt->save();
       
        return redirect()->back();
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cevent_id = auth()->user()->id;
        $booking = Bookt::find($id);
        $booking->delete();
        return redirect()->back();
    }
}
