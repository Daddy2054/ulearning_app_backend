<?php

//  php artisan make:controller Api/LessonController

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lesson;

class LessonController extends Controller
{
    //this is for our lesson list for a particular course
    public function lessonList(Request $request)
    {
        $id = $request->id;
        try {

            $result = Lesson::where('course_id', '=', $id)->select(
                'id',
                'name',
                'description',
                'thumbnail',
                'video',
            )->get();
            return response()->json(
                [
                    'code' => 200,
                    'msg' => 'My lesson list is here',
                    'data' => $result,
                ],
                200
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'code' => 500,
                    'msg' => 'Server internal error',
                    'data' => $e->getMessage()

                ],
                500
            );
            //throw $th;
        }
    }
}
