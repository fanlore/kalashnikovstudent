<?php

namespace App\Http\Resources;

use App\Models\Group;
use App\Models\Years;
use App\Models\Faculty;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
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
            'faculty_id' => $this->faculty_id,
            'group_number' => $this->group_number,
            'faculty' => Faculty::find($this->faculty_id)->faculty_name,
            'year_id' => $this->year_id,
            'year' => Years::find($this->year_id)->year,
        ];
    }
}
