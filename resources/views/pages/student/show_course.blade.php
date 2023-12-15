@extends('layout.index')

@section('container')
    <div class="container mt-2">
        <div class="row d-flex">
            <div class="d-flex text-primary col" onclick="history.back()">
                <ion-icon class="align-self-center" name="chevron-back-outline"></ion-icon>
                <h6 style="cursor: pointer" class="align-self-center mb-0 ms-1">Back</h6>
            </div>
        </div>
    <h1 class="mt-2 mb-3">{{ $course->name }}</h1>    

    <div class="row d-flex">
        
        <div class="col">
            <form method="GET" action="{{ route('materials.index') }}" >
                @csrf
                <input type="hidden" name="courseId" value="{{ $course->id }}">
                <button class="btn btn-success mb-4" type="submit">Show Materials</button>
            </form>
        </div>
        
        {{-- {{ $course->id }} --}}
        <div class="col-10">
            <a class="btn btn-primary" href="{{ route('assignment.indexStudent', ['courseId' => $course->id, 'course_id' => $course->id]) }}">My Assignments</a>
        </div>
    </div>

    <img src="https://www.codingem.com/wp-content/uploads/2021/10/juanjo-jaramillo-mZnx9429i94-unsplash-1024x683.jpg" alt="" style="width: 40rem;">

    <h3 class="mt-4 mb-2">Course description</h3>
    <p class="col-10">{{ $course->description }}</p>
    </div>    
@endsection