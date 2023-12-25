@extends('layout.student')

@section('container')
<div class="welcome-text main flex justify-between">
    <h1 class="text-2xl font-semibold">Result Course</h1>
    <div class="text-right flex">
        @php
            $timezone = new DateTimeZone('Asia/Jakarta');
            $date = new DateTime('now', $timezone);
            $formattedDate = $date->format('l, d F Y ');
        @endphp
        <h1 class="text-base opacity-70 font-medium self-center md:block hidden">{{ $formattedDate }}</h1>
        <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900 md:block hidden" name="chevron-back-outline"></ion-icon>
        <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900 md:block hidden" name="chevron-forward-outline"></ion-icon>
    </div>

</div>


<div class="result-area flex flex-col mt-10 items-center h-screen">
    <div class="course-card w-full h-96 mb-3">
        @foreach ($courses as $course)
            @php
                $colors = ['amber', 'violet', 'amber', 'violet'];
                $code = ['300', '500', '700'];
                $randomColor = $colors[array_rand($colors)];
                $randomCode = $code[array_rand($code)];
            @endphp
            <div class="card rounded-2xl py-1 bg-{{ $randomColor }}-{{ $randomCode }} hover:bg-{{ $randomColor }}-{{ $randomCode }}">
                <h3 class="ml-5 mt-3 text-4xl font-bold @if ($randomColor == 'violet') text-white @else text-black @endif">{{ $course->name }}</h3>
                <p class="ml-5 mt-1 text-xl  font-normal">{{ $course->instructor->fullname }}</p>

                <form action="/student/courses/join" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="course_id" value="{{ $course->id }}">

                    <button  type="submit" class=" mt-72 ml-5 py-3 px-16 me-2 mb-2 text-sm font-black text-black focus:outline-none bg-white opacity-80 rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 :focus:ring-gray-700 :bg-gray-800 :text-gray-400 :border-gray-600 :hover:text-white :hover:bg-gray-700">Join Course</button>
                </form>
            </div>
        @endforeach
    </div>
</div>


@endsection

