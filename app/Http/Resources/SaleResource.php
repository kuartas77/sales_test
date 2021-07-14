<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class SaleResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'client' => $this->client,
            'phone' => $this->phone,
            'email' => $this->email,
            'subtotal' => $this->subtotal,
            'total_taxes' => $this->total_taxes,
            'total' => $this->total,
            'created_at' => $this->created_at,
            'detail' => SaleDetailResource::collection($this->details)
        ];
    }
}
