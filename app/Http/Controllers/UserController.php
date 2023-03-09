<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Group;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search_term = request('q','');

        $users = User::search(trim($search_term))->paginate(5);

        if ($request->has('role')) {
            $users = Role::where('name', $request->role)->first()->users()->search(trim($search_term))->paginate(5);
        }
        if ($request->has('limit')){
            $users = User::search(trim($search_term))->paginate($request->limit);
            if ($request->has('role')) {
                $users = Role::where('name', $request->role)->first()->users()->search(trim($search_term))->paginate($request->limit);
            }
        }
        if ($request->has('group')){
            $users = User::whereHas('group', function($q) use ($request) {
                $q->where('group_number',$request->group);
            })->search(trim($search_term))->paginate($request->limit);

            if ($request->has('role')) {
                $users = Role::where('name', $request->role)->first()->users()->whereHas('group', function($q) use ($request) {
                    $q->where('group_number',$request->group);
                })->search(trim($search_term))->paginate($request->limit);
            }

        }
        return UserResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email|string|unique:users,email',
            'role' =>'required|string',
            'patronymic' => 'string|nullable',
            'group' => 'string|exists:groups,group_number|nullable',
            'tutor_of' => 'string|exists:groups,id|nullable',
            'status' => 'string',
            'password' => [
                'required',
                Password::min(8)->mixedCase()->numbers()->symbols()
            ],
            'image' => 'file|mimes:jpg,png,jpeg|max:5048',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $new_data = $request->except('role');
        $new_data['password'] = bcrypt($request->password);
        $user = User::create($new_data);



        if ($request->has('group')){
            $group_id = Group::where('group_number', $request->group)->first()->id;
            $user->group_id = $group_id;
            $user->save();
        }

        if ($request->has('tutor_of')){
            $user->tutor_of = $new_data['tutor_of'];
            $user->save();
        }

        if ($request->hasFile('image')){
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $filePath = Storage::disk('public')->putFileAs('/images',$request->image, $newImageName);
            $url = url('/storage/' . $filePath);
            $user->avatar_location = $url;
        }

        $user->assignRole($data['role']);

        return response(['user' => new UserResource($user), 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if ($user == null) {
            return response(['message' => 'User not found'],404);
        } else {
            return response(['user' => new UserResource($user)], 200);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => [
                "required",
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'role' =>'required|string',
            'patronymic' => 'string|nullable',
            'group_id' => 'string|exists:groups,id|nullable',
            'tutor_of' => 'string|exists:groups,id|nullable',
            'status' => 'string',
            'password' => [
                Password::min(8)->mixedCase()->numbers()->symbols()
            ],
            'image' => 'mimes:jpg,jpeg,png|max:5048',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        if($request->has('patronymic')) {
            $user->patronymic = $request->patronymic;
        }
        if($request->has('password')) {
            $user->password = bcrypt($request->password);
        }
        if($request->has('status')) {
            $user->status = bcrypt($request->status);
        }
        if ($request->has('group')){
            $group_id = Group::where('group_number', $request->group)->first()->id;
            $user->group_id = $group_id;
            $user->save();
        }

        if ($request->has('tutor_of')){
            $user->tutor_of = $request->tutor_of;
            $user->group_id = null;
        }
        if ($request->file()){

            if ($user->avatar_location !== null){
                Storage::disk('public')->delete(str_replace('http://localhost:8000/storage/', '', $user->avatar_location));
            }
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $filePath = Storage::disk('public')->putFileAs('/images',$request->image, $newImageName);
            $url = url('/storage/' . $filePath);
            $user->avatar_location = $url;
        }


        $user->removeRole($user->roles[0]->name);
        $user->assignRole($request->role);
        $user->save();

        return response(['user' => new UserResource($user), 'message' => 'Updates successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = explode(",", $id);
        User::find($ids)->each(function ($user, $key) {
            $user->delete();
        });

        return response(['message' => 'User/s was deleted'],200);

    }

    public function massDestroy($users)
    {
        $usersArray = explode(',',$users);
        User::whereKey($usersArray)->delete();
        return response()->noContent();
    }

    public function getTeachers(Request $request){
        $search_term = request('q','');

        $users = Role::where('name', 'Teacher')->first()->users()->search(trim($search_term))->paginate(5);

        if ($request->has('limit')){
            $users = User::search(trim($search_term))->paginate($request->limit);
        }

        return $users;
    }


}
