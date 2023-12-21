@extends('layout.teacher')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-semibold">Edit Material</span></h1>
        <div class="text-right flex">
            <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
        </div>
    </div>



    <div class="form-area mt-8 w-6/12">
        <form action="{{ route('materials.edit', ['material' => $material->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="course_id" value="{{ $material->course_id }}">
            <div class="input title mt-6">
                <label for="title" class="block mb-2 text-base font-medium text-gray-900">Material Name</label>
                <input type="text" name="title" value="{{ $material->title }}" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-base font-semibold rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-3" placeholder="Literasi Big Data" required>
            </div>
    
            <h2 class="block mb-2 mt-6 text-base font-medium text-gray-900">Your Material</h2>
            <div class="work-item flex justify-between px-5 py-3 w-full bg-gray-200 hover:bg-blue-400 cursor-pointer">
                <div class="file-place"  onclick="window.open('{{ asset('materials/' . $material->file_path) }}', '_blank');">
                    <div class="text-left self-center flex">
                        <i class="fa-solid fa-paperclip  text-base self-center"></i>
                        <h2 class="text-base font-semibold ml-3">{{ $material->file_path }}</h2>
                    </div>
                </div>
                <a class="text-right self-center" href="{{ asset('materials/' . $material->file_path) }}" download>
                    <i class="fa-solid fa-download text-gray-800 hover:text-white cursor-pointer"></i>
                </a>   
            </div>

            <div class="input file mt-6">
                <label for="file" class="block mb-2 text-base font-medium text-gray-900">Update Material</label>
                <input type="file" name="file" id="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-xl  focus:ring-blue-500 focus:border-blue-500 block w-full" required>
            </div>
    
    
            <button type="submit" class="py-2 w-full px-3 bg-violet-500 hover:bg-violet-700 text-white font-semibold text-base mt-32 mb-5 rounded-full" >
                    Update Material
            </button>
        </form>
    </div>
@endsection