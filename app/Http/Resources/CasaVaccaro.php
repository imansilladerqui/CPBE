<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CasaVaccaro extends JsonResource
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
            'entidad' => $this->entidad,
            'compra' => $this->compra,
            'venta' => $this->venta,
            'dia' => str_replace("/", "-", $this->dia),
            'hora' => $this->hora
        ];
    }
}
