@extends('layout.teacher')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-bold">My Course</h1>
        <div class="text-right flex">
            <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
        </div>
    </div>

    <div class="course-banner w-full mt-7 mb-2">
        <div class="card h-56 rounded-2xl py-1 bg-amber-300 ">
            <h3 class="ml-5 text-3xl font-bold self-center mt-3">{{ $course->name }}</h3>
            <p class="ml-5 mt-1 text-base  font-normal">{{ $course->instructor->fullname }}</p>
        </div>
    </div>

    <div class="course-attributes flex flex-row flex-wrap gap-2">
        <div class="attribute edit-course flex px-5 mt-3 py-1.5 bg-amber-400 hover:bg-amber-500 rounded-full" onclick="location.href='/teacher/courses/{{ $course->id }}/edit'">
            <i class="fa-solid fa-pencil text-base text-black self-center"></i>
            <h1 class="text-base font-medium self-center ml-3 cursor-pointer">Edit Course</h1>
        </div>

        <div class="attribute course-code flex px-5 mt-3 py-1.5 bg-blue-500 hover:bg-blue-700 rounded-full" onclick="location.href='/teacher/courses/{{ $course->id }}/code'">
            <i class="fa-solid fa-puzzle-piece text-base text-white self-center"></i>
            <h1 class="text-base text-white font-medium self-center ml-3 cursor-pointer">Course Code</h1>
        </div>
        <div class="attribute materials flex px-5 mt-3 py-1.5 bg-violet-500 hover:bg-violet-700 rounded-full" onclick="location.href='{{ route('materials.indexTeacher', ['courseId' => $course->id]) }}'">
            <i class="fa-solid fa-book text-base text-white self-center"></i>
            <h1 class="text-base text-white font-medium self-center ml-3 cursor-pointer">Materials</h1>
        </div>
        <div class="attribute assignments flex px-5 mt-3 py-1.5 bg-amber-300 hover:bg-amber-500 rounded-full" onclick="location.href='{{ route('assignment.index', ['course' => $course->id, 'courseId' => $course->id]) }}'">
            <i class="fa-solid fa-book-open text-base text-black self-center"></i>
            <h1 class="text-base text-black font-medium self-center ml-3 cursor-pointer">Assignments</h1>
        </div>
        <div class="attribute members flex px-5 mt-3 py-1.5 bg-violet-200 hover:bg-violet-300 rounded-full" onclick="location.href='{{ route('course.members', ['course' => $course->id, 'courseId' => $course->id]) }}'">
            <i class="fa-solid fa-users text-base text-black self-center"></i>
            <h1 class="text-base font-medium self-center ml-3 cursor-pointer">Members</h1>
        </div>
        <div class="attribute delete-course flex px-5 mt-3 py-1.5 bg-red-500 hover:bg-red-700 rounded-full" onclick="location.href=''">
            <i class="fa-solid fa-trash text-base text-white self-center"></i>
            <h1 class="text-base text-white font-medium self-center ml-3 cursor-pointer">Delete</h1>
        </div>
    </div>

    <div class="course-description mt-7">
        <h1 class="title font-semibold text-base">
            Course Description :
        </h1>

        <p class="mt-1 font-normal">{{ $course->description }}</p>
    </div>
@endsection