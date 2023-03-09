<?php

namespace App\Http\Resources;

use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class DisciplineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $teacher = User::where('id',$this->teacher_id)->first();
        $teacher_name = $teacher->surname . ' ' . $teacher->name . ' ' . $teacher->patronymic;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'teacher' => $teacher_name,
            'teacher_id' => $this->teacher_id,
            'group' => Group::find($this->group_for)->group_number,
            'group_id' => $this->group_for,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'finish_date' => $this->finish_date,
        ];
    }
}
