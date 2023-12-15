@extends('layout.index')

@section('container')
    <div class="container">
        <h1 class="mt-3 mb-5">Join The Course</h1>
        @foreach ($courses as $course)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{ $course->name }}</h5>
              <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
              <p class="card-text">{{ $course->text }}</p>
              
              <form action="/enrollment" method="post">
                @csrf
                <input type="hidden" name="user_id" value={{ auth()->user()->id }}>
                <input type="hidden" name="course_id" value={{ $course->id }}>

                  <button type="submit" class="btn btn-primary mt-3">Join Course</button>
              </form>
            </div>
          </div>
        @endforeach
    </div>
@endsection