<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // dd($this->role);
        return [
            'id'=>$this->id,
            "name"=>$this->name,
            "email"=>$this->email,
            "role"=>$this->roles->role
            // "role"=>$this->roles
            // "role"=>$this->roles->role
        ];
    }
}
