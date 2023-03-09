<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupResource;
use App\Models\Group;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search_term = request('q','');

        $groups = Group::search(trim($search_term))->paginate(5);

        if ($request->has('limit')){
            $groups = Group::search(trim($search_term))->paginate($request->limit);
        }

        return GroupResource::collection($groups);
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
            'group_number' => 'required|string|unique:groups,group_number',
            'faculty_id' => 'required|string|exists:faculties,id',
            'year_id' => 'required|string|exists:years,id',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $group = Group::create([
            'group_number' => $request->group_number,
            'faculty_id' => $request->faculty_id,
            'year_id' => $request->year_id,

        ]);
        $group->save();
        return response(['group' => $group, 'message' => 'Created successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        return response(['group' => new GroupResource($group)], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $validator = Validator::make($request->all(), [
            'group_number' => 'required|string',
            'faculty_id' => 'required|string|exists:faculties,id',
            'year_id' => 'required|string|exists:years,id',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $group->group_number = $request->group_number;
        $group->faculty_id = $request->faculty_id;
        $group->year_id = $request->year_id;
        $group->save();
        return response(['group' => $group, 'message' => 'Updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = explode(",", $id);
        Group::find($ids)->each(function ($group, $key) {
            $group->delete();
        });

        return response(['message' => 'Group/s was deleted'],200);
    }
    public function massDestroy($groups)
    {
        $groupsArray = explode(',',$groups);
        Group::whereKey($groupsArray)->delete();
        return response()->noContent();
    }
}
