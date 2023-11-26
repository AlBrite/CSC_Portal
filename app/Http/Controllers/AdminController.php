<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Advisor;
use App\Models\AcademicSet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\LoginController;
use App\Models\Course;
use App\Models\Department;

class AdminController extends Controller
{
    public function dashboard()
    {
        $advisors = Advisor::with('user')->latest()->simplePaginate(6);
        $countCourses = Course::getAllCourses()->count();
        $unassignedAdvisors = Advisor::whereNull('set_id')->latest()->get();

        return view('admin.dashboard', compact('advisors', 'unassignedAdvisors', 'countCourses'));
    }

    public function displayDepartments()
    {
        $departments = Department::latest()->simplePaginate(6);

        return view('admin.display-departments', compact('departments'));
    }

    public function addAdvisor()
    {
        return LoginController::store('advisor');
    }

    public function addAdvisorForm()
    {
        return view('admin.addadvisor');
    }


    public function addAcademicSet(Request $request)
    {
        $formFields = $request->validate([
            'start_year' => 'required|regex:/^[0-9]+$/',
            'end_year' => 'required|regex:/^[0-9]+$/',
            'department' => 'required',
            'advisor_id' => 'sometimes|regex:/^[0-9]+$/'
        ], [
            'start_year.regex' => 'Invalid start year',
            'end_year.regex' => 'Invalid end year',
            'advisor_id.regex' => 'Invalid Advisor Id'
        ]);

        $formFields['name'] = "{$formFields['department']} {$formFields['end_year']}";

        $set = AcademicSet::create($formFields);

        return redirect()->route('view.academic_set', compact('set'));
    }
}
