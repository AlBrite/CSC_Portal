<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\AcademicRecord;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    protected $fillable = [
        'name',
        'code',
        'semester',
        'unit',
        'level',
        'mandatory'
    ];
    public function index()
    {
        $courses = Course::getAllCourses();
        return view('courses.index', compact('courses'));
    }

    public function registerForm()
    {
        $department = Department::myDepartment()->first();
        $levels = Department::levels();
        return view('courses.register', compact('department', 'levels'));
    }

    public function listRegisteredCourses()
    {
        $student = Student::auth();
        $user = $student->user;
        $courses = $student->courses;
        return view('courses.list-of-registered-courses', compact('courses', 'student', 'user'));
    }

    public function show()
    {
        $courses = Course::getAllCourses();
        return view('courses.show', $courses);
    }

    public function displayCourses(Request $request)
    {
        $request->validate([
            'level' => 'required|regex:/[1-7]([0]+){2,2}/',
            'semester' => 'required|in:rain,harmattan'
        ], [
            'level.regex' => 'Invalid Level',
            'semester.in' => 'Invalid Semester'
        ]);

        $level = $request->input('level');
        $semester = $request->input('semester');

        $title = "List of {$level} level courses";
        $courses = Department::myCoursesForLevel($level, $semester);
        return view('courses.display_available_courses', compact('courses', 'title'));
    }

    public function doRegister(Request $request)
    {
        $requestedCourses = $request->input('course');
        $courses = Course::whereIn('id', $requestedCourses);
        $firstCourse = $courses->first();
        $level = $firstCourse->level;
        $semester = $firstCourse->semester;
        $courses =  Course::getCourses($level, $semester);

        $listOfMandatoryCourses = [];
        $courses_ = [];
        $user = auth()->user();
        // Student Reg Number
        $reg_no = $user->student->reg_no;

        foreach ($courses as $course) {
            if ($course->mandatory == 1) {
                $listOfMandatoryCourses[] = $course->id;
            }

            $courses_[] = [
                'user_id' => $user->id,
                'course_id' => $course->id,
                'student_id' => $reg_no,
                'unit' => $course->unit,
                'level' => $level,
                'semester' => $semester,
                'name' => $course->name,
                'code' => $course->code
            ];
        }

        $diff = array_diff($listOfMandatoryCourses, $requestedCourses);



        if (count($diff) > 0) {
            return back()->with('message', 'error:All mandatory courses must be checked');
        }
        foreach ($courses_ as $course) {
            AcademicRecord::create(AcademicRecord::getFillables($course));
        }

        return User::redirectToDashboard()->with('message', "success:You have successfully registered " . count($courses_) . " courses");
    }

    public function addCourseForm()
    {
        if (User::isStudent()) {
            return redirect('/student');
        }
        return view('courses.insert');
    }

    public function store(Request $request)
    {

        $formFields = $request->validate([
            'name' => 'required',
            'code' => ['required', Rule::unique('courses'), 'regex:/([a-zA-Z]+){3,3}\s*([0-9]+){3,3}/'],
            'semester' => 'required|in:rain,harmattan',
            'unit' => 'required|in:1,2,3,4,5,6',
            'level' => 'required|in:100,200,300,400,500,600',
            'check' => 'required',
            'mandatory' => 'required|in:1,0'
        ], [
            'name.required' => 'Course Title is required',
            'code.required' => 'Couse Code is required',
            'code.unique' => 'Course Code alread exists',
            'code.regex' => 'Invalid course code',
            'semester.in' => 'Semester must be either rain or harmattan',
            'unit.in' => 'Invalid course unit',
            'level.in' => 'Invalid level',
            'check.required' => 'You need to confirm that the data you provided are valid',
            'mandatory.in' => 'Select option'
        ]);

        $data = $request->only($this->fillable);
        $data['code'] = trim(strtoupper($data['code']));
        $data['name'] = ucfirst(trim($data['name']));

        $course = Course::create($data);

        if ($request->input('addmorecourse')) {
            return back()->with('message', "Course {$data['code']} has been added");
        }

        return User::redirectToDashboard()->with('message', "Course {$data['code']} has been added");
    }
}
