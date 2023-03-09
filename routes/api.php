<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentDisciplineController;
use App\Http\Controllers\StudentLessonController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FacultyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return UserResource::make($request->user());
    });

    Route::group(['middleware' => ['role:Admin']], function () {
        Route::group(['prefix' => 'users'], function () {
            Route::get('/teachers', [UserController::class, 'getTeachers']);
            Route::get('/', [UserController::class, 'index']);
            Route::post('/', [UserController::class, 'store']);
            Route::get('/{id}', [UserController::class, 'show']);
            Route::post('/{user}', [UserController::class, 'update']);
            Route::patch('/{user}', [UserController::class, 'update']);
            Route::delete('/{id}', [UserController::class, 'destroy']);
            Route::delete('/massDestroy/{users}', [UserController::class,'massDestroy']);

        });

        Route::group(['prefix' => 'groups'], function () {
            Route::get('/', [GroupController::class, 'index']);
            Route::post('/', [GroupController::class, 'store']);
            Route::get('/{group}', [GroupController::class, 'show']);
            Route::post('/{group}', [GroupController::class, 'update']);
            Route::patch('/{group}', [GroupController::class, 'update']);
            Route::delete('/{id}', [GroupController::class, 'destroy']);
            Route::delete('/massDestroy/{groups}', [GroupController::class,'massDestroy']);
        });

        Route::group(['prefix' => 'disciplines'], function () {
            Route::get('/', [DisciplineController::class, 'index']);
            Route::post('/', [DisciplineController::class, 'store']);
            Route::get('/{id}', [DisciplineController::class, 'showDiscipline']);
            Route::post('/{discipline}', [DisciplineController::class, 'update']);
            Route::patch('/{discipline}', [DisciplineController::class, 'update']);
            Route::delete('/{id}', [DisciplineController::class, 'destroy']);
            Route::delete('/massDestroy/{disciplines}', [DisciplineController::class,'massDestroy']);
        });

        Route::group(['prefix' => 'faculties'], function () {
            Route::get('/', [FacultyController::class, 'index']);
        });

        Route::get('/years', function (Request $request) {
            return \App\Models\Years::all();
        });
    });

    Route::group(['middleware' => ['role:Admin|Teacher']], function () {
        Route::group(['prefix' => 'teacher'], function () {
            Route::get('/disciplines', [DisciplineController::class, 'show']);
            Route::get('/lessons', [LessonController::class, 'index']);
            Route::get('/lessons/{lesson}', [LessonController::class, 'show']);
            Route::get('/lessons/homeworks/{lesson}', [LessonController::class, 'getLessonsHomeworks']);
            Route::post('/lessons', [LessonController::class, 'store']);
            Route::post('/lessons/{lesson}', [LessonController::class, 'update']);
            Route::patch('/lessons/{lesson}', [LessonController::class, 'update']);
            Route::delete('/lessons/{id}', [LessonController::class, 'destroy']);
            Route::delete('/lessons/massDestroy/{lessons}', [LessonController::class, 'massDestroy']);
            Route::post('/lesson/storeFiles', [LessonController::class, 'storeFiles']);
        });
    });

    Route::group(['middleware' => ['role:Student|Admin|Teacher']], function () {
        Route::group(['prefix' => 'student'], function () {
            Route::get('/disciplines', [StudentDisciplineController::class, 'index']);
            Route::get('/{discipline_id}/lessons', [StudentLessonController::class, 'index']);
            Route::get('/lessons/{lesson_id}/{user_id}', [StudentLessonController::class, 'getStudentLesson']);
            Route::post('/homework/store', [LessonController::class, 'storeHomework']);
            Route::get('/homework/{homework_id}', [LessonController::class, 'getHomework']);
        });
    });


    // Chat

    Route::post('/chat/add/{homework_id}', [ChatController::class, 'store']);
    Route::get('/chat/get/{homework_id}', [ChatController::class, 'getMessages']);

    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::post('/register',[AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
