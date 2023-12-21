@extends('layout.teacher')

@section('container')

<div class="welcome-text main flex justify-between">
    <h1 class="text-2xl font-semibold">Assignment Details</h1>
    <div class="text-right flex">
        <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
        <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
        <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
    </div>
</div>

<div class="assignment-title w-full mt-7 mb-3">
    <div class="text-top flex flex-wrap justify-between">
        <div class="text-left">
            <h1 class="font-bold text-3xl">{{ $assignment->title }}</h1>
            <h3 class="font-semibold text-medium  opacity-70">{{ $assignment->course->name }}</h3>
        </div>

        <div class="text-right self-center">
            <div class="text-deadline flex">
                <i class="fa-solid fa-bell text-sm text-blue-600 self-center"></i>
                @php
                    $deadline = \Carbon\Carbon::parse($assignment->deadline);
                    $formattedDeadline = $deadline->format('j F Y | H:i T');
                @endphp
                <h2 class="font-medium text-sm text-blue-600 self-center ml-2">Closing on {{ $formattedDeadline }}</h2>
            </div>

            
        </div>
    </div>
</div>

<div class="assignment-instruction mt-7 w-10/12">
    <h1 class="text-sm opacity-70 mt-3">Instructions :</h1>
    <p>{{ $assignment->description }}</p>
</div>

<div class="assignment-attachment mt-7">

    <h1 class="text-sm opacity-70 mt-3">Attachment :</h1>
    <div class="attachment-item  flex justify-between mt-2 px-5 py-3 w-6/12 bg-gray-200 hover:bg-blue-400 cursor-pointer">
        <div class="file-place"  onclick="window.open('{{ asset('assignments/' . $assignment->files) }}', '_blank');">
            <div class="text-left self-center flex">
                <i class="fa-solid fa-paperclip  text-base self-center"></i>
                <h2 class="text-base font-semibold ml-3">{{ $assignment->files }}</h2>
            </div>
        </div>
        <a class="text-right self-center" href="{{ asset('assignments/' . $assignment->files) }}" download>
            <i class="fa-solid fa-download text-gray-800 hover:text-white cursor-pointer"></i>
        </a>
        
    </div>

</div>
@endsection