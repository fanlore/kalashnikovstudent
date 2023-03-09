<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = User::where('id',$this->user_id)->first();
        return [
            "id" => 2,
            "user_id" => $this->user_id,
            "user_avatar" => $user->avatar_location,
            "homework_id" => $this->homework_id,
            "messsage" => $this->messsage,
            "created_at" => $this->created_at,
        ];
    }
}
