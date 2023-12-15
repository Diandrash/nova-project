<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMaterialRequest;
use App\Http\Requests\UpdateMaterialRequest;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {   
        $courseId = $request->input('courseId');
        $materials = Material::where('course_id', $courseId)->get();

        return view('pages.materials.index', [
            "materials" => $materials
        ]);
    }

    public function create()
    {
        return view('pages.materials.create');
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
            $file->move('materials', $fileName);
        }
    
        // Simpan data baru ke dalam tabel dengan menyertakan path file
        Material::create([
            'title' => $validatedData['title'],
            'course_id' => $validatedData['course_id'],
            'file_path' => $fileName, // Simpan path file dalam basis data
        ]);
    
        $courseId = $request->input('courseId');
        return redirect()->route('materials.index', ['courseId' => $request->course_id])->with('success', 'Material berhasil ditambahkan');
    }

    public function show($id)
    {
        $material = Material::findOrFail($id);
        return view('materials.show', compact('material'));
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('materials.edit', compact('material'));
    }

    public function update(UpdateMaterialRequest $request, $id)
    {
        // Validasi data input dari form jika diperlukan
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            // Sesuaikan dengan atribut-atribut lain yang perlu divalidasi
        ]);

        // Perbarui data yang ada dalam tabel
        $material = Material::findOrFail($id);
        $material->update($validatedData);

        return redirect()->route('materials.index')->with('success', 'Material berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus data dari tabel
        $material = Material::findOrFail($id);
        $material->delete();

        return redirect()->route('materials.index')->with('success', 'Material berhasil dihapus');
    }
}
