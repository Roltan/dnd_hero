<?php

namespace App\Http\Resources\Draft;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ManyDraftsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'href' => '/create/hero/' . $this->id,
            'title' => $this->name
                ? 'Продолжить ' . $this->name . ' от ' . $this->created_at->format('d.m.Y H:i')
                : 'Продолжить персонажа от ' . $this->created_at->format('d.m.Y H:i')
        ];
    }
}
