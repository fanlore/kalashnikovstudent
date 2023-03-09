<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','teacher_id','group_for','description'];
    public function scopeSearch($query, $term){
        $term = "%$term%";

        $query->where(function ($query) use ($term){
            $query->where('name','like',$term);
        });
    }
    public function group(){
        return $this->belongsTo(Group::class,'group_for','id');
    }
}
