<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Oner;
use App\Models\User;
use App\Models\Cevent;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BookValidation;


class BookController extends Controller
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
    public function store(BookValidation $request)
    {
        // $request->validate([
        //     'nb_person' => "required|integer",
        //     'date' => "required|after_or_equal:date",
        //    'from' => "nullable|before:to",
        //     'to' => "nullable|after:from"
        // ]);
            $booking = new Book();
            $booking->oner_id = auth()->id();
            $booking->user_id = $request->user_id;
            $booking->date = $request->date;
            $booking->note = $request->note;
            $booking->from = $request->from;
            $booking->to = $request->to;
            $booking->nb_person = $request->nb_person;
            
            $booking->save();
      
            return redirect()->back()->with('message','Reservation successfully sended');

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
    public function approve($id){
        $book = Book::find($id);
        $book->validate = 1;
        $book->save();
        /* Notification::route('mail',$reservation->email )
            ->notify(new ReservationConfirmed()); */
        //Toastr::success('Reservation successfully confirmed.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back()->with('message','Reservation successfully confirmed');
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
    public function destroy(Request $request)
    {
        $oner_id = auth()->user()->oner()->id;
        $booking = Book::find($request->id);
        $booking->delete();
        return response()->json([
            'status' => true,
            'msg' => 'تم الحذف بنجاح',
            'id' =>  $request -> id
        ]);
        return redirect()->route('oner.show',$oner_id)->with('message','Reservation deleted Successfully');;
    }
}
