@extends('layout.teacher')

@section('container')

<div class="welcome-text main flex justify-between">
    <h1 class="text-2xl font-semibold">Assignment Details</h1>
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

<div class="assignment-title w-full mt-7 mb-3">
    <div class="text-top flex  flex-wrap justify-between">
        <div class="text-left">
            <h1 class="font-bold text-3xl">{{ $assignment->title }}</h1>
        </div>
        
        <button type="button" class="py-2 md:self-center md:w-auto w-48  self-left md:me-10 me-0 px-7 text-white text-sm font-medium focus:outline-none bg-violet-500 rounded-full border hover:shadow-lg hover:bg-violet-700 cursor-pointer" onclick="location.href='{{ route('submission.index', ['assignmentId' => $assignment->id, 'assignment' => $assignment->id]) }}'">Show Submission</button>
        
        <div class="text-right md:self-center self-left md:mt-0 mt-4">
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
    <h3 class="font-semibold text-medium mt-2 opacity-70">{{ $assignment->course->name }}</h3>
</div>

<div class="assignment-instruction mt-7 w-10/12">
    <h1 class="text-sm opacity-70 mt-3">Instructions :</h1>
    <p>{!! $assignment->description !!}</p>
</div>

<div class="assignment-attachment mt-7">

    <h1 class="text-sm opacity-70 mt-3">Attachment :</h1>

    @if ($assignment->files)
        <div class="attachment-item  flex justify-between mt-2 px-5 py-3 md:w-6/12 w-full bg-gray-200 hover:bg-blue-400 cursor-pointer">
            <div class="file-place self-center"  onclick="window.open('{{ $assignment->files }}', '_blank');">
                <div class="text-left self-center flex">
                    <i class="fa-solid fa-paperclip  text-base self-center"></i>
                    <h2 class="text-base font-semibold ml-3 self-center">{{ $assignment->file_name }}</h2>
                </div>
            </div>
            <a class="text-right self-center" href="{{ $assignment->files }}" download>
                <i class="fa-solid fa-download text-gray-800 hover:text-white cursor-pointer self-center"></i>
            </a>
            
        </div>
    @endif

</div>
@endsection