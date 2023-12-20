<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Nova Project | Teacher Page</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/viewer.css') }}">
    </head>
    <body class="bg-gray-100">
        @include('sweetalert::alert')
        <div class="flex flex-row">
            <div class="sidebar-area w-2/12 flex justify-center ">
                @include('layout.sidebarTeacher')
            </div>
            <div class="main-area mt-7 w-10/12 mr-4 pb-10">
                @yield('container')
            </div>
        </div>
                
        
        {{-- @yield('container')        --}}

        <script src="{{ asset('js/pdf.js') }}"></script>
        <script src="{{ asset('js/pdf.worker.js') }}"></script>
        <script src="{{ asset('js/viewer.js') }}"></script>
        {{-- <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script> --}}
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="https://kit.fontawesome.com/1319cd5cd7.js" crossorigin="anonymous"></script>


        <script>
            // use this simple function to automatically focus on the next input
            function focusNextInput(el, prevId, nextId) {
                if (el.value.length === 0) {
                    document.getElementById(prevId).focus();
                } else {
                    document.getElementById(nextId).focus();
                }
            }

        </script>
        
    </body>
    </html>