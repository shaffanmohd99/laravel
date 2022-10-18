<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    { 
        // dd(User::where('id',$this->assign_user_id)->value('name'));
        return[
            'ticket_id'=>$this->id,
            'created by'=>$this->user->name,
            'assigned_to'=>User::where('id',$this->assign_user_id)->value('name'),
            'title'=>$this->title,
            'description'=>$this->description,
            'priority_level'=>$this->priorityLevel->level,
            'status_type'=>$this->status->type,
		    'category'=>$this->categories->category_type,

        ];
    }
}
