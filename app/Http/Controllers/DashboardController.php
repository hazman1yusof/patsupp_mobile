<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ticket;
use App\message;
use App\User;
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

        if($user->type == 'agent'){

            $open = ticket::where("assign_to","=",$user->id)
                    ->where("status","=","Open")
                    ->count();

            $answered = ticket::where("assign_to","=",$user->id)
                ->where("status","=","Answered")
                ->count();

            $open_all = ticket::where("status","=","Open")
                    ->count();

            $answered_all = ticket::where("status","=","Answered")
                    ->count();

            $answered2 = message::where("user_id","=",$user->id)->distinct('ticket_id')->count('ticket_id');

            $user_me = User::where('type','=','customer')
                        ->where('status','=','Active')
                        ->where('agent_id','=',$user->id)
                        ->count();

            $user_all = User::where('type','=','customer')
                        ->where('status','=','Active')
                        ->count();

            return view('dashboard',compact('user','open','answered','open_all','answered_all','answered2','user_me','user_all'));

        }else if($user->type == 'customer'){

            $report_by = ticket::where("report_by","=",$user->id)->count();

            $answered = ticket::where("report_by","=",$user->id)->where('status', 'Answered')->count();

            $open = ticket::where("report_by","=",$user->id)->where('status', 'Open')->count();

            $resolved = ticket::where("report_by","=",$user->id)->where('status', 'Resolved')->count();

            $closed = ticket::where("report_by","=",$user->id)->where('status', 'Closed')->count();

            return view('dashboard',compact('user','report_by','answered','open','resolved','closed'));

        }
    }
}
