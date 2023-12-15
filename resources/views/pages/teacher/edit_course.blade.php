@extends('layout.index')



@section('container')
    <div class="container mt-3">
        <h1 class="mb-5">Edit Course</h1>

        <form action="/teacher/courses/{{ $course->id }}" method="post">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Course Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your Course name here" value="{{ old('name' , $course->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Your course description</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ $course->description }}</textarea>
              </div>

              <input type="hidden" name="instructor_id" value={{ auth()->user()->id }}>
              
              <input type="hidden" name="course_code" value="{{ $course->course_code}}">

              <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    </div>
@endsection