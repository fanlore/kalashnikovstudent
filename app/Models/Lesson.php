<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = ['title','order_number','content','destination','is_available','discipline_id'];
    public function discipline(){
        return $this->belongsTo(Discipline::class,'discipline_id','id');
    }

    public function scopeSearch($query, $term){
        $term = "%$term%";

        $query->where(function ($query) use ($term){
            $query->where('order_number','like',$term)
                ->orWhere('title','like',$term);
        });
    }
}
