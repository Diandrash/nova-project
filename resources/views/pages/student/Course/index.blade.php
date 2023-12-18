@extends('layout.student')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-semibold">My Course</h1>
        <div class="text-right flex">
            <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
        </div>
    </div>

    <div class="course-banner w-full mt-7 mb-3">
        <div class="card h-56 rounded-2xl py-1 bg-amber-300 ">
            <h3 class="ml-5 mt-3 text-3xl font-bold">{{ $course->name }}</h3>
            <p class="ml-5 mt-1 text-xl  font-normal">{{ $course->instructor->fullname }}</p>
        </div>
    </div>

    <div class="course-attributes flex flex-row flex-wrap">
        <div class="attribute flex px-9 mt-3 py-1.5 bg-gray-200 hover:bg-gray-300 rounded-full" onclick="location.href='{{ route('materials.indexStudent', ['courseId' => $course->id]) }}'">
            <i class="fa-solid fa-book text-xl text-violet-500 self-center"></i>
            <h1 class="text-xl font-medium self-center ml-3 cursor-pointer">Materials</h1>
        </div>
        <div class="attribute ml-3 flex px-9 mt-3 py-1.5 bg-gray-200 hover:bg-gray-300 rounded-full" onclick="location.href='assignments.html'">
            <i class="fa-solid fa-book-open text-xl text-violet-500 self-center"></i>
            <h1 class="text-xl font-medium self-center ml-3 cursor-pointer">Assignments</h1>
        </div>
        <div class="attribute ml-3 flex px-9 mt-3 py-1.5 bg-gray-200 hover:bg-gray-300 rounded-full" onclick="location.href='members.html'">
            <i class="fa-solid fa-users text-xl text-violet-500 self-center"></i>
            <h1 class="text-xl font-medium self-center ml-3 cursor-pointer">Members</h1>
        </div>

    </div>

    <div class="course-description mt-10">
        <h1 class="title font-semibold text-base">
            Course Description :
        </h1>

        <p class="mt-1 font-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis ex iure obcaecati? Cumque nesciunt perspiciatis dolores? Alias ab itaque unde. Lorem ipsum dolor sit amet consectetur adipisicing elit. A, deserunt eveniet ipsam ex numquam consequatur consequuntur reprehenderit est aut repellat corrupti explicabo, vel quisquam aperiam eum? Expedita cumque praesentium consectetur?</p>
    </div>

@endsection