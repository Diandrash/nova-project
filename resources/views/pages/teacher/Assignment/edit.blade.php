@extends('layout.teacher')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-bold">Edit Assignment</span></h1>
        <div class="text-right flex">
            <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
        </div>
    </div>

    <div class="form-area mt-8 w-6/12">
    <form action="{{ route('assignment.update', ['assignment' => $assignment->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="course_id" value="{{ $course->id }}">
        <div class="input title mt-6">
            <label for="title" class="block mb-2 text-base font-medium text-gray-900">Assignment Name</label>
            <input type="text" name="title" value="{{ $assignment->title }}" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-3 font-semibold" placeholder="Tugas Project Akhir" required>
        </div>
        <div class="input instruction mt-6">
            <label for="instruction" class="block mb-2 text-base font-medium text-gray-900">Assignment Instruction</label>
            <input id="instruction" value="{{ $assignment->description }}" type="hidden" name="description">
            <trix-editor input="instruction" class="h-56 font-medium text-sm"></trix-editor>
        </div>
        <div class="input deadline mt-6">
            <label for="datetime" class="block mb-2 text-base font-medium text-gray-900">Assignment Deadline</label>
            <input type="datetime-local" value="{{ $assignment->deadline }}" name="deadline" id="datetime" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-4 text-sl font-bold" required>
        </div>

        <div class="assignment-attachment mt-7">

            <h1 class="block mb-2 text-base font-medium text-gray-900 mt-3">Attachment :</h1>
            @if ($assignment->files)
            <div class="attachment-item  flex justify-between mt-2 px-5 py-3 w-6/12 bg-gray-200 hover:bg-blue-400 cursor-pointer">
                <div class="file-place self-center"  onclick="window.open('{{ asset('assignments/' . $assignment->files) }}', '_blank');">
                    <div class="text-left self-center flex">
                        <i class="fa-solid fa-paperclip  text-base self-center"></i>
                        <h2 class="text-base font-semibold ml-3 self-center">{{ $assignment->files }}</h2>
                    </div>
                </div>
                <a class="text-right self-center" href="{{ asset('assignments/' . $assignment->files) }}" download>
                    <i class="fa-solid fa-download text-gray-800 hover:text-white cursor-pointer self-center"></i>
                </a>
                
            </div>
        @endif
        
        </div>

        
        <div class="input file- mt-6">
            <label for="file-one" class="block mb-2 text-base font-medium text-gray-900">Assignment Attachment</label>
            <input type="file" name="files" id="file-one" class="bg-gray-50 border border-gray-300 text-gray-900 text-base  focus:ring-blue-500 focus:border-blue-500 block w-full">
        </div>

        <button type="submit" class="py-2 w-full px-3 bg-violet-500 hover:bg-violet-700 text-white font-semibold text-base mt-8 mb-5 rounded-full" onclick="location.href='assignmentsTeacher.html'">
                Submit
        </button>
    </form>
    </div>
@endsection