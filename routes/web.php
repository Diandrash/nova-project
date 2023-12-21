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


Route::get('/student/courses/inputCode', function () {
    return 2;
});


// Route::get('/home', function(){
    //     return view('home');
    // })->middleware(['auth', 'role_id:1']);
    
    Route::get('/home', function(){
        return view('pages.home');
    });
    
Route::get('/student', [CourseController::class, 'homeStudentIndex']);
Route::get('/student/courses', [CourseController::class, 'studentIndex']);
Route::get('/student/courses/{course}', [CourseController::class, 'studentShow']);
Route::get('/student/courses/inputCode', [EnrollmentController::class, 'index'])->name('courses.join');
Route::post('/student/courses/inputCode', [EnrollmentController::class, 'getCourse'])->name('courses.getCourse');
Route::post('/student/courses/join', [EnrollmentController::class, 'store'])->name('courses.joinCourse');
Route::get('/student/courses/{course}/users', [CourseController::class, 'showStudentCourse'])->name('studentShowUsers');
Route::post('/student/courses/{course}/leave', [EnrollmentController::class, 'destroy'])->name('courses.leave');
// Route::post('/student/get_course', [EnrollmentController::class, 'getCourse']);

Route::get('/student/assignments', [AssignmentController::class,'indexAssignmentStudent']);
Route::get('/student/assignments/{course_id}/showAssignments', [CourseController::class, 'indexStudent'])->name('assignment.indexStudent');
Route::get('/student/assignments/showAssignments/{assignment}', [AssignmentController::class, 'studentShow'])->name('assignment.studentShow');
Route::put('/student/assignments/showAssignments/{assignment}/{submission}', [SubmissionController::class, 'studentUpdate'])->name('assignment.studentUpdate');

Route::get('/student/materials', [MaterialController::class, 'indexStudent'])->name('materials.indexStudent');




Route::get('/teacher', [CourseController::class, 'homeTeacherIndex']);
Route::get('/teacher/courses', [CourseController::class, 'teacherIndex']);
Route::get('/teacher/courses/create', [CourseController::class, 'create']);
Route::post('/teacher/courses/create', [CourseController::class, 'store']);
Route::get('/teacher/courses/{course}', [CourseController::class, 'teacherShow'])->name('course.showTeacher');
Route::get('/teacher/courses/{course}/members', [CourseController::class, 'showStudentCourseTeacher'])->name('course.members');
Route::delete('/teacher/courses/{course}/members/{user}', [EnrollmentController::class, 'teacherDestroy'])->name('course.memberDelete');
Route::get('/teacher/courses/{course}/code', [CourseController::class, 'courseCode']);
Route::get('/teacher/courses/{course}/edit', [CourseController::class, 'edit']);
Route::put('/teacher/courses/{course}/edit', [CourseController::class, 'update']);
Route::delete('/teacher/courses/{course}', [CourseController::class, 'destroy']);


Route::get('/teacher/assignments/{course}/showAssignment', [AssignmentController::class, 'courseAssignmentTeacher'])->name('assignment.index');
Route::get('/teacher/assignments/{assignment}', [AssignmentController::class, 'teacherShow']);
Route::get('/teacher/assignments/create', [AssignmentController::class, 'create'])->name('assignment.create');
Route::post('/teacher/assignments/create', [AssignmentController::class, 'store']);
Route::delete('/teacher/assignments/{assignment}', [AssignmentController::class, 'destroy'])->name('assignment.destroy');



Route::get('/teacher/materials', [MaterialController::class, 'indexTeacher'])->name('materials.indexTeacher');
Route::get('/teacher/materials/create', [MaterialController::class, 'create'])->name('materials.create');
Route::post('/teacher/materials/create', [MaterialController::class, 'store'])->name('');
Route::get('/teacher/materials/{material}/edit', [MaterialController::class, 'edit'])->name('materials.edit');
Route::put('/teacher/materials/{material}/edit', [MaterialController::class, 'update'])->name('');
Route::delete('/teacher/materials/{material}/delete', [MaterialController::class, 'destroy'])->name('materials.delete');

Route::get('/teacher/assignments/{assignment}/submissions', [SubmissionController::class, 'index'])->name('submission.index');





