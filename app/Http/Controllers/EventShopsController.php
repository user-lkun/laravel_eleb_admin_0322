<?php

namespace App\Http\Controllers;

use App\Models\EventShops;
use Illuminate\Http\Request;

class EventShopsController extends Controller
{
    public function index(){
        $list = EventShops::all();
        return view('eventshops/index',compact('list'));
    }
}
