@extends('layout.index')

@section('container')
    @if (session()->has('logout'))
        <div class="alert alert-success">
            Logout berhasil
        </div>
    @endif
    <!-- {{-- HERO SECTION --}} -->
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col mt-5">
                    <h1 class="text-primary small mt-3 text-uppercase">Modern E-Learning</h1>
                    <h1 class="fs-1 mt-0 fw-bold">Belajar Bertransformasi, Masa depan dalam genggaman anda</h1>
                    <p class="fs-6 text-black text-opacity-50">Online learning is valuable tool for children's education it's important to approach it with a thoughtful mindset</p>

                    <button class="btn btn-secondary text-black fw-bold rounded px-4 mt-4">Get Started</button>
                </div>
                <div class="col ">
                    <img src="/img/3.png" class="hero-image" style="width: 30rem;" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- {{-- END HERO SECTION --}} -->
@endsection
