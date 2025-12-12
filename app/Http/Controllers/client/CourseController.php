<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use App\Models\Course;
use App\Models\User;
use App\Http\Requests\Client\CourseRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class CourseController extends Controller
{
    public function courses()
    {
        return view('client.course.create-course');
    }
    public function create()
    {
        return view('client.course.create-course');
    }

    public function store(CourseRequest $request)
    {
        $data = $request->validated();

        $user = Auth::user();
        $user->courses()->create($data);

        return redirect()->route('client.courses.create')->with('success', 'تم حفظ الكورس بنجاح');
    }

    public function show()
    {
        return view('client.Show.show', compact('user'));

    }

    public function destroy()
    {
        if ($course->user_id == auth()->id()) {
            $course->delete();
            return back()->with('success', 'Done');
        }

        return back()->with('error', 'Error');
    }


}
