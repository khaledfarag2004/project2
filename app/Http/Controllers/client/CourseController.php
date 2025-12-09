<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class CourseController extends Controller
{
    public function courses()
    {
        return view('client.course.create-course');
    }

    public function createCourse(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $user = Auth::user();
        $user->courses()->create($data);
        return redirect()->route('create.courses')->with('success', 'تم حفظ الكورس بنجاح');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('client.Show.show', compact('user'));

    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        if ($course->user_id == auth()->id()) {
            $course->delete();
            return back()->with('success', 'Done');
        }

        return back()->with('error', 'Error');
    }


}
