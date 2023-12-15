@extends('layout.index')

@section('container')


<div class="text-center">

    <div class="container">
        
        <main class="form-signin w-50 mt-5 m-auto">
            <form action="/register" method="post">
                @csrf
              <h1 class="h3 mb-3 fw-normal">Welcome Teacher</h1>
              <h1 class="h3 mb-3 fw-normal">Please Register</h1>
          
              <div class="form-floating">
                <input type="text" class="form-control @error('fullname') is-invalid  @enderror" id="fullname" placeholder="Fullname" name="fullname" required value="{{ old('fullname') }}">
                <label for="fullname">Fullname</label>
                @error('fullname')
                    <div class="invalid-feedback">
                    {{ $message }}    
                    </div>    
                @enderror
              </div>

             <input type="hidden" name="role_id" value="2">

              <div class="form-floating">
                <input type="email" class="form-control  @error('email') is-invalid  @enderror" id="email" placeholder="name@example.com" name="email" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}    
                    </div>    
                @enderror
              </div>

              <div class="form-floating">
                <input type="text" class="form-control  @error('instance') is-invalid  @enderror" id="instance" placeholder="SMK Negeri 2 Klaten" name="instance" required value="{{ old('instance') }}">
                <label for="instance">Instance</label>
                @error('instance')
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
          

              <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>

              <p class="mt-3">Already have an account? <a href="/">Login</a></p>
              <p class="mt-5 mb-3 text-muted">Change Role? <a href="/register">Here</a></p>

            </form>
        </main>

    </div>
</div>

  
@endsection