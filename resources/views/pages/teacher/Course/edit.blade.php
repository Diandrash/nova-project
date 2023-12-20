@extends('layout.teacher')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-semibold">Edit Course</span></h1>
        <div class="text-right flex">
            <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
        </div>
    </div>

    <div class="form-area mt-8 w-6/12">
        <form action="/teacher/courses/{{ $course->id }}/edit" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="instructor_id" value={{ auth()->user()->id }}>
            <input type="hidden" name="course_code" value={{ $course->course_code }}>
            <div class="input name mt-6">
                <label for="name" class="block mb-2 text-base font-medium text-gray-900">Course Name</label>
                <input type="text" name="name" value="{{ $course->name }}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-base font-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-3" placeholder="Content Creator Class" required>
            </div>
            <div class="input description mt-6">
                <label for="description" class="block mb-2 text-base font-medium text-gray-900">Assignment description</label>
                <input id="description" type="hidden" value="{{ $course->description }}" name="description">
                <trix-editor input="description" class="h-56 trix-content"></trix-editor>
            </div>


            <button type="submit" class="py-2 w-full px-3 bg-violet-500 hover:bg-violet-700 text-white font-semibold text-base mt-5 mb-5 rounded-full" onclick="location.href='assignmentsTeacher.html'">
                    Update Now
            </button>
        </form>
    </div>
@endsection