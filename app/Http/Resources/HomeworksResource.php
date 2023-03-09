<?php

namespace App\Http\Resources;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeworksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'homework_media' => $this->homework_media,
            'progress' => $this->progress,
            'user_data' => User::where('id',$this->user_id)->get(),
            'lesson_data' => Lesson::where('id',$this->lesson_id)->get(),
        ];
    }
}
