<?php

namespace App\Http\Controllers;

use App\Http\Resources\DisciplineResource;
use App\Models\Discipline;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_term = request('q','');

        $disciplines = Discipline::search(trim($search_term))->paginate(5);

        if ($request->has('limit')){
            $disciplines = Discipline::search(trim($search_term))->paginate($request->limit);
        }
        if ($request->has('group')){
            $disciplines = Discipline::whereHas('group', function($q) use ($request) {
                $q->where('group_number',$request->group);
            })->search(trim($search_term))->paginate($request->limit);
        }

        return DisciplineResource::collection($disciplines);

    }
    public function showDiscipline($id)
    {
        $discipline = Discipline::find($id);
        if ($discipline == null) {
            return response(['message' => 'Discipline not found'],404);
        } else {
            return response(['discipline' => new DisciplineResource($discipline)], 200);
        }

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
            'name' => 'required|string|unique:disciplines,name',
            'slug' => 'required|string|unique:disciplines,slug',
            'description' => 'string|nullable',
            'teacher_id' => 'string|required',
            'group_for' => 'string|required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $discipline = Discipline::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'teacher_id' => $request->teacher_id,
            'group_for' => $request->group_for,

        ]);
        $discipline->save();
        return response(['discipline' => $discipline, 'message' => 'Created successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $disciplines = Discipline::all()->where('teacher_id',Auth::user()->id);

        return DisciplineResource::collection($disciplines);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function edit(Discipline $discipline)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discipline $discipline)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'slug' => 'required|string',
            'description' => 'string|nullable',
            'teacher_id' => 'string|required',
            'group_for' => 'string|required',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $discipline->name = $request->name;
        $discipline->slug = $request->slug;
        $discipline->description = $request->description;
        $discipline->teacher_id = $request->teacher_id;
        $discipline->group_for = $request->group_for;
        $discipline->save();
        return response(['discipline' => $discipline, 'message' => 'Updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discipline  $discipline
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = explode(",", $id);
        Discipline::find($ids)->each(function ($discipline, $key) {
            $discipline->delete();
        });

        return response(['message' => 'Discipline/s was deleted'],200);
    }
    public function massDestroy($disciplines)
    {
        $groupsArray = explode(',',$disciplines);
        Discipline::whereKey($groupsArray)->delete();
        return response()->noContent();
    }
}
