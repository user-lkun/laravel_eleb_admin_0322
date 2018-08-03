<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[

        ]);
    }
    public function index(Request $request){
        $wheres = [];
        $keywords = [];
        if ($request->username){
            $wheres[] = ['username','like',"%".$request->username.'%'];
            $keywords['username']=$request->username;
        }
        $members = Members::where($wheres)
                    ->paginate(3);
        return view('members/index',compact('members','keywords'));
    }


    public function edit(Members $member,Request $request){
        if (!Auth::user()->can('修改')){
            return view('public');
        }
        DB::update("update members set status = $request->status where id = ?", [$member->id]);
        return redirect(route('members.index'));
    }
    public function show(Members $member){
        return view('members/show',compact('member'));
    }
}
