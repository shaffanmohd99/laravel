<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Http\Resources\UserResource;
use App\Models\Categories;
use App\Models\Category;
use App\Models\PriorityLevel;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class LookupController extends Controller
{
    //
    public function getAllUser()
    {
        //
        
            $data=User::all();
            return response()->json(UserResource::collection($data));
    }
     
    public function getAllTicket()
    {
        
        $data=Ticket::all();
        return response()->json(TicketResource::collection($data));
    }
    public function getAllCategory()
    {
        
        $data=Categories::all();
        return response()->json($data);
    }
    public function getAllStatus()
    {
        
        $data=Status::all();
        return response()->json($data);
    }
    public function getAllPriority()
    {
        
        $data=PriorityLevel::all();
        return response()->json($data);
    }
    
}
