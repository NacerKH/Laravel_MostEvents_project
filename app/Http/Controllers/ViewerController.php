<?php

namespace App\Http\Controllers;
use App\Events\VideoViewerPage;

use App\Models\Viewer;
use Illuminate\Http\Request;

class ViewerController extends Controller
{
public function getvedios(){
 
    $viewer= Viewer::first();
    // dd($viewer);
    event( new VideoViewerPage($viewer)); //fire event
 return view('vediosEvents',compact('viewer',$viewer));

}
}
