<?php

namespace App\Http\Controllers;

use App\Http\Resources\DisciplineResource;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentDisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $disciplines = Discipline::where('group_for',$user->group_id)->get();

        return DisciplineResource::collection($disciplines);

    }
}
