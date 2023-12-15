@extends('layout.index')

@section('container')
<div class="container">
    <h1 class="mt-3 mb-3">{{ $course->name }}</h1>
    <h6>Course Code : {{ $course->course_code }}</h6>

    <div class="row">
        <form method="GET" action="{{ route('materials.index') }}" class="col-2">
            @csrf
            <input type="hidden" name="courseId" value="{{ $course->id }}">
            <button class="btn btn-success mb-4" type="submit">Show Materials</button>
        </form>
        <button class="btn btn-primary mb-4 col-2" onclick="location.href='/teacher/materials/create'">Add Materials</button>


        <form method="GET" action="{{ route('course.show-users', ['course_id' => $course->id]) }}" class="col-2">
            @csrf
            <input type="hidden" name="courseId" value="{{ $course->id }}">
            <button class="btn btn-success mb-4" type="submit">Show Users</button>
        </form>


        <form method="GET" action="{{ route('assignment.index', ['course_id' => $course->id]) }}" class="col-2">
            @csrf
            <input type="hidden" name="courseId" value="{{ $course->id }}">
            <button class="btn btn-warning mb-4" type="submit">Assignments</button>
        </form>

        
    </div>

    <img src="https://www.codingem.com/wp-content/uploads/2021/10/juanjo-jaramillo-mZnx9429i94-unsplash-1024x683.jpg" alt="" style="width: 40rem;">

    <h3 class="mt-4 mb-2">Course description</h3>
    <p class="col-10">{{ $course->description }}</p>
</div>
@endsection
