<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientCourseApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => Course::where('user_id', Auth::id())->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string'
        ]);

        $course = Auth::user()->courses()->create($data);

        return response()->json([
            'status' => true,
            'message' => 'Course created successfully',
            'data' => $course
        ], 201);
    }

    public function show($id)
    {
        $course = Course::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$course) {
            return response()->json([
                'status' => false,
                'message' => 'Course not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $course
        ]);
    }

    public function destroy($id)
    {
        $course = Course::where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if (!$course) {
            return response()->json([
                'status' => false,
                'message' => 'Course not found or not yours'
            ], 404);
        }

        $course->delete();

        return response()->json([
            'status' => true,
            'message' => 'Course deleted successfully'
        ]);
    }
}
