<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasPermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function group(){
        return $this->belongsTo(Group::class,'group_id','id');
    }

    public function getGroupNumber($id){
        return Group::find($id)->group_number;
    }

    public function getFacultyData($group_id){
        $faculty_id = Group::find($group_id)->faculty_id;
        return Faculty::find($faculty_id);
    }

    public function scopeSearch($query, $term){
        $term = "%$term%";

        $query->where(function ($query) use ($term){
            $query->where('name','like',$term)
                ->orWhere('surname','like',$term)
                ->orWhere('patronymic','like',$term)
                ->orWhere('email','like',$term);
        });
    }
}
