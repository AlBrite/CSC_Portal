<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AdvisorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AcademicSetController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/home', function () {
    return User::redirectToDashboard();
})->name('home');

Route::get('/icons', fn () => view('icons'));


Route::get('/student/@{username}', [StudentController::class, 'profile'])->name('profile.student');

// Route for authenticated users
Route::middleware('auth')->group(function () {

    Route::post('/admin/addAdmin', [AdvisorController::class, 'addAdmin'])->name('add.admin')->middleware('role:admin');

    Route::post('/admin/addAdvisor', [AdminController::class, 'addAdvisor'])->name('add.advisor')->middleware('role:admin');
    Route::get('/admin/addAdvisor', [AdminController::class, 'addAdvisorForm'])->name('add.advisorForm')->middleware('role:admin');

    Route::get('/student', [StudentController::class, 'dashboard'])->middleware('role:student')->name('student.dashboard');
    Route::get('/admin', [AdminController::class, 'dashboard'])->middleware('role:admin')->name('admin.dashboard');
    Route::get('/advisor', [AdvisorController::class, 'dashboard'])->middleware('role:advisor')->name('advisor.dashboard');

    Route::post('/make/course_rep', [AdvisorController::class, 'makeCourseRep'])->name('make.course_rep')->middleware('role:advisor');
    Route::post('/admin/addstudent', [StudentController::class, 'addStudent'])->name('add.student');
    Route::post('/academicSet/add', [AdminController::class, 'addAcademicSet'])->name('add.academic_set');
    Route::get('/academicSet/{set}', [AcademicSetController::class, 'show'])->name('view.academic_set');
    Route::get('/advisor/@{username}', [AdvisorController::class, 'profile'])->name('profile.advisor');
    Route::get('/logout', [UsersController::class, 'doLogout'])->name('logout');
    Route::get('/invite/revoke/{set}', [AcademicSetController::class, 'revokeInvitationLink'])->name('revoke.invitation');
    Route::get('/invite/generate/{set}', [AcademicSetController::class, 'generateInvitationLink'])->name('generate.invitation');

    Route::delete('/resource/{id}', 'ResourceController@destroy')->middleware('confirm.password');

    // Password confirmation page
    Route::get('/confirm-password', 'PasswordConfirmationController@show')->name('confirm-password');

    // Handle password confirmation
    Route::post('/confirm-password', 'PasswordConfirmationController@confirm');

    Route::post('/proceed?action={action}', [UserController::class, 'proceedWithPassword'])->name('proceed');
    //Route::get('/proceed/{action}', [UserController::class, 'proceedWithPassword'])->name('proceed');


    Route::get('/courses', [CourseController::class, 'index'])->name('view.courses');
    Route::get('/courses/add', [CourseController::class, 'addCourseForm'])->name('add.course');
    Route::post('/courses/store', [CourseController::class, 'store'])->name('store.course');
    Route::get('/course/{course}', [CourseController::class, 'show'])->name('view.course');
    Route::get('/courses/select_registration_options', [CourseController::class, 'registerForm'])->middleware('role:student')->name('course.registration_form');
    Route::get('/courses/list_registered_courses', [CourseController::class, 'listRegisteredCourses'])->middleware('role:student')->name('courses.list');

    Route::post('/courses/display_courses', [CourseController::class, 'displayCourses'])->middleware('role:student')->name('proceed_register.courses');
    Route::post('/courses/register', [CourseController::class, 'doRegister'])->middleware('role:student')->name('register.courses');

    Route::get('/student/settings', [StudentController::class, 'settings'])->middleware('role:student')->name('student.settings');
    Route::get('/student/admin', [AdminController::class, 'settings'])->middleware('role:admin')->name('admin.settings');
    Route::get('/student/advisor', [AdvisorController::class, 'settings'])->middleware('role:advisor')->name('advisor.settings');


    Route::post('/student/update', [StudentController::class, 'update'])->middleware('role:student')->name('student.update');
    Route::get('/departments', [AdminController::class, 'displayDepartments'])->middleware('role:admin');
    Route::get('/department/add', [DepartmentController::class, 'insert']);
    Route::post('/department/add', [DepartmentController::class, 'store']);
});


// Routes for non-authenticated users
Route::middleware('guest')->group(function () {

    Route::redirect('/', '/login');
    Route::get('/invite/student', [StudentController::class, 'register']);
    Route::post('/student/join', [StudentController::class, 'doRegister'])->name('student_reg.form');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/login/{provider}', [LoginController::class, 'redirectToProvider']);
    Route::get('/login/{provider}/callback', [LoginController::class, 'handleProviderCallback']);
    Route::post('/doregister', [LoginController::class, 'doRegister']);
    Route::post('/dologin', [LoginController::class, 'doLogin']);
});
