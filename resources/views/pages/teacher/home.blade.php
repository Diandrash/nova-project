
@extends('layout.teacher')

@section('container')


    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-semibold">Welcome, <span class="font-bold">{{ auth()->user()->fullname }}</span></span></h1>
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

    <div class="course-cards flex flex-wrap justify-start gap-5" data-aos="fade-left">
        @forelse ($courses as $index => $course)
            @php
                $icons = ['fan', 'sun', 'star', 'cloud', 'bolt', 'snowflake'];
                $colors = ['blue-500', 'violet-400', 'amber-400', 'violet-600'];
                // Menggabungkan dan mengacak array ikon dan warna
                shuffle($icons);
                shuffle($colors);

                $randomIcon = $icons[0];
                $randomColor = $colors[0];
            @endphp
            <div class="card md:w-60 w-full h-80 rounded-3xl shadow-xl mt-5 bg-{{ $randomColor }}" onclick="location.href='/teacher/courses/{{ $course->id }}'">
                <div class="content ml-6 mt-5 ">
                    <div class="relative inline-flex items-center justify-center w-12 mt-3 h-12 overflow-hidden bg-gray-100 rounded-full ">
                        <i class="fa-solid fa-{{ $randomIcon }}" alt=""></i>
                    </div>
                    <h2 class="mt-3 font-bold text-lg @if ($randomColor == 'violet-400' || $randomColor == 'violet-600') text-white @else text-black @endif">{{ $course->name }}</h2>

                    <h3 class="mt-28 font-medium text-base">Submission</h3>
                    <div class="progress-bar flex flex-row mt-3 gap-2">
                        <div class="bar w-14 bg-white rounded-full h-1.5 mb-4 "></div>
                        <div class="bar w-14 bg-white rounded-full h-1.5 mb-4 "></div>
                        <div class="bar w-14 bg-white rounded-full h-1.5 mb-4 opacity-50"></div>
                    </div>
                </div>
            </div>   
            
        @empty
        <div class="card w-60 h-80 rounded-3xl shadow-xl mt-5 bg-transparent hover:bg-gray-200 border-2 border-amber-500 border-dashed cursor-pointer" onclick="location.href='{{ route('courses.join') }}'">
            <div class="content flex flex-col items-center justify-center pb-8 h-full">
                <div class="relative inline-flex items-center justify-center w-12 mt-3 h-12  overflow-hidden rounded-full ">
                    <i class="fa-solid fa-plus text-5xl text-amber-500"></i>
                </div>
                <h2 class="mt-5 font-bold text-lg">Join a Course</h2>

                
            </div>
        </div>    
        
        @endforelse


    </div>

    <div class="assignments-cards md:mt-10 mt-5" data-aos="fade-up">
        <h1 class="md:text-2xl text-xl font-semibold">My Assignments</h1>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 :text-gray-400 mt-3">
                <tbody>
                    @foreach ($assignments as $assignment)
                    <tr class="bg-gray-100 border-b hover:bg-violet-200 :border-gray-700" >
                        <th scope="row" class="pr-6 py-4 font-bold md:text-base text-xs text-gray-900 whitespace-nowrap :text-white px-2">
                            {{ $loop->iteration }} <br>
                        </th>
                        <th scope="row" class="px-6 py-4 font-bold md:text-base text-sm text-gray-900 whitespace-nowrap :text-white" onclick="location.href='{{ route('assignment.teacherShow', ['assignment' => $assignment->id]) }}'">
                            {{ $assignment->title }} <br>
                        </th>
                        <td class=" py-4 text-center" onclick="location.href='{{ route('assignment.teacherShow', ['assignment' => $assignment->id]) }}'">
                            @php
                                $deadline = \Carbon\Carbon::parse($assignment->deadline);
                                $formattedDeadline = $deadline->format('j F Y | H:i T');
                            @endphp
                            <span class="font-medium opacity-50 text-sm whitespace-nowrap px-3 font-medium">
                                {{ $formattedDeadline }}
                            </span>
                        </td>
                        <td class="show-submission px-6 py-4 text-center">
                            <button type="button" class="py-2 md:px-7 px-14 me-2 mb-2 text-black md:text-sm text-xs font-medium focus:outline-none bg-amber-300 rounded-full border hover:shadow-lg hover:bg-amber-500 cursor-pointer whitespace-nowrap" onclick="location.href='{{ route('submission.index', ['assignmentId' => $assignment->id, 'assignment' => $assignment->id]) }}'">Show Submission</button>
                        </td>
    
                    </tr>
                        
                    @endforeach

                </tbody>
            </table>
            <div class="text-more flex justify-center text-base font-semibold mt-3 text-blue-800 hover:text-blue-600 cursor-pointer">
                <h2 onclick="location.href='/student/assignments'">View All Assignments</h2>
            </div>
        </div>
    </div>

    @if (session()->has('loginSuccess'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    },
                });

                // Display the Toast with success icon and the session message
                Toast.fire({
                    icon: 'success',
                    title: '{{ session('loginSuccess') }}',
                });
            });
        </script>
        {{-- Clear the session value to avoid displaying the same message on subsequent requests --}}
        @php
            session()->forget('loginSuccess');
        @endphp
    @endif


@endsection