<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CommentResource;

class VideoResource extends JsonResource
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
            'title_of_video' => $this->title_of_video,
            'description' => $this->description,
            'video_image' => $this->description,
            'views' => $this->views,
            'comments' => CommentResource::collection($this->comments),
            'likes' => LikeResource::collection($this->likes),
            'user'=> $this->user->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
