<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\SubmissionController;

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

Route::get('/', function () {
    return view('pages.home');
});


Route::get('/register', [RegisterController::class, 'index']);
Route::get('/register/teacher', [RegisterController::class, 'teacher']);
Route::get('/register/student', [RegisterController::class, 'student']);

Route::post('/register', [RegisterController::class, 'regist']);


Route::get('/login', function () {
    return view('login.login');
});

Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/login', [LoginController::class, 'auth']);

	
Route::get('/teacher', function () {
    return view('pages.teacher.index');
});

Route::get('/student', function () {
    return view('pages.student.index');
});

Route::get('/student/courses/inputCode', function () {
    return 2;
});


// Route::get('/home', function(){
//     return view('home');
// })->middleware(['auth', 'role_id:1']);

Route::get('/home', function(){
    return view('pages.home');
});

Route::get('/student/courses', [CourseController::class, 'studentIndex']);
Route::get('/student/courses/{course}', [CourseController::class, 'studentShow']);
Route::get('/student/courses/inputCode', [EnrollmentController::class, 'index'])->name('courses.join');
Route::post('/student/courses/inputCode', [EnrollmentController::class, 'getCourse'])->name('courses.getCourse');
Route::post('/student/courses/join', [EnrollmentController::class, 'store'])->name('courses.joinCourse');
Route::get('/student/courses/{course}/users', [CourseController::class, 'studentShowUser'])->name('studentShowUsers');
Route::post('/student/courses/{course}/leave', [EnrollmentController::class, 'destroy'])->name('courses.leave');
// Route::post('/student/get_course', [EnrollmentController::class, 'getCourse']);

Route::get('/student/assignments', [AssignmentController::class,'indexAssignmentStudent']);
Route::get('/student/assignments/{course_id}/showAssignments', [CourseController::class, 'indexStudent'])->name('assignment.indexStudent');
Route::get('/student/assignments/showAssignments/{assignment}', [AssignmentController::class, 'studentShow'])->name('assignment.studentShow');
Route::put('/student/assignments/{course_id}/showAssignments/{assignment}/{submission}', [SubmissionController::class, 'studentUpdate'])->name('assignment.studentUpdate');


Route::get('/teacher/courses/my_courses', [CourseController::class, 'teacherIndex']);
Route::get('/teacher/courses/{course}', [CourseController::class, 'teacherShow']);
Route::post('/teacher/courses', [CourseController::class, 'store']);
Route::get('/teacher/courses/{course}/edit', [CourseController::class, 'edit']);
Route::put('/teacher/courses/{course}', [CourseController::class, 'update']);
Route::delete('/teacher/courses/{course}', [CourseController::class, 'destroy']);
Route::get('/course/show-users/{course_id}', [CourseController::class, 'showUser'])->name('course.show-users');


Route::get('/teacher/assignments/{course_id}/showAssignment', [AssignmentController::class, 'courseAssignmentTeacher'])->name('assignment.index');
Route::get('/teacher/assignments/create', [AssignmentController::class, 'create'])->name('assignment.create');
Route::post('/teacher/assignments/create', [AssignmentController::class, 'store']);
Route::get('/teacher/assignments/{course}', [AssignmentController::class, 'teacherShow']);
Route::delete('/teacher/assignments/{assignment}', [AssignmentController::class, 'destroy'])->name('assignment.destroy');



Route::get('/teacher/create_course', function(){
    return view('pages.teacher.create_course');
});

// Route::resource('/enrollment', EnrollmentController::class);
// Route::resource('/teacher/materials', MaterialController::class);

Route::get('/student/materials', [MaterialController::class, 'indexStudent'])->name('materials.indexStudent');


Route::get('/teacher/materials', [MaterialController::class, 'index'])->name('materials.index');
Route::get('/teacher/materials/create', [MaterialController::class, 'create'])->name('');
Route::post('/teacher/materials', [MaterialController::class, 'store'])->name('');
Route::get('/teacher/materials/{material}', [MaterialController::class, 'show'])->name('');
Route::put('/teacher/materials/{material}', [MaterialController::class, 'update'])->name('');
Route::delete('/teacher/materials/{material}', [MaterialController::class, 'destroy'])->name('');

Route::get('/teacher/assignments/{assignment}/submissions', [SubmissionController::class, 'index'])->name('submission.index');





