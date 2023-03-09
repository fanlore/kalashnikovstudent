<?php

namespace App\Http\Controllers;

use App\Http\Resources\DisciplineResource;
use App\Http\Resources\LessonResource;
use App\Models\Discipline;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentLessonController extends Controller
{
    public function index($discipline_id)
    {
        $lessons = Lesson::where('discipline_id',$discipline_id)->where('is_available',1)->get();
        return LessonResource::collection($lessons);

    }
    public function getStudentLesson($lesson_id,$user_id)
    {
        $hw = DB::table('Homeworks')->where('lesson_id',$lesson_id)->where('user_id',$user_id)->first();

        if (!$hw){
            DB::table('Homeworks')->insert([
                'lesson_id' => $lesson_id,
                'user_id' => $user_id,
                'progress' => 'wait'
            ]);
        }
        $lesson = Lesson::where('id',$lesson_id)->first();
        return new LessonResource($lesson);

    }
}
