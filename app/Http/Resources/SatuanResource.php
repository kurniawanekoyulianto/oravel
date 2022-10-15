<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SatuanResource extends JsonResource
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
            'id_satuan' 		=> $this->id_satuan,
            'kode_satuan' 		=> $this->kode_satuan,
            'nama_satuan' 		=> $this->nama_satuan,
            'id_user' 			=> $this->id_user,
            'ip_add' 			=> $this->ip_add,
            'last_update' 		=> $this->last_update,
        ];
    }
}
