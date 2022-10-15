<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MesinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id_mesin' 			=> $this->id_mesin,
            'kode_mesin' 		=> $this->kode_mesin,
            'nama_mesin' 		=> $this->nama_mesin,
            'id_departemen' 	=> $this->id_departemen,
            'id_subdepartemen' 	=> $this->id_subdepartemen,
            'id_user' 			=> $this->id_user,
            'ip_add' 			=> $this->ip_add,
            'last_update' 		=> $this->last_update,
        ];
    }
}
