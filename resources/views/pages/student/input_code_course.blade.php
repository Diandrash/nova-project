@extends('layout.index')

@section('container')

  

    <div class="container">
        <h1 class="mt-5">Join a Course</h1>

        <form action="/student/get_course" method="POST">
            @csrf
            <div class="row">
                <div class="col-4 mt-3">
                    <div class="mb-3">
                        <label for="course_code" class="form-label">Course Code</label>
                        <input type="number" maxlength="6" minlength="6" class="form-control" id="course_code" placeholder="6 Digits Course Code" name="course_code">
                    </div>
                </div>
            </div>
            

            <button type="submit" class="btn btn-primary mt-5">Submit</button>
        </form>
    </div>
@endsection