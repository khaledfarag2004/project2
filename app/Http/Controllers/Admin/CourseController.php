<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;


class CourseController extends Controller
{
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
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

    public function store(Request $request)
    {
        $create = $request->validate([
            'title' => 'required',
            'name_instractor' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        Course::create($create);

        return redirect()->back()->with('Success', 'Course Created Successfully');
    }

}
