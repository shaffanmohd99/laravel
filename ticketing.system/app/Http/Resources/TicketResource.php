<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\PriorityLevel;
use App\Models\StatusType;
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
        // dd($this->user->id);
        // return parent::toArray($request);
        // dd(PriorityLevel::select('level')->where('id',$this->priority_level_id)->first());
        return[
            'ticket_id'=>$this->id,
            'user_id'=>optional($this->user)->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'priority_level'=>$this->priorityLevel->level,
            'status_type'=>$this->statusType->type,
		    'category'=>$this->category->category_type,

        ];
    }
}
