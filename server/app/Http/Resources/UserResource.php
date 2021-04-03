<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Http\Resources\MissionResource;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'college' => $this->college,
            'major' => $this->major,
            'missions' => $this->missions,
            'reviews' => $this->reviews,
            'average_rating' => $this->reviews->avg('rating'),
            'favourites' => $this->favourites,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
