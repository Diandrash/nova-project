@extends('layout.index')

@section('container')
<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Choose Your Role</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">

      <div class="feature col">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#collection"/></svg>
        </div>
        <h3 class="fs-2">Students</h3>
        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        <a href="/register/student" class="icon-link d-inline-flex align-items-center">
          Register as Student
          <svg class="bi" width="1em" height="1em"><use xlink:href="/register/student"/></svg>
        </a>
      </div>

      <div class="feature col">
        <div class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#people-circle"/></svg>
        </div>
        <h3 class="fs-2">Teachers</h3>
        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        <a href="/register/teacher" class="icon-link d-inline-flex align-items-center">
          Register as Teacher
          <svg class="bi" width="1em" height="1em"><use xlink:href="/register/teacher"/></svg>
        </a>
      </div>

      
    </div>
    <p>Already have an Account? <a href="/login">Login</a></p>
  </div>
@endsection