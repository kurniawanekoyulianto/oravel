<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
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
            'id_departemen' 	=> $this->id_departemen,
            'kode_departemen' 	=> $this->kode_departemen,
            'nama_departemen' 	=> $this->nama_departemen,
            'id_user' 			=> $this->id_user,
            'ip_add' 			=> $this->ip_add,
            'last_update' 		=> $this->last_update,

        ];
    }
}
