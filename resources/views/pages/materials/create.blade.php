@extends('layout.index')



@section('container')
    <div class="container">
        <h1>Add Material</h1>

        <form action="/teacher/materials" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Material title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Your Title name here" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="file" class="form-label  @error('file') is-invalid @enderror">Your course file</label>
                <input class="form-control" type="file" id="file" name="file">
                @error('file')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

              <input type="hidden" name="course_id" value=6>
              

              <button class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection