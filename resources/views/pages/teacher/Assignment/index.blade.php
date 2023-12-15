@extends('layout.index')

@section('container')
@if (session()->has('AddSuccess'))
    <div class="alert alert-success">
        {{ session('AddSuccess') }}
    </div>
@endif

@if (session()->has('DeleteSuccess'))
    <div class="alert alert-success">
        {{ session('DeleteSuccess') }}
    </div>
@endif

    <div class="container">
        
        <h1 class="mt-2">My Assignments</h1>
        @php
            $courseId = request('courseId');
        @endphp
        <button class="btn-secondary btn" onclick="location.href='/teacher/assignments/create?courseId={{ $courseId }}'">Add Assignment</button>

        <div class="row mt-3  ">
            @foreach ($assignments as $assignment)
                
                <div class="col-sm-4 mb-3 mb-sm-4">
                    <div class="card">
                        <img  src="https://images.unsplash.com/photo-1516383607781-913a19294fd1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2074&q=80" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{ $assignment->title }}</h4>
                            <div class="row d-flex">
                                <a href="/teacher/assignments/{{ $assignment->id }}" class="col-6 btn btn-primary mt-4">Show Assignment</a>
                                <button class="col-2 mt-4 ms-1 btn btn-warning disabled"><ion-icon name="pencil-outline"></ion-icon></button>
                                <form action="{{ route('assignment.destroy', ['courseId' => $courseId, 'assignment' => $assignment->id]) }}" method="POST">
                                    @method('delete')
                                    <button class="col-2 mt-4 ms-1 btn btn-danger" type="submit" onclick="confirm('Are you Sure to Delete?')"><ion-icon name="trash"></ion-icon></button>
                                </form>
                            </div>
                            <p class="mt-1">Due on {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $assignment->deadline)->format('d F Y H:i') }}</p>
                        </div>
                    </div>
                </div>

            @endforeach 

        </div>

@endsection