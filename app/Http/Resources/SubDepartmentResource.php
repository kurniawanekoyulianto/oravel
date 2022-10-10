<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubDepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        'id_subdepartemen' => $this->id_subdepartemen,
		'kode_subdepartemen' => $this->kode_subdepartemen,
		'nama_subdepartemen' => $this->nama_subdepartemen,
		'id_departemen' => $this->id_departemen,
		'id_user' => $this->id_user,
		'ip_add' => $this->ip_add,
		'last_update' => $this->last_update,
    }
}
