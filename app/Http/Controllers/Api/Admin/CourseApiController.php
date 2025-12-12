<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CourseRequest;
use App\Models\Course;

class CourseApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Course::all()
        ]);
    }

    public function store(CourseRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();

        $course = Course::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Course created successfully',
            'data' => $course
        ], 201);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json([
            'status' => true,
            'message' => 'Course deleted successfully'
        ]);
    }
}
