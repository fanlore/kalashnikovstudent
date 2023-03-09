<?php

namespace App\Http\Resources;

use App\Models\Group;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $defaultData = [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'patronymic' => $this->patronymic,
            'email' => $this->email,
            'group' => $this->group_id ? $this->getGroupNumber($this->group_id) : null,
            'faculty' => $this->group_id ? $this->getFacultyData($this->group_id) : null,
            'avatar' => $this->avatar_location,
        ];

        if ($this->tutor_of){
            $defaultData['tutor_of'] = $this->getGroupNumber($this->tutor_of);
        }
        $additionalData = [
            'role' => $this->roles->first()->name,
            'permissions' => $this->permissions,
        ];

        return array_merge($defaultData, $additionalData);
    }
}
