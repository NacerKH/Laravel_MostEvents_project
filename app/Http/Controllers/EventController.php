<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Storage;
use App\Models\Cevent;

class EventController extends Controller
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
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty(auth()->user()->haveEvent())){
            $event_id = auth()->user()->cevent()->id;
            $request->validate([
                'picture' => 'image|mimes:jpeg,png,jpg|max:2048',
                "name" => "required|string|min:5|max:100",
                "price" => "required|integer|max:100",
                'date' => "required|after_or_equal:now",
                'from' => "nullable|before:to",
                 'to' => "nullable|after:from"
           ]);
            $url = '';
            $event = new Event();
            if (!empty($request->file('picture'))){
                
                $path = Storage::putFile('public',$request->file('picture'));
              
                $url = Storage::url($path);
            }
           
            $event->date = $request->date;
            $event->from = $request->from;
            $event->to = $request->to;
            $event->picture= $url;
            $event->active = ($request->active == "true");
            $event->name = $request->name;
            $event->price = $request->price;
            $event->description = (!empty($request->description))?$request->description:"";
            $event->event_id = $event_id;
            $event->save();
           
            return redirect()->route('CreatorEvents.show',$event_id)->with('success','Item created successfully!');
       }
    //    return redirect()->back();
    
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
    public function edit(Request $request,$id)
    {
        $event = Event::where([
            'id'=> $id,
            'event_id'=> auth()->user()->ceventId()
        ])->first();
        if(!empty($event->id)){
            if (!empty($action = $request->action)){
                if($action == "enable"){
                    $event->active=true;
                }
                if($action == "disable"){
                    $event->active=false;
                }
                $event->save();
                return redirect()->back();
            }
    
            return view('event.edit',compact('event'));
        }
        return abort(500);
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
        $event = Event::find($id);
        if (!empty($request->file('picture'))){
            
            $path = Storage::putFile('public',$request->file('picture'));
            $url = Storage::url($path);
        
            $event->picture=$url;
        }
        $event->name=$request->name;
        $event->price=$request->price;
        $event->description = (!empty($request->description))?$request->description:"";
        $event->save();
      
        return redirect()->route('CreatorEvents.show',$event->event_id)->with('success',"Event Was updated successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event_id = auth()->user()->cevent()->id;
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('CreatorEvents',$event_id);
    }
}
