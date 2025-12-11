<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Http\Requests\Admin\CourseRequest;

use Illuminate\Http\Request;


class CourseController extends Controller
{
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->back()->with('Success', 'Course Deleted Successfully');
    }

    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.courses' , compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(CourseRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        Course::create($data);

        return redirect()->back()->with('Success', 'Course Created Successfully');
    }

}
