@extends('layout.teacher')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-bold">Create New Assignment</span></h1>
        <div class="text-right flex">
            <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
        </div>
    </div>

    <div class="form-area mt-8 w-6/12">
    <form action="" method="post">
        <div class="input title mt-6">
            <label for="title" class="block mb-2 text-base font-medium text-gray-900">Assignment Name</label>
            <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-3" placeholder="Tugas Project Akhir" required>
        </div>
        <div class="input instruction mt-6">
            <label for="instruction" class="block mb-2 text-base font-medium text-gray-900">Assignment Instruction</label>
            <input id="instruction" value="Kerjakan dengan benar" type="hidden" name="description">
            <trix-editor input="instruction" class="h-56"></trix-editor>
        </div>
        <div class="input deadline mt-6">
            <label for="datetime" class="block mb-2 text-base font-medium text-gray-900">Assignment Deadline</label>
            <input type="datetime-local" name="deadline" id="datetime" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-4 text-sl font-bold" required>
        </div>

        <div class="input file-one mt-6">
            <label for="file-one" class="block mb-2 text-base font-medium text-gray-900">Assignment Attachment</label>
            <input type="file" name="file-one" id="file-one" class="bg-gray-50 border border-gray-300 text-gray-900 text-base  focus:ring-blue-500 focus:border-blue-500 block w-full">
        </div>
        <div class="input file-two mt-3 mb-8">
            <input type="file" name="file-two" id="file-two" class="bg-gray-50 border border-gray-300 text-gray-900 text-base  focus:ring-blue-500 focus:border-blue-500 block w-full">
        </div>

        <button type="submit" class="py-2 w-full px-3 bg-violet-500 hover:bg-violet-700 text-white font-semibold text-base mt-8 mb-5 rounded-full" onclick="location.href='assignmentsTeacher.html'">
                Submit
        </button>
    </form>
    </div>
@endsection