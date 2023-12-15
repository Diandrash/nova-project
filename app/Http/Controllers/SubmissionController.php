<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Assignment;
use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdateSubmissionRequest;

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
        // return dd($submissions);
        return view('pages.teacher.submissions.index', 
        ["submissions" => $submissions]);
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
    public function studentUpdate(UpdateSubmissionRequest $request, $course_id, $assignment, $submission)
    {
        // Cari submission berdasarkan ID
        $submission = Submission::find($submission);
    
        // Validasi input dari request sesuai kebutuhan
        $validatedData = $request->validate([
            'submitted_files' => 'file|mimes:pdf,doc,docx,pptx,xls,jpg,jpeg,png',
            'submission_text' => 'max:255',
            'status' => 'required|in:0,1', // Pastikan status adalah 0 atau 1
            'user_id' => 'required',
            'assignment_id' => 'required',
        ]);
    
        // Lakukan pembaruan data submission
        if ($request->hasFile('submitted_files')) {
            // Jika ada file yang diunggah, lakukan pembaruan
            $file = $request->file('submitted_files');
            $originalName = $file->getClientOriginalName();
            $fileName = str_replace(' ', '_', $originalName);
            $file->move(public_path('Submissions'), $fileName); // Simpan file di dalam /public/Submissions
            $pathToFile = $fileName; // Simpan path file
            $submission->submitted_files = $pathToFile;
        }
    
        // Update atribut-atribut lainnya
        $submission->submission_text = $validatedData['submission_text'];
        $submission->status = $validatedData['status'];
    
        // $submission->update($validatedData);
        $submission->save();

        return redirect()->route('assignment.studentShow', ['course_id' => $course_id, 'assignment' => $assignment])
            ->with('UpdateSuccess', 'Submission berhasil diperbarui');
    }
    
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }
}
