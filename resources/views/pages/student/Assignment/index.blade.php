@extends('layout.index')

@section('container')
@if (session()->has('AddSuccess'))
    <div class="alert alert-success">
        {{ session('AddSuccess') }}
    </div>
@endif
    <div class="container mt-2">
        <div class="row d-flex">
            <div class="d-flex text-primary col" onclick="history.back()">
                <ion-icon class="align-self-center" name="chevron-back-outline"></ion-icon>
                <h6 style="cursor: pointer" class="align-self-center mb-0 ms-1">Back</h6>
            </div>

            
        </div>
        <h1 class="mt-2">My Assignments</h1>
        @php
            $courseId = request('courseId');
            $course = App\Models\Course::find($courseId)
        @endphp

        <h6 class="text-primary mt-3">{{ $course->name }} Course</h6>
        <div class="row mt-3  ">
            @foreach ($assignments as $assignment)
                
                <div class="col-sm-4 mb-3 mb-sm-4">
                    <div class="card" onclick="location.href='{{ route('assignment.studentShow', ['course_id' => $courseId, 'assignment' => $assignment->id]) }}'">
                        <img  src="https://images.unsplash.com/photo-1516383607781-913a19294fd1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2074&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{ $assignment->title }}</h4>
                            <a href="{{ route('assignment.studentShow', ['course_id' => $courseId, 'assignment' => $assignment->id]) }}" class="btn btn-primary mt-4">Show Assignment</a>
                            
                            <p class="mt-1">Due on {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $assignment->deadline)->format('d F Y H:i') }}</p>
                        </div>
                    </div>
                </div>

            @endforeach 

        </div>

@endsection