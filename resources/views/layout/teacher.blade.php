<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Nova E-Learning | Teacher Page</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/viewer.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
        <style>
            .sidebar-student, .sidebar-teacher {
            height: 35rem;
            background-color: #7537D8;
        }

        @media only screen and (max-width: 600px) {
            .sidebar-student, .sidebar-teacher {
                height: 100%;
            }
        }
        </style>
    </head>
    <body class="bg-gray-100">
        @include('sweetalert::alert')
        <div class="flex flex-row">
            <div class="sidebar-area w-2/12 flex justify-center ">
                @include('layout.sidebarTeacher')
            </div>
            <div class="main-area mt-7 w-10/12 md:mr-4 mr-2 md:ml-0 ml-7 pb-10">
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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
          </script>
          
    </body>
    </html>