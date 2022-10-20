<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\PriorityLevel;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTicketController extends Controller
{
    //
    public function index()
    {
        //
        // dd(Auth::user()->role_id==1);
        // dd(Ticket::all());
        // if(Auth::user()->role_id=="1"){
        //    dd(Ticket::where('assign_user_id',Auth::user()->id)->get());
            
            $data=Ticket::where('assign_user_id',Auth::user()->id)->get();
            // return TicketResource::collection($data);
            return response()->json(TicketResource::collection($data));
            // return response()->json($data);
        // }
        // $data=Auth::user()->tickets;
        // abort(403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        // $ticket=Ticket::create($request->all());
        // dd(Auth::user()->tickets()); 
        // if(Auth::user()->role_id=="1"){
            // $ticket=Auth::user()->tickets()->create($request->all());
            // return new TicketResource($ticket);

        // }


        // $ticket = $request->validate([
        //     'user_id' => 'required',
        //     'title' => 'required|string',
        //     'description' => 'required|string',
        //     'priority_level_id'=>'required',
        //     'status_type_id' => 'required',
        //     'category_id' => 'required',
        // ]);
        
        // $ticket=Ticket::create([    
        //     'user_id' => $ticket['user_id'],
        //     'title' => $ticket['title'],
        //     'description' => $ticket['description'],
        //     'priority_level_id'=>$ticket['priority_level_id'],
        //     'status_type_id' => $ticket['status_type_id'],
        //     'category_id' => $ticket['category_id'],
        // ]);
    
        // return response()->json($ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
        // return Ticket::findOrFail($id);
        if($ticket->user_id==Auth::id()){
            return new TicketResource($ticket);
        }
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request,Ticket $ticket )
    {
        //
    //     $user=Ticket::findOrFail($id);
    // // // update hte info given in payload to that teacher
    // $user->update($request->all());
    // // // return updated teacher info
    // return $user;

    if($ticket->user_id==Auth::id()){
        $ticket->update($request->all());
    }
    return new TicketResource($ticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
        // Ticket::findOrFail($id)->delete();
        // return response("Delete Ticket: ".$id,204);
        if($ticket->user_id==Auth::id()){
            $ticket->delete();
            return response()->json(null,204);
            }
            abort(403);
        }
    
}
