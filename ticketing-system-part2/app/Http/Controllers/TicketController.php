<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd(Auth::user()->roles->role);
        if(Auth::user()->roles->role=='admin'){
            $data=Ticket::all();
            // return TicketResource::collection($data);
            return response()->json(TicketResource::collection($data));
        }
        // $data=Auth::user()->tickets;
        abort(403);
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
    public function store(StoreTicketRequest $request)
    {
        // dd($request->all());
            // dd(Auth::user()->tickets()->create($request->all()));
            if(Auth::user()->roles->role=='admin'){
                $ticket=Auth::user()->tickets()->create($request->all());
                return new TicketResource($ticket);
                
            }
        //  return response()->json($ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // if(Auth::user()->roles->role=='admin'){
            $ticket=Ticket::findOrFail($id);
            return new TicketResource($ticket) ;
        // }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request,$id)
    { 
       
        //
        if(Auth::user()->roles->role=='admin'){
        $user=Ticket::findOrFail($id);
        // // update hte info given in payload to that teacher
        $user->update($request->all());
        // // return updated teacher info
        return new TicketResource($user) ;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Auth::user()->roles->role=='admin'){
            Ticket::findOrFail($id)->delete();
            return response("Delete Ticket: ".$id,204);
            
        }
        abort(403);
    }
}
