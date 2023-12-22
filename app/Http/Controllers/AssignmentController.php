<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\User;
use App\Models\Course;
use App\Models\Submission;
use illuminate\Http\Request; 
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use RealRashid\SweetAlert\Facades\Alert;
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
    // Menampilkan Semua Assignment yang dimiliki oleh Teacher
    public function showAssignmentsByInstructor()
    {
        // Mendapatkan ID instruktur dari user yang sedang terautentikasi
        $instructorId = auth()->user()->id;
    
        // Ambil semua assignment yang dimiliki oleh instruktur
        $assignments = Assignment::assignmentsByInstructor($instructorId);
    
        // Tampilkan data assignments ke view atau lakukan sesuai kebutuhan
        return view('pages.teacher.assignment.assignmentsAll', compact('assignments'));
    }
    


    public function courseAssignmentTeacher(){
    $courseId = request()->input('courseId');
    $course = Course::where('id' , $courseId)->first();
    $assignments = Assignment::where('course_id', $courseId)->get();
    return view('pages.teacher.assignment.assignments', [
        'assignments'=> $assignments,
        'course' => $course,
    ]);
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return 1;
        $courseId = request()->input('courseId');
        $course = Course::where('id' , $courseId)->first();
        return view('pages.teacher.assignment.create', [
            "course" => $course,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssignmentRequest $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'max:1080',
            'deadline' => 'required',
            'course_id' => 'required',
            'files' => 'file|mimes:pdf,doc,docx,pptx,xls,jpg,jpeg,png',
        ]);

        // Inisialisasi nama file ke null
        $fileName = null;

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

        $assignments = Assignment::where('course_id', $request->course_id)->get();
        $course = Course::where('id', $request->course_id)->first();
        // dd($course);
        Alert::success('Success', 'Adding New Assignment Successfully');
        return redirect()->route('assignment.index', ['course_id' => $validatedData['course_id'], 'courseId' => $validatedData['course_id'], 'course' => $course])->with('AddSuccess', 'Assignment berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function teacherShow($id)
    {
        // return 1;
        // dd($assignment);
        $assignment = Assignment::find($id);
        return view('pages.teacher.assignment.index', [
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
        $courseId = request()->input('courseId');
        $course = Course::where('id', $courseId)->first();
        // return 1;
        return view('pages.teacher.assignment.edit', [
            "assignment" => $assignment,
            "course" => $course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAssignmentRequest $request, $id)
    {
        // Validasi data input dari form jika diperlukan
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'max:1080',
            'deadline' => 'required',
            'course_id' => 'required',
            'files' => 'file|mimes:pdf,doc,docx,pptx,xls,jpg,jpeg,png',
        ]);
    
        // Temukan assignment yang akan diperbarui
        $assignment = Assignment::findOrFail($id);
    
        // Inisialisasi nama file ke null
        $fileName = $assignment->files;
    
        // Upload file tugas jika ada
        if ($request->hasFile('files')) {
            $file = $request->file('files');
            $originalName = $file->getClientOriginalName();
            $fileName = str_replace(' ', '_', $originalName); // Ganti spasi dengan garis bawah
            $file->move('Assignments', $fileName);
    
            // Hapus file lama jika berhasil diunggah yang baru
            if ($assignment->files) {
                $oldFilePath = public_path('Assignments/' . $assignment->files);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
        }
    
        // Perbarui data yang ada dalam tabel Assignment, termasuk path file jika ada
        $assignment->update([
            'title' => $validatedData['title'],
            'course_id' => $validatedData['course_id'],
            'description' => $request->input('description'),
            'deadline' => $request->input('deadline'),
            'files' => $fileName,
        ]);
    
        $course = Course::where('id', $validatedData['course_id'])->first();
        Alert::success('Success', 'Assignment successfully updated');
        return redirect()->route('assignment.index', ['course_id' => $validatedData['course_id'], 'courseId' => $validatedData['course_id'], 'course' => $course]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assignment $assignment)
    {
        $courseId = request()->input('courseId');
        $assignment->delete();

        $course = Course::where('id', $courseId)->first();
        Alert::success('Success', 'Assignment successfully Deleted');
        return redirect()->route('assignment.index', ['course_id' => $courseId, 'courseId' => $courseId, 'course' => $course]);;
    }
}
