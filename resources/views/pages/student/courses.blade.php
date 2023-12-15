@extends('layout.index')

@section('container')

<div class="container mt-2">
    
    @if (session()->has('success'))
        <div class="alert alert-success">
            Sukses ditambahkan
        </div>
    @endif

    @if (session()->has('joinSuccess'))
        <div class="alert alert-success">
            Sukses bergabung
        </div>
    @endif

    <div class="row d-flex">
        <div class="d-flex text-primary col" onclick="history.back()">
            <ion-icon class="align-self-center" name="chevron-back-outline"></ion-icon>
            <h6 style="cursor: pointer" class="align-self-center mb-0 ms-1">Back</h6>
        </div>
    </div>
    <h1 class="mt-2 mb-4">All Courses</h1>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($courses as $course)
        <div class="col mt-5" onclick="location.href='/student/courses/{{ $course->id }}'">
                <div class="card">
                    <img src="https://www.codingem.com/wp-content/uploads/2021/10/juanjo-jaramillo-mZnx9429i94-unsplash-1024x683.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <a href="/student/courses/{{ $course->id }}" class="card-title"> {{ $course->name }} </a>
                    </div>
                </div>
            </div>
            @endforeach     
        
    </div>

</div>

@endsection