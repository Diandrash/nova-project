<?php

namespace App\Http\Controllers;

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
        return view('pages.student.input_code_course');
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
            'course_id' => 'required',
            'user_id' => 'required',
        ]);
    
        // Cek apakah pengguna sudah terdaftar dalam kursus
        $courseId = $validatedData['course_id'];
        $userId = $validatedData['user_id'];
    
        $existingEnrollment = Enrollment::where('course_id', $courseId)
            ->where('user_id', $userId)
            ->first();
    
        if (!$existingEnrollment) {
            // Jika belum terdaftar, buat pendaftaran baru
            Enrollment::create($validatedData);
    
            return redirect()->intended('/student')->with('joinSuccess', 'joinSuccess');
        } else {
            // Jika sudah terdaftar, kembalikan pesan kesalahan
            return redirect()->intended('/student')->with('joinError', 'joinError');
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
        $inputCode = $request->course_code;
        // return $inputCode;
        // $courses = Course::where('course_code', $inputCode);
        $courses = Course::where('course_code', $inputCode)->get();
        return view('pages.student.join_code_course', [
            "courses" => $courses
        ]);
    }
}
