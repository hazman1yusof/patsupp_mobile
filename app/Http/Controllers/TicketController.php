<?php

namespace App\Http\Controllers;

use App\ticket;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;
use Auth;
use App\message;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = DB::table('users')->where('type','=','customer')->get();
        $agents = DB::table('users')->where('type','=','agent')->get();
        $user = Auth::user();

        $tickets = new ticket;

        if(!empty($request->title)){
            $tickets = $tickets->where('title','like','%'.$request->title.'%');
        }
        if(!empty($request->report_by)){
            $tickets = $tickets->Where(function($query) use ($request){
                foreach (explode(",", $request->report_by) as $key => $value) {
                    $query = $query->orWhere('report_by','like',$value);
                }
            });
        }
        if(!empty($request->assign_to)){
            $tickets = $tickets->Where(function($query) use ($request){
                foreach (explode(",", $request->assign_to) as $key => $value) {
                    $query = $query->orWhere('assign_to','like',$value);
                }
            });
        }
        if(!empty($request->created_by)){
            $tickets = $tickets->where('created_by','like','%'.$request->created_by.'%');
        }
        if(!empty($request->status)){
            $tickets = $tickets->Where(function($query) use ($request){
                foreach (explode(",", $request->status) as $key => $value) {
                    $query = $query->orWhere('status','like',$value);
                }
            });
        }
        if(!empty($request->priority)){
            $tickets = $tickets->Where(function($query) use ($request){
                foreach (explode(",", $request->priority) as $key => $value) {
                    $query = $query->orWhere('priority','like',$value);
                }
            });
        }
        if(!empty($request->category)){
            $tickets = $tickets->Where(function($query) use ($request){
                foreach (explode(",", $request->category) as $key => $value) {
                    $query = $query->orWhere('category','like',$value);
                }
            });
        }
        if(!empty($request->date_from) && !empty($request->date_to)){
            $tickets = $tickets->whereBetween('created_at', [$request->date_from, $request->date_to]);
        }

        if($user->type=='customer'){
            $tickets = $tickets->where('report_by','=',$user->id);
        }

        $tickets = $tickets->orderBy('id', 'desc');

        if(!empty($request->paginate)){
            $paginate = $request->paginate;
        }else{
            $paginate = 20;
        }

        $tickets = $tickets->paginate($paginate);

        $tickets->appends(Input::except('page'))->links();

        // dd($tickets);

        return view('ticket',compact('tickets','customers','agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $customers = DB::table('users')->where('type','=','customer')->get();
        $agents = DB::table('users')->where('type','=','agent')->get();
        return view('ticket_create',compact('agents','customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $report_validate = (Auth::user()->type=='agent') ? 'required':'';

        ////validate ticket
        $validatedData = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'priority' => 'required',
            'description' => 'required|min:15',
            'assign_to' => 'required',
            'created_by' => 'required',
            'report_by' => $report_validate
        ]);

        ////create new ticket
        $message = new ticket;

        $message->title = $request->title;
        $message->category = $request->category;
        $message->priority = $request->priority;
        $message->description = $request->description;
        $message->assign_to = $request->assign_to;
        $message->created_by = $request->created_by;
        $message->status = "Open";
        $message->report_by = (Auth::user()->type=='customer') ? Auth::id() : $request->report_by;

        $message->save();

        return redirect()->route('ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(ticket $ticket)
    {
        if(Auth::user()->type=='customer' && Auth::id() != $ticket->report_by){
            return redirect()->back();
        }

        $customers = DB::table('users')->where('type','=','customer')->get();
        $agents = DB::table('users')->where('type','=','agent')->get();

        return view('ticket_detail',compact('ticket','customers','agents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ticket $ticket)
    {
        if(!empty($request->text)){
            $ticket->description = $request->text;
            $ticket->updflg = '1';
        }
        if(!empty($request->status)){
            $ticket->assign_to = $request->assign_to;
            $ticket->status = $request->status;
            $ticket->priority = $request->priority;
            $ticket->category = $request->category;
        }

        $ticket->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(ticket $ticket)
    {
        //
    }

    public function answer(User $user)
    {

        $customers = DB::table('users')->where('type','=','customer')->get();
        $agents = DB::table('users')->where('type','=','agent')->get();

        $answer = message::where("user_id","=",$user->id)->distinct('ticket_id')->pluck("ticket_id");
        $tickets = ticket::whereIn('id', $answer)->paginate();

        return view('ticket',compact('tickets','customers','agents'));
    }
}
