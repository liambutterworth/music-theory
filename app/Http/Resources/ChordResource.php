<?php

namespace App\Http\Resources;

// use App\Domain\Theory\Support\Theory;
use Illuminate\Http\Resources\Json\JsonResource;

class ChordResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name' => $this->name,

            'degrees' => $this->when($request->has('symbol'), function() use($request) {
                return $this->degreesFromSymbol($request->get('symbol'));
            }),
        ];
    }
}
