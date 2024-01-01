<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function indexTeacher(Request $request)
    {   
        $courseId = $request->input('courseId');
        $course = Course::find($courseId);
        $materials = Material::where('course_id', $courseId)->get();

        return view('pages.teacher.Material.materials', [
            "materials" => $materials,
            "course" => $course,
        ]);
    }
     public function indexStudent(Request $request)
    {   
        $courseId = $request->input('courseId');
        // return $courseId;
        $materials = Material::where('course_id', $courseId)->get();

        return view('pages.student.Material.materials', [
            "materials" => $materials
        ]);
    }

    public function create()
    {
        return view('pages.teacher.Material.create');
    }

    public function store(StoreMaterialRequest $request)
    {
        // return $request; 
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'course_id' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx,pptx,xls,jpg,jpeg,png', // Sesuaikan dengan jenis file yang diizinkan
        ]);
    
        // Upload file materi
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            // $file->storeAs('public/materials', $fileName); // Simpan file ke dalam folder public/materials
            // $file->move('materials', $fileName);
            $file->move(public_path('materials'), $fileName);
        }
    
        // return 1;
        // Simpan data baru ke dalam tabel dengan menyertakan path file
        Material::create([
            'title' => $validatedData['title'],
            'course_id' => $validatedData['course_id'],
            'file_path' => $fileName, // Simpan path file dalam basis data
        ]);
    
        // $courseId = $request->input('courseId');
        Alert::success('Success', 'Material added successfully');
        return redirect()->route('materials.indexTeacher', ['courseId' => $request->course_id]);
    }

    public function show($id)
    {
 
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('pages.teacher.Material.edit', compact('material'));
    }

    public function update(UpdateMaterialRequest $request, $id)
    {
        // Validasi data input dari form jika diperlukan
        // return $request;
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,pptx,xls,jpg,jpeg,png', // Sesuaikan dengan jenis file yang diizinkan
        ]);
    
        // Perbarui data yang ada dalam tabel
        $material = Material::findOrFail($id);
        $material->title = $validatedData['title'];
    
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            Storage::delete('public/materials/' . $material->file_path);
    
            // Simpan file yang baru diupload
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->move('materials', $fileName);
            $material->file_path = $fileName;
        }
    
        $material->save();
    
        Alert::success('Success', 'Material has been Updated');
        return redirect()->route('materials.indexTeacher', ['courseId' => $request->course_id]);
    }
    

    public function destroy($id)
    {
        // Hapus data dari tabel
        $material = Material::findOrFail($id);
    
        // Simpan path file sebelum dihapus dari database
        $filePath = $material->file_path;
    
        // Hapus data dari database
        $material->delete();
    
        // Ubah nama file untuk menangani karakter khusus
        $encodedFilePath = urlencode($filePath);
    
        // Hapus file fisik
        if (Storage::exists('public/materials/' . $encodedFilePath)) {
            Storage::delete('public/materials/' . $encodedFilePath);
        }
    
        Alert::success('Success', 'Material deleted successfully');
        return redirect()->back();
    }
    

}
