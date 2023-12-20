<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\User;
use App\Models\Course;
use App\Models\Submission;
use illuminate\Http\Request; 
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use Illuminate\Support\Facades\DB; // Import DB Facade

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexStudent(Request $request)
{
    // Program ini dialihkan ke Course Controller 
    // Ganti Controller langsung bisa, aku juga bingung
    $course_id = $request->input('courseId');
    // return $course_id;
    $userId = auth()->user()->id;
    $user = User::find($userId);

    // Ambil semua assignments yang dimiliki oleh pengguna pada course tertentu
    $assignments = $user->assignments()->where('course_id', $course_id)->get();

    return view('pages.student.assignment.index', [
        "assignments" => $assignments,
        "course_id" => $course_id
    ]);
}

// Menampilkan Semua Assignment yang dimiliki oleh satu user
    public function indexAssignmentStudent(){
        $userId = auth()->user()->id;
        $user = User::find($userId);
        $assignments = $user->assignments;

        return view('pages.student.assignment.assignments', [
            'assignments' => $assignments
        ]);
    }

    public function courseAssignmentTeacher(){
    $courseId = request()->input('courseId');
    $assignments = Assignment::where('course_id', $courseId)->get();

    return view('pages.teacher.assignment.index', [
        'assignments'=> $assignments
    ]);
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.teacher.assignment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssignmentRequest $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'max:1080',
            'deadline' => 'required',
            'course_id' => 'required',
            'files' => 'file|mimes:pdf,doc,docx,pptx,xls,jpg,jpeg,png',
        ]);

        // Inisialisasi nama file ke null
        $fileName = '';

        // Upload file tugas jika ada
        if ($request->hasFile('files')) {
            $file = $request->file('files');
            $originalName = $file->getClientOriginalName();
            $fileName = str_replace(' ', '_', $originalName); // Ganti spasi dengan garis bawah
            $file->move('Assignments', $fileName);
        }

        // Simpan data baru ke dalam tabel Assignment, termasuk path file jika ada
        $assignment = Assignment::create([
            'title' => $validatedData['title'],
            'course_id' => $validatedData['course_id'],
            'description' => $request->input('description'),
            'deadline' => $request->input('deadline'),
            'files' => $fileName,
        ]);

        // Membuat entri Submission untuk setiap siswa dalam course assignment
        $students = $assignment->course->users;

        foreach ($students as $student) {
            DB::table('submissions')->insert([
                'user_id' => $student->id,
                'assignment_id' => $assignment->id,
                'status' => 0, // Status awal, bisa disesuaikan
                // ... tambahkan atribut lain yang diperlukan
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // return redirect()->intended('/teacher/assignments/{course_id}/showAssignment')->with('AddSuccess', 'Assignment berhasil ditambahkan');
        return redirect()->route('assignment.index', ['course_id' => $validatedData['course_id'], 'courseId' => $validatedData['course_id']])->with('AddSuccess', 'Assignment berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function teacherShow($id)
    {
        // dd($assignment);
        $assignment = Assignment::find($id);
        return view('pages.teacher.assignment.show', [
            "assignment" => $assignment
        ]);
    }

    public function studentShow($assignment)
    {
        // dd($assignment);
        $assignmentId = $assignment;
        $assignment = Assignment::find($assignmentId);

        $userId = auth()->user()->id;
        $submission = Submission::where('user_id', $userId)->where('assignment_id', $assignmentId)->first();
        return view('pages.student.assignment.index', [
            "assignment" => $assignment,
            "submission" => $submission  
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function studentUpdate(UpdateAssignmentRequest $request, Assignment $assignment)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment)
    {
        $courseId = request()->input('courseId');
        $assignment->delete();

        return redirect()->route("assignment.index", [
            'course_id' => $courseId
        ])->with('DeleteSuccess', 'Assignment has deleted');
    }
}
