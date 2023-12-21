@extends('layout.teacher')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-semibold">Create New Material</span></h1>
        <div class="text-right flex">
            <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
        </div>
    </div>

    <div class="form-area mt-8 w-6/12">
        <form action="/teacher/materials/create" method="post" enctype="multipart/form-data">
            @csrf
            @php
                $courseId = request()->query('courseId');
            @endphp
            <input type="hidden" name="course_id" value="{{ $courseId }}">
            <div class="input title mt-6">
                <label for="title" class="block mb-2 text-base font-medium text-gray-900">Material Name</label>
                <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-base font-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-3" placeholder="Literasi Big Data" required>
            </div>

            <div class="input file mt-6">
                <label for="file" class="block mb-2 text-base font-medium text-gray-900">Material Attachment</label>
                <input type="file" name="file" id="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl  focus:ring-blue-500 focus:border-blue-500 block w-full" required>
            </div>


            <button type="submit" class="py-2 w-full px-3 bg-violet-500 hover:bg-violet-700 text-white font-semibold text-base mt-64 mb-5 rounded-full" onclick="location.href='assignmentsTeacher.html'">
                    Add Material
            </button>
        </form>
    </div>
@endsection