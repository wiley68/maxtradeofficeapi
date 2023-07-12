<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->user_id,
            'name' => $this->name,
            'description' => $this->description,
            'icon' => $this->icon,
            'status' => $this->status,
            'parentId' => $this->parent_id,
            'info' => $this->info,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at
        ];
    }
}
