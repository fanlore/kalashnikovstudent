<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Group extends Model
{
    use HasFactory;
    protected $fillable = ['group_number','faculty_id','year_id'];
    public function groupYear(){
        return $this->belongsTo(Years::class,'year_id','id');
    }

    public function scopeSearch($query, $term){
        $term = "%$term%";

        $query->where(function ($query) use ($term){
            $query->where('group_number','like',$term);
        });
    }

}
