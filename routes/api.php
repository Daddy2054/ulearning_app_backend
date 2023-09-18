<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'Api'], function () {

    // Route::post('/login', 'UserController@createUser');
    Route::post('/login', 'UserController@login');
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::any('/courseList', 'CourseController@courseList');

        Route::any('/courseDetail', 'CourseController@courseDetail');
        Route::any('/lessonList', 'LessonController@lessonList');
        Route::any('/lessonDetail', 'LessonController@lessonDetail');
    });
});

//testing
//GET http://192.168.0.149:8000/api/courseList
//provide access token in auth header

//response:
// {
//     "code": 200,
//     "msg": "My course list is here",
//     "data": "My data is here"
//   }