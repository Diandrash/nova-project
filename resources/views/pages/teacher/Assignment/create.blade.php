@extends('layout.index')

@section('container')
<div class="container">
    <h1 class="mt-3 mb-3">Create Assignment</h1>

    <form action="/teacher/assignments/create" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Assignment Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Assignment Title" value="{{ old('title') }}">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="datetime-local" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" value="{{ old('deadline') }}">
            @error('deadline')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="files" class="form-label">Attachment</label>
            <input type="file" class="form-control" id="files" name="files">
        </div>

        @php
            $courseId = request('courseId');    
        @endphp
        <input type="hidden" name="course_id" value="{{ $courseId }}">

        <button type="submit" class="btn btn-primary">Create Assignment</button>
    </form>
</div>
@endsection
