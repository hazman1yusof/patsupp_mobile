<?php

namespace App\Http\Controllers;

use App\ticket;
use Illuminate\Http\Request;
use DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = DB::table('customers')->get();
        $agents = DB::table('agents')->get();

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
        if(!empty($request->paginate)){
            $paginate = $request->paginate;
        }else{
            $paginate = 20;
        }

        $tickets = $tickets->paginate($paginate);

        return view('ticket',compact('tickets','customers','agents'));
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
     * @param  \App\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(ticket $ticket)
    {
        $customers = DB::table('customers')->get();
        $agents = DB::table('agents')->get();

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
        //
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
}
