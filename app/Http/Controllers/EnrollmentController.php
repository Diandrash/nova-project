<?php

namespace App\Http\Controllers;

// use Alert;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Enrollment;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return 1;
        return view('pages.student.course.join');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
        ]);
    
        // Cek apakah pengguna sudah terdaftar dalam kursus
        $userId = $validatedData['user_id'];
        $courseId = $validatedData['course_id'];
    
        $existingEnrollment = Enrollment::where('course_id', $courseId)
            ->where('user_id', $userId)
            ->first();
    
        if (!$existingEnrollment) {
            // Jika belum terdaftar, buat pendaftaran baru
            Enrollment::create($validatedData);
            Alert::success('Success!', 'Join Course Successfull');
            return redirect()->intended('/student/courses');
        } else {
            // Jika sudah terdaftar, kembalikan pesan kesalahan
            Alert::warning('Already Joined!', 'You Has Already Joined this Course');
            return redirect()->intended('/student/courses');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        //
    }

    public function getCourse(Request $request) {
        // return $request;
        $first = $request->input('first');
        $second = $request->input('second');
        $third = $request->input('third');
        $fourth = $request->input('fourth');
        $fifth = $request->input('fivth');
        $sixth = $request->input('sixth');

        // Menggabungkan nilai-nilai tersebut menjadi satu angka kesatuan
        $course_code = $first . $second . $third . $fourth . $fifth . $sixth;
         // Mengambil data course dari database
        $courses = Course::where('course_code', $course_code)->get();

        // Memeriksa apakah ada data course yang cocok
        if ($courses->isEmpty()) {
            // Jika tidak ada, redirect ke halaman join dengan pesan
            Alert::error('Not Found!', 'Course Not Found');
            return redirect()->back();
        }

        // Jika ada data course yang cocok, tampilkan tampilan hasil
        Alert::success('Success!', 'Course Founded');
        return view('pages.student.course.result', [
            "courses" => $courses
        ]);
    }
}
