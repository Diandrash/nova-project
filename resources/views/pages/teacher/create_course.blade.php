@extends('layout.index')



@section('container')
    <div class="container">
        <h1>Create Course</h1>

        <form action="/teacher/courses" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Course Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your Course name here" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Your course description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
              </div>

              <input type="hidden" name="instructor_id" value={{ auth()->user()->id }}>
              
              <input type="hidden" name="course_code" value="1">

              <button class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection