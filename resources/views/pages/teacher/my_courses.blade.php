@extends('layout.index')

@section('container')


@if (session()->has('successUpdate'))
    <div class="alert alert-success">
        Berhasil Diupdate    
    </div>    
@endif

@if (session()->has('successCreate'))
    <div class="alert alert-success">
        Berhasil Ditambahkan    
    </div>    
@endif

@if (session()->has('successDelete'))
    <div class="alert alert-success">
        Berhasil Dihapus    
    </div>    
@endif

<div class="container">
    <h1 class="mt-4 mb-4">All My Courses</h1>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($courses as $course)
        <div class="col mt-5">
                <div class="card">
                    <img src="https://www.codingem.com/wp-content/uploads/2021/10/juanjo-jaramillo-mZnx9429i94-unsplash-1024x683.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> {{ $course->name }} </h5>
                        <div class="mt-3">
                            <button class="btn btn-warning" onclick="location.href='/teacher/courses/{{ $course->id }}/edit';">Edit</button>
                            <button class="btn btn-success" onclick="location.href='/teacher/courses/{{ $course->id }}';">Show</button>


                            <form action="/teacher/courses/{{ $course->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger mt-1" type="submit" onclick="confirm('Sure to delete?')">Delete</button>
                            </form>                            
                        
                        </div>
                    </div>
                </div>
            </div>
            @endforeach     
        
    </div>

</div>

@endsection