@extends('layout.index')

@section('container')

@if (session()->has('joinSuccess'))
<div class="alert alert-success">
    Join Success
</div>
@endif

@if (session()->has('joinError'))
<div class="alert alert-danger">
    You Already Joined
</div>
@endif
    <h1>Student Page</h1>


    <a href="/enrollment">Join a Course</a>
    <a href="/student/courses">Show Courses</a>
    <a href="/student/assignments">My Assignments</a>
@endsection