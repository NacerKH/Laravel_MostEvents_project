<?php

namespace App\Http\Controllers\Admin;

use App\Models\Oner;
use App\Models\User;
use App\Models\Cevent;
use App\Models\bookt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onerCount = Oner::where('active',1)->count();
        $ceventCount = Cevent::where('active',1)->count();
        $usersCount = User::count();
        $clientsCount =((int)$usersCount- (int)$onerCount - (int)$ceventCount- 1);
        $reservationac = Bookt::where('validate',1)->count();;
        $reservationre = Bookt::where('validate',0)->count();;
            
       
       
        return view('admin.dashboard' , compact('clientsCount' , 'onerCount' ,'ceventCount','reservationac','reservationre'));
      }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexb()
    {
        $bookac =  Bookt::paginate(5);
        return view('admin.book', compact('bookac'));
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
