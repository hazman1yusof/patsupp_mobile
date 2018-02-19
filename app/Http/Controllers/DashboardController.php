<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ticket;
use App\message;
use Auth;

class DashboardController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {   
        $user = Auth::user();

        $assign = ticket::where("assign_to","=",$user->id)->count();

        $attention = ticket::where("assign_to","=",$user->id)
            ->where("priority","=","Urgent")
            ->whereIn('status', ['Open','Answered'])
            ->count();

        $open = ticket::where("assign_to","=",$user->id)->whereIn('status', ['Open','Answered'])->count();

        $answer = message::where("user_id","=",$user->id)->distinct('ticket_id')->count();

        $created = ticket::where("created_by","=",$user->username)->count();

        return view('dashboard',compact('user','assign','attention','answer','open','created'));
    }
}
