<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\EventShops;
use Illuminate\Http\Request;

class EventShopsController extends Controller
{
    public function index(Request $request){
        $wheres = [];
        if ($request->events_id){
            $wheres['events_id'] = $request->events_id;
        }
        $events = Events::all();
        $list = EventShops::where($wheres)->paginate(5);

        return view('eventshops/index',compact('list','events','wheres'));
    }
}
