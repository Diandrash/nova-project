
@extends('layout.student')

@section('container')


    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-semibold">Welcome, <span class="font-bold">{{ auth()->user()->fullname }}</span></span></h1>
        <div class="text-right flex">
            <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
        </div>

    </div>

    <div class="course-cards flex flex-wrap justify-start gap-5">
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
            <div class="card w-60 h-80 rounded-3xl shadow-xl mt-5 bg-{{ $randomColor }}" onclick="location.href='/student/courses/{{ $course->id }}'">
                <div class="content ml-6 mt-5 ">
                    <div class="relative inline-flex items-center justify-center w-12 mt-3 h-12 overflow-hidden bg-gray-100 rounded-full ">
                        <i class="fa-solid fa-{{ $randomIcon }}" alt=""></i>
                    </div>
                    <h2 class="mt-3 font-bold text-lg @if ($randomColor == 'violet-400' || $randomColor == 'violet-600') text-white @else text-black @endif">{{ $course->name }}</h2>

                    <h3 class="mt-28 font-medium text-base">Progress</h3>
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

    <div class="assignments-cards mt-10">
        <h1 class="text-2xl font-semibold">My Assignments</h1>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 :text-gray-400 mt-3">
                <tbody>
                    @foreach ($assignments as $assignment)
                    <tr class="bg-gray-100 border-b hover:bg-violet-200 :border-gray-700" onclick="location.href='{{ route('assignment.studentShow', ['assignment' => $assignment->id]) }}'">
                        <th scope="row" class="pr-6 py-4 font-bold text-base text-gray-900 whitespace-nowrap :text-white px-2">
                            {{ $loop->iteration }} <br>
                        </th>
                        <th scope="row" class="px-6 py-4 font-bold text-base text-gray-900 whitespace-nowrap :text-white">
                            {{ $assignment->title }} <br>
                        </th>
                        <td class="px-6 py-4 text-center">
                            @php
                                $deadline = \Carbon\Carbon::parse($assignment->deadline);
                                $formattedDeadline = $deadline->format('j F Y | H:i T');
                            @endphp
                            <span class="font-medium opacity-50 text-sm">
                                {{ $formattedDeadline }}
                            </span>
                        </td>
                        <th scope="row" class="px-6 py-4 font-bold text-base text-green-500 whitespace-nowrap :text-white">
                            {{ $assignment->pivot->mark }}/100 <br>
                        </th>
                        <td class="px-6 py-4 text-center    ">
                            @if ($assignment->pivot->status == 1)
                                <button type="button" class="text-green-600 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Has Completed</button>
                            @endif
                            @if ($assignment->pivot->status == 0)
                                <button type="button" class="text-red-600 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800">Not Completed</button>
                            @endif
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