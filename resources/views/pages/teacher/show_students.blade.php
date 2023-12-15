@extends('layout.index')


@section('container')
    <div class="container">
        <div class="row mt-3 mb-4">
            <div class="col-10">
                <h1 class="">All Students on your class</h1>
            </div>
            <div class="col">
                <button class="btn btn-warning mt-2" onclick="history.back()">Back to Course</button>
            </div>
        </div>

        <table class="table table-light table-striped">
            <thead>
              <tr>
                <th scope="col">Number</th>
                <th scope="col">Fullname</th>
                <th scope="col">Instance</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $index=>$user)        
                <tr>
                    <th scope="row">{{ $index+1 }}</th>
                    <td>{{ $user->fullname }}</td>
                    <td>{{ $user->instance }}</td>
                    <td>@mdo</td>
                </tr>
            @endforeach
            
            </tbody>
          </table>
    </div>
@endsection