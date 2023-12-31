@extends('layout.student')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-semibold">All Assignments</span></h1>
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
    
    <div class="relative overflow-x-auto mt-5" data-aos="fade-left"
    data-aos-easing="linear"
    data-aos-duration="1000">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 :text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 :bg-gray-700 :text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-3">
                        No
                    </th>
                    <th scope="col" class="px-3 py-3 text-left">
                        Assignment name
                    </th>
                    <th scope="col" class=" py-3 text-center">
                        Due on
                    </th>
                    <th scope="col" class=" py-3 text-center">
                        Mark
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Status
                    </th>

                </tr>
            </thead>
            <tbody>
                @forelse ($assignments as $index => $assignment)
                @php
                    $icons = ['pen-ruler', 'palette', 'paintbrush', 'scroll'];
                    $colors = ['amber-700', 'violet-500', 'amber-500', 'violet-700'];
                    $randomIcon = $icons[array_rand($icons)];
                    $randomColor = $colors[array_rand($colors)];
                @endphp
                <tr class="bg-gray-100 border-b hover:bg-violet-100 :border-gray-700 cursor-pointer" onclick="location.href='{{ route('assignment.studentShow', ['assignment' => $assignment->id]) }}'">
                    <td class="px-2 py-4">
                    {{ $loop->iteration }}
                    </td>
                    <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                        <div class="flex">
                            <div class="icon px-4 py-3 rounded-full bg-gray-200 md:block hidden">
                                <i class="fa-solid fa-{{ $randomIcon }} text-{{ $randomColor }}"></i>
                            </div>
                            <div class="text md:ml-3 ml-0">
                                <h5 class="text-left text-base font-semibold">{{ $assignment->title }}</h5>
                                <p class="text-left opacity-60 font-normal">{{ $assignment->course->name }}</p>
                            </div>
                        </div>
                    </th>
                    <td class="text-center py-4 whitespace-nowrap px-3 font-medium">
                        @php
                            $deadline = \Carbon\Carbon::parse($assignment->deadline);
                            $formattedDeadline = $deadline->format('j F Y | H:i T');
                        @endphp
                    
                        <h3 class="text-black font-bold ">{{ $formattedDeadline }}</h3>
                    </td>
                    <th scope="row" class="px-6 py-4 font-bold text-base text-green-600 whitespace-nowrap :text-white text-center">
                        @if ($assignment->pivot->mark)
                            {{ $assignment->pivot->mark }}/100 <br>
                        @endif
                        @if (!$assignment->pivot->mark)
                            - <br>
                        @endif                        
                    </th>
                    <td class="px-6 py-4 text-center">
                        @if($assignment->pivot->status == 1)
                            <button type="button" class="py-2 px-7 me-2 mb-2 text-green-500 text-sm font-medium focus:outline-none bg-gray-100 rounded-full border border-green-200 hover:bg-green-100 hover:text-blue-1 focus:z-10 focus:ring-4 focus:ring-green-200 :focus:ring-green-1 :bg-green-800 :text-green-400 :border-green-600 :hover:text-white :hover:bg-green-700">Completed</button>
                        @else
                            <button type="button" class="py-2 px-5 me-2 mb-2 text-red-500 text-sm font-medium focus:outline-none bg-gray-100 rounded-full border border-red-200 hover:bg-red-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-red-200 :focus:ring-red-700 :bg-red-800 :text-red-400 :border-red-600 :hover:text-white :hover:bg-red-700">Uncompleted</button>
                        @endif
                    </td>
                    

                </tr>
                
                @empty
                <!-- Pesan jika materials kosong -->
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500 font-semibold text-base">No Assignments available.</td>
                </tr>
                @endforelse



            </tbody>
        </table>
    </div>

@endsection