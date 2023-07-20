<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title'=> $this->title,
            'description'=> $this->description,
            'date_to_publish'=> $this->date_to_publish,
            'status'=> $this->status,
            'image' => env('APP_URL').'/'.$this->image,
        ];
    }
}
