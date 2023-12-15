
@extends('layout.index')

@section('container')

    <div class="text-center">

        <div class="container">
            @if (session()->has('success'))
                <div class="alert alert-success">Registrasi Sukses Silahkan Login</div>
            @endif
            <main class="form-signin w-50 mt-5 m-auto">
                <form action="/login" method="post">
                    @csrf
                  <h1 class="h3 mb-3 fw-normal ">Please Login</h1>
              
        
                  <div class="form-floating mt-5">
                    <input type="email" class="form-control  @error('email') is-invalid  @enderror" id="email" placeholder="name@example.com" name="email" required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}    
                        </div>    
                    @enderror
                  </div>
    
                  <div class="form-floating">
                    <input type="password" class="form-control  @error('password') is-invalid  @enderror" id="password" placeholder="Password" required name="password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}    
                        </div>    
                    @enderror
                  </div>
              
    
                  <button class="w-100 btn btn-lg btn-primary mb-5" type="submit">Sign up</button>
    
                  <p class="mt-3">Not have an account? <a href="/register">Register here</a></p>
    
                </form>
            </main>
    
        </div>
    </div>   
@endsection