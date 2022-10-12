<?php

namespace App\Http\Resources;

use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Http\Resources\Json\JsonResource;

class Carbon extends JsonResource
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
            'waktu' => Carbon::parse( $this->created_at)->format('H:i'),
            'thgl' => Carbon::parse($this->created_at)->format('l\'d-m-Y'),
        ];
    }
}
