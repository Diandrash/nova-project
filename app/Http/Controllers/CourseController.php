<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\DB; // Import DB Facade
use App\Models\Enrollment;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function studentIndex()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $courseInUser = $user->courses->all();
        return view('pages.student.course.courses', [
            "courses" => $courseInUser
        ]);
    }
    public function homeStudentIndex()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $assignments = $user->assignments()->latest('created_at')->take(4)->get();
        $courseInUser = $user->courses()->take(4)->get();
        return view('pages.student.home', [
            "courses" => $courseInUser,
            "assignments" => $assignments
        ]);
    }
    public function homeTeacherIndex()
    {
        $userId = auth()->user()->id;
        $instructorId = $userId;
        $assignmentModel = new Assignment;
        // Panggil method assignmentsByInstructor pada instance Assignment
        $courseInTeacher = Course::where('instructor_id', $userId)->take(4)->get();
        $assignmentsByInstructor = $assignmentModel->assignmentsByInstructor($instructorId)->take(4);
        // dd($courseInTeacher);
        return view('pages.teacher.home', [
            "courses" => $courseInTeacher,
            "assignments" => $assignmentsByInstructor,
        ]);
    }

    public function teacherIndex()
    {
        $instructorId = auth()->user()->id;
        $courses = Course::where('instructor_id', $instructorId)->get();

        return view('pages.teacher.course.courses', [
            "courses" => $courses
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.teacher.course.create');
        // return view('layout.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        // return $request;
        function generateCourseCode() {
            $number = mt_rand(100000, 999999); // better than rand()
        
            // call the same function if the barcode exists already
            if (courseCodeExists($number)) {
                return generateCourseCode();
            }
        
            // otherwise, it's valid and can be used
            return $number;
        }
        
        function courseCodeExists($number) {
            // query the database and return a boolean
            // for instance, it might look like this in Laravel
            return Course::whereCourseCode($number)->exists();
        }

        $course_code = generateCourseCode();
        $credentials = $request->validate([
            'name' => 'required|min:5|max:255',
            'description' => 'required|max:1000',
            'instructor_id' => 'required',
            'course_code' => 'required'
        ]);

        $credentials['course_code'] = $course_code; 
        // $validatedData = [$credentials, $course_code];
        $validatedData = $credentials;

        Course::create($validatedData);

        Alert::success('Success', 'Create Course Successfully');
        return redirect('/teacher/courses');
    }

    /**
     * Display the specified resource.
     */
    public function studentShow(Course $course)
    {
        return view('pages.student.course.index', [
            "course" => $course
        ]);
    }
    public function teacherShow(Course $course)
    {
        // dd($course);
        return view('pages.teacher.course.index', [
            "course" => $course
        ]);
    }

    public function showUser(Request $request)
    {

        $courseId = $request->input('courseId');
        $course = Course::find($courseId);
        $userInCourse = $course->users->all();
        

        return view('pages.teacher.show_students', [
            "users" => $userInCourse
        ]);
    }
    public function showStudentCourse(Request $request, Course $course)
    {
        // return $request;
        $courseId = $request->input('courseId');
        $course = Course::find($courseId);
        $userInCourse = $course->users->all();
        

        return view('pages.student.course.members', [
            "users" => $userInCourse,
            "course" => $course
        ]);
    }
    public function showStudentCourseTeacher(Request $request, Course $course)
    {
        // return $request;
        $courseId = $request->input('courseId');
        $course = Course::find($courseId);
        $userInCourse = $course->users->all();
        

        return view('pages.teacher.course.members', [
            "users" => $userInCourse,
            "course" => $course
        ]);
    }

    // PROGRAM ASSIGNMENTS DIPINDAH DISINI
    public function indexStudent(Request $request)
    {
        $course_id = $request->input('courseId');
        // return $course_id;
        $userId = auth()->user()->id;
        $user = User::find($userId);

        // Ambil semua assignments yang dimiliki oleh pengguna untuk course tertentu
        $assignments = $user->assignments()->where('course_id', $course_id)->get();

        return view('pages.student.assignment.assignments', [
            "assignments" => $assignments,
            "course_id" => $course_id
        ]);
    }

    public function courseCode(Course $course)
    {
        // Mendapatkan course code dari model Course
        $courseCode = $course->course_code;
    
        // Memecah course code menjadi digit-digit terpisah
        $digits = array_map('intval', str_split($courseCode));
    
        // Mengembalikan view dengan data yang diperlukan
        return view('pages.teacher.course.code', [
            "course" => $course,
            "digits" => $digits,
        ]);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('pages.teacher.course.edit', [
            "course" => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        // return $request;
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'course_code' => 'required',
            'instructor_id' => 'required',
        ];

        $ValidatedData = $request->validate($rules);

        Course::where('id', $course->id)->update($ValidatedData);

        Alert::success('Success', 'Course Has Been Updated');
        return redirect()->route('course.showStudent', ['course' => $course->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        Course::destroy($course->id);
        return redirect('/teacher/courses/my_courses')->with('successDelete', 'success');
    }



    public function myCourse() {

    }
}
