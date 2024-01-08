@extends('layout.student')

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
    <div class="text-top flex flex-wrap justify-between">
        <div class="text-left">
            <h1 class="font-bold text-3xl">{{ $assignment->title }}</h1>
            <h3 class="font-semibold text-medium opacity-70 md:mt-0 mt-1">{{ $assignment->course->name }}</h3>
        </div>

        <div class="text-right self-center md:mt-0 mt-3">
            <div class="text-deadline flex">
                <i class="fa-solid fa-bell text-sm text-blue-600 self-center"></i>
                @php
                    $deadline = \Carbon\Carbon::parse($assignment->deadline);
                    $formattedDeadline = $deadline->format('j F Y | H:i T');
                @endphp
                <h2 class="font-medium text-sm text-blue-600 self-center ml-2">Closing on {{ $formattedDeadline }}</h2>
            </div>
            @if ($submission->status == 1)                
                <div class="text-submiited flex mt-2">
                    <i class="fa-solid fa-check text-sm text-green-500 self-center"></i>
                    @php
                        $completed = \Carbon\Carbon::parse($submission->updated_at);
                        $formattedCompleted = $completed->format('j F Y | H:i T');
                    @endphp
                    <h2 class="font-medium text-sm text-green-500 self-center ml-2">Turned in {{ $formattedCompleted }}</h2>
                </div>
            @endif
            
        </div>
    </div>
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

    <div class="attachment-work mt-5">
    <h1 class="text-sm opacity-70 mt-3">Your Work :</h1>

        {{-- JIka Belum mengumpulkan tugas --}}
        @if ($submission->status == 0)
            <h1 class="text-title text-sm opacity-70 mt-3">Upload your work here</h1>
            <form action="{{ route('assignment.studentUpdate', ['assignment' => $assignment->id, 'submission' => $submission->id]) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <input class="mt-3 w-6/12 border" type="file" name="submitted_files"> <br>
                <input type="hidden" name="user_id" value={{ auth()->user()->id }}>
                <input type="hidden" name="assignment_id" value={{ $assignment->id }}>
                <input type="hidden" name="status" value="1">
                <button class="py-1 w-6/12 mt-10 rounded-2xl text-base font-semibold text-white bg-violet-500 hover:bg-violet-200">
                    Submit
                </button>
            </form>
        @endif

        @if ($submission->status == 1)
            <div class="work-item  flex justify-between mt-2 px-5 py-3 md:w-6/12 w-full bg-gray-200 hover:bg-blue-400 cursor-pointer">
                <div class="file-place"  onclick="window.open('{{$submission->submitted_files }}', '_blank');">
                    <div class="text-left self-center flex">
                        <i class="fa-solid fa-paperclip  text-base self-center"></i>
                        <h2 class="text-base font-semibold ml-3">{{ $submission->submitted_filename }}</h2>
                    </div>
                </div>
                <a class="text-right self-center" href="{{ asset('assignments/' . $assignment->files) }}" download>
                    <i class="fa-solid fa-download text-gray-800 hover:text-white cursor-pointer"></i>
                </a>
                
            </div>
            <h1 class="text-title text-sm opacity-70 mt-2">Update your work here</h1>
            <form action="{{ route('assignment.studentUpdate', ['assignment' => $assignment->id, 'submission' => $submission->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input class="mt-3 md:w-6/12 w-full border text-base" type="file" name="submitted_files"> <br>
                    <input type="hidden" name="user_id" value={{ auth()->user()->id }}>
                    <input type="hidden" name="assignment_id" value={{ $assignment->id }}>
                    <input type="hidden" name="status" value="1">
                    <button class="md:py-1 py-3 md:w-6/12 w-full mt-10 rounded-2xl text-base font-semibold text-white bg-violet-500 hover:bg-violet-200">
                        Update your work
                    </button>
            </form>
        @endif



    </div>
</div>
@endsection