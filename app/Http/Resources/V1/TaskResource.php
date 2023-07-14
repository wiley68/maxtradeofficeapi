<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\CommentResource;
use App\Models\User;

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
            'user_id' => $this->user_id,
            'user_name' => User::where('id', $this->user_id)->firstOrFail()->name,
            'name' => $this->name,
            'description' => $this->description,
            'icon' => $this->icon,
            'status' => $this->status,
            'parent_id' => $this->parent_id,
            'info' => $this->info,
            'comments' => $this->comments()->get()->map(fn ($comment) => new CommentResource($comment)),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
