<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id' => $this->id,
            'shop' => $this->shop_id,
            'name' => $this->name,
            'time_in' => $this->time_in,
            'time_out' => $this->time_out,
            'date' => $this->date,
            'amount' => $this->amount,
        ];
    }
}
