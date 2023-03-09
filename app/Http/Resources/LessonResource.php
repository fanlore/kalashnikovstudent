<?php

namespace App\Http\Resources;

use App\Models\Discipline;
use App\Models\Group;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $hw = DB::table('Homeworks')->where('lesson_id',$this->id)->where('user_id',Auth::id())->first();

        $lesson = [
            'id' => $this->id,
            'title' => $this->title,
            'order_number' => $this->order_number,
            'banner' => $this->banner,
            'content' => $this->content,
            'is_available' => $this->is_available,
            'homework_media' => $this->homework_media,
            'destination' => $this->destination,
            'group' => Group::where('id',$this->discipline->group_for)->first()->group_number,
            'discipline_id' => $this->discipline_id,
            'discipline' => Discipline::where('id',$this->discipline_id)->first()->name,
        ];

        if ($hw){
            $lesson['homework_id'] = $hw->id;
        }
        return $lesson;
    }
}
