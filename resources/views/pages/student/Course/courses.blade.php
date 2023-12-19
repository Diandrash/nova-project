@extends('layout.student')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-semibold">All Courses</span></h1>
        <div class="text-right flex">
            <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
        </div>
    </div>

    <div class="courses-cards flex flex-wrap justify-start gap-5 mt-7 ">

        <div class="join-card course-card w-80 h-48 px-1 mb-2 ">
            <div class="card rounded-2xl border-dashed border-2 border-violet-300 hover:border-violet-700 flex flex-col justify-center items-center py-14 bg-gray-100 hover:bg-gray-200" onclick="location.href='{{ route('courses.join') }}'">
                <i class="fa-solid fa-plus text-3xl" style="color: #8d12f3;"></i>
                <h1 class="text-base font-semibold text-violet-700 hover:text-violet-900 mt-3">Join a Course</h1>
            </div>
        </div>

        @foreach ($courses as $index => $course)
            @php
                $colors = ['amber-300', 'violet-500', 'amber-500', 'violet-700'];
                $colorIndex = $index % count($colors);
                $currentColor = $colors[$colorIndex];
            @endphp
            <div class="course-card w-80 h-48 mb-3 cursor-pointer" onclick="location.href='/student/courses/{{ $course->id }}'">
                <div class="card rounded-2xl py-1 bg-{{ $currentColor }} hover:bg-{{ $currentColor }}">
                    <h3 class="ml-5 mt-3 text-xl @if ($currentColor == 'violet-500' || $currentColor == 'violet-700') text-white @else text-gray-900 @endif font-bold">{{ $course->name }}</h3>
                    <p class="ml-5 mt-1 text-base @if ($currentColor == 'violet-500' || $currentColor == 'violet-700') text-slate-300 @else font-normal @endif">{{ $course->instructor->fullname }}</p>

                    <button type="button" class=" mt-16 ml-5 py-1.5 px-8 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white opacity-80 rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 :focus:ring-gray-700 :bg-gray-800 :text-gray-400 :border-gray-600 :hover:text-white :hover:bg-gray-700">Explore</button>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        // Cek apakah parameter clearHistory ada
        if ({{ session('clearHistory') }} === true) {
            alert('halo')
            // Bersihkan riwayat navigasi
            window.history.replaceState({}, document.title, "/");
        }
    </script>

@endsection