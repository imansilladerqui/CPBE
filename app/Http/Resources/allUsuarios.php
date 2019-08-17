<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class allUsuarios extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'id' => $this->id, 
            'email'=> $this->email,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
            'roleId' => $this->roles->first()->id,
            'roleName' => $this->roles->first()->name,
        ];
    }
}
