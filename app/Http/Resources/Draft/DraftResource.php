<?php

namespace App\Http\Resources\Draft;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DraftResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'hero_name' => $this->hero_name,
            'lvl' => $this->lvl,
            'exp' => $this->exp,
            'klass' => $this->klass,
            'sub_klass' => $this->sub_klass,
            'race' => $this->race,
            'sub_race' => $this->sub_race,
            'background' => $this->background,
        ];
    }
}
