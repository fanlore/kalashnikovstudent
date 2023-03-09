<?php

namespace App\Http\Controllers;

use App\Http\Resources\HomeworksResource;
use App\Http\Resources\LessonResource;
use App\Http\Resources\UserResource;
use App\Models\Discipline;
use App\Models\Group;
use App\Models\Lesson;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_term = request('q','');
        $lessons = Lesson::where('discipline_id',$request->discipline_id)->search(trim($search_term))->orderBy('order_number', 'asc')->paginate(5);

        if ($request->limit){
            $lessons = Lesson::where('discipline_id',$request->discipline_id)->search(trim($search_term))->orderBy('order_number', 'asc')->paginate($request->limit);
        }

        return LessonResource::collection($lessons);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'order_number' => 'required|string',
            'content' => 'required|string',
            'destination' =>'required|string',
            'is_available' => 'required|string',
            'homework_media' => [
                'file',
                'nullable',
                File::types(['zip', 'rar'])
                    ->max(1024 * 50)
            ],
            'discipline_id' => 'required|string|exists:disciplines,id',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $homework_media = null;
        if ($request->hasFile('homework_media')){
            $newFileName = time() . '-' . preg_replace('/\s+/', '', $request->title) . $request->file('homework_media')->extension();
            $filePath = Storage::disk('public')->putFileAs('/files',$request->homework_media, $newFileName);
            $url = url('/storage/' . $filePath);
            $homework_media = $url;
        }


        $lesson = Lesson::create([
            'title' => $request->title,
            'order_number' => $request->order_number,
            'content' => $request->content,
            'destination' => $request->destination,
            'discipline_id' => $request->discipline_id,
            'is_available' => $request->is_available,
        ]);

        $lesson->homework_media = $homework_media;
        $lesson->save();


        return response(['lesson' => $lesson, 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        if ($lesson == null) {
            return response(['message' => 'Lesson not found'],404);
        } else {
            return response(['lesson' => new LessonResource($lesson)], 200);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'order_number' => [
                "required",
//                Rule::unique('lessons', 'order_number')->ignore($lesson->id),
            ],
            'content' => 'required|string',
            'destination' =>'required|string',
            'is_available' => 'required|string',
            'homework_media' => [
                'nullable',
                'file',
                'sometimes',
                File::types(['zip', 'rar'])
                    ->max(1024 * 50)
            ],
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }
        $lesson->title = $request->title;
        $lesson->order_number = $request->order_number;
        $lesson->content = $request->content;
        $lesson->destination = $request->destination;
        $lesson->is_available = $request->is_available;
        if ($request->delete_homework){
            $lesson->homework_media = null;
        }

        if ($request->file('homework_media')){
            if ($lesson->homework_media !== null){
                Storage::disk('public')->delete(str_replace('http://localhost:8000/storage/', '', $lesson->homework_media));
            }
            $newFileName = time() . '-' . preg_replace('/\s+/', '', $request->title) . '.' . $request->homework_media->extension();
            $filePath = Storage::disk('public')->putFileAs('/files',$request->homework_media, $newFileName);
            $url = url('/storage/' . $filePath);
            $lesson->homework_media = $url;
        }

        $lesson->save();

        return response(['lesson' => $lesson, 'message' => 'Updated successfully'], 201);
    }


    public function storeFiles(Request $request){

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = explode(",", $id);
        Lesson::find($ids)->each(function ($lesson, $key) {
            $lesson->delete();
        });

        return response(['message' => 'Lesson/s was deleted'],200);
    }
    public function massDestroy($lessons)
    {
        $lessonsArray = explode(',',$lessons);
        Lesson::whereKey($lessonsArray)->delete();
        return response()->noContent();
    }

    public function getLessonsHomeworks($lesson){
        $lessons = DB::table('Homeworks')->where('lesson_id',$lesson)->get();

        return HomeworksResource::collection($lessons);
    }

    public function storeHomework(Request $request){
        $homework = DB::table('Homeworks')->where('id',$request->homework_id)->first();
        if (!$request->delete_homework){
            $validator = Validator::make($request->all(), [
                'homework_media' => [
                    'nullable',
                    'file',
                    'sometimes',
                    File::types(['zip', 'rar'])
                        ->max(1024 * 50)
                ],
            ]);

            if ($validator->fails()) {
                return response(['error' => $validator->errors(), 'Validation Error']);
            }
        }
        if ($request->delete_homework){
            DB::table('Homeworks')->where('id', $request->homework_id)->update(['homework_media' => null]);
        }
        if (!$request->delete_homework) {
            if ($request->file('homework_media')) {
                if ($homework->homework_media !== null) {
                    Storage::disk('public')->delete(str_replace('http://localhost:8000/storage/', '', $homework->homework_media));
                }
                $newFileName = time() . '.' . $request->homework_media->extension();
                $filePath = Storage::disk('public')->putFileAs('/homeworks', $request->homework_media, $newFileName);
                $url = url('/storage/' . $filePath);
                DB::table('Homeworks')->where('id', $request->homework_id)->update(['homework_media' => $url]);
            }
        }
        $homework = DB::table('Homeworks')->where('id',$request->homework_id)->first();
        return response(['homework' => $homework, 'message' => 'Updated successfully'], 201);
    }
    public function getHomework(Request $request)
    {
        $homework = DB::table('Homeworks')->where('id',$request->homework_id)->first();
        if ($homework){
            return new HomeworksResource($homework);
        }else {
            return response(['message' => 'Homework not found'],404);
        }
    }
    public function destroyHomeworkFile($homework_id){

    }
}
