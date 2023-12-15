<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nova Project</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="{{ asset('css/viewer.css') }}">
</head>
<body>
    @include('components.navbar')
    @if (session()->has('student'))
     <div class="alert alert-success">Selamat datang Student</div>
    @endif
    
    @yield('container')       


    <script src="{{ asset('js/pdf.js') }}"></script>
    <script src="{{ asset('js/pdf.worker.js') }}"></script>

    <script src="{{ asset('js/viewer.js') }}"></script>


    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>