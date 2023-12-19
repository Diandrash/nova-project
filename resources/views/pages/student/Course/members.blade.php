@extends('layout.student')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-semibold">All Members on  <span class="font-bold ml-1"> {{ $course->name }}</span></h1>
        <div class="text-right flex">
            <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
        </div>
    </div>
    <div class="relative overflow-x-auto mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 :text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 :bg-gray-700 :text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-3">
                        No. 
                    </th>
                    <th scope="col" class="px-3 py-3 text-left">
                        Name
                    </th>
                    <th scope="col" class=" py-3 text-left">
                        Instance
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Joined since
                    </th>


                </tr>
            </thead>
            <tbody>
            @foreach ($users as $index => $user)
            <tr class="bg-gray-100 border-b hover:bg-yellow-100 :border-gray-700">
                <td class="px-2 py-4">
                    {{ $loop->iteration }}
                </td>
                <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                    <h2 class="text-base">{{ $user->fullname }}</h2>
                </th>
                <td class="text-left py-4 cursor-pointer">
                    <h3 class="text-amber-500 font-bold text-base">{{ $user->instance }}</h3>
                </td>
                <td class="text-center py-4">
                    @php
                        $joined_at = \Carbon\Carbon::parse($user->created_at);
                        $formattedJoined_at = $joined_at->format('j F Y ');
                    @endphp
                    <h3 class="text-black font-medium text-base">{{ $formattedJoined_at }}</h3>
                </td>
            </tr>
            @endforeach                




            </tbody>
        </table>
    </div>
@endsection