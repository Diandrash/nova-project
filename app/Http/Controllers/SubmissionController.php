<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdateSubmissionRequest;
use RealRashid\SweetAlert\Facades\Alert;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assignmentId = request()->input("assignmentId");
        $assignment = Assignment::find($assignmentId);
        $submissions = $assignment->submissions;
        $courseId = $assignment->course->id;
        $course = Course::find($courseId);
        // return dd($submissions);
        return view('pages.teacher.Submission.index', [
            "submissions" => $submissions,
            "course" => $course,
            "assignment" => $assignment,
        ]);
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
    public function store(StoreSubmissionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function studentUpdate(UpdateSubmissionRequest $request, $assignment, $submission)
    {
        // dd($request);
        // Cari submission berdasarkan ID
        $submission = Submission::find($submission);
    
        // Validasi input dari request sesuai kebutuhan
        $validatedData = $request->validate([
            'submitted_files' => 'file|mimes:pdf,doc,docx,pptx,xls,jpg,jpeg,png,heic,csv',
            'submission_text' => 'max:255',
            'status' => 'required|in:0,1', // Pastikan status adalah 0 atau 1
            'user_id' => 'required',
            'assignment_id' => 'required',
        ]);
    
        // Lakukan pembaruan data submission
        if ($request->hasFile('submitted_files')) {
            // // Jika ada file yang diunggah, lakukan pembaruan
            // $file = $request->file('submitted_files');
            // $originalName = $file->getClientOriginalName();
            // $fileName = str_replace(' ', '_', $originalName);
            // $file->move(public_path('Submissions'), $fileName); // Simpan file di dalam /public/Submissions
            // $pathToFile = $fileName; // Simpan path file
            $uploadedFileUrl = cloudinary()->uploadFile($request->file('submiited_files')->getRealPath())->getSecurePath();
            $url = $uploadedFileUrl;
            $submission->submitted_files = $url;
        }
    
        // Update atribut-atribut lainnya
        // $submission->submission_text = $validatedData['submission_text'];
        $submission->status = $validatedData['status'];
    
        // $submission->update($validatedData);
        $submission->save();

        Alert::success('Sucess', 'Your Work has been uploaded');
        return redirect()->route('assignment.studentShow', ['assignment' => $assignment])
            ->with('UpdateSuccess', 'Submission berhasil diperbarui');
    }
    
    
    public function updateMark(Request $request, $assignment, $submission)
    {
        // return 1;
        // Logika untuk mengupdate mark di sini
        // ...
    
        // Contoh: Set nilai mark dari request
        $newMark = $request->input('mark');
    
        // Contoh: Simpan perubahan pada model Submission
        $submissionModel = Submission::find($submission);
        $submissionModel->mark = $newMark;
        $submissionModel->save();
    

        
        // Kembalikan respons redirect
        // return redirect()->intended('/teacher/courses');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
