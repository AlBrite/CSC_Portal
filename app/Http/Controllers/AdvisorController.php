<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Advisor;
use App\Models\AcademicSet;
use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    public function dashboard()
    {
        $sets = Advisor::find(auth()->id())->first()->academicSet()->latest()->simplePaginate(6);

        return view('advisor.dashboard', compact('sets'));
    }

    public function makeCourseRep(Request $request)
    {
        $request->validate([
            'set_id' => 'required',
            'course_rep' => 'required'
        ]);
        $set = AcademicSet::whereNotNull('course_rep');
        $set->update(['course_rep' => null]);
        AcademicSet::where(['id' => $request->input('set_id')])
            ->update(['course_rep' => $request->input('course_rep')]);
        return back()->with('message', 'Changed course rep');
    }

    public function profile(Request $request, string $username)
    {
        $advisor = User::where('username', $username)?->first();


        return view('advisor.profile', compact('advisor'));
    }
}
