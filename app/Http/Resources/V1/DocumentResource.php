<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function PHPUnit\Framework\isJson;

class DocumentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'status'     => $this->status,
            'payload'    => json_decode($this->payload),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
