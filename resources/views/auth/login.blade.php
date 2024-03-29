<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Nova E-Learning | Login Page</title>
</head>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<body>
  <div class="navbar fixed left-0 right-0 top-0 z-50">
    <nav class="relative px-4 py-4 flex justify-between items-center bg-violet-500">
      <a class="text-xl font-bold leading-none" href="#">
        <h1 class="text-white ml-10">Nova E-Learning</h1>
      </a>
      <div class="lg:hidden">
        <button class="navbar-burger flex items-center text-white p-3">
          <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Mobile menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
          </svg>
        </button>
      </div>
      <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <li><a class="text-base text-white hover:text-gray-300 font-semibold" href="/home#hero">Home</a></li>
        <li><a class="text-base text-white hover:text-gray-300 font-semibold" href="/home#about">About Us</a></li>
        <li><a class="text-base text-white hover:text-gray-300 font-semibold" href="/home#features">Services</a></li>
        <li><a class="text-base text-white hover:text-gray-300 font-semibold" href="/home#footer">Contact</a></li>
      </ul>
      <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-purple-50 hover:bg-purple-100 text-base text-purple-900 font-bold  rounded-xl transition duration-200" href="/login">Sign In</a>
      <a class="hidden lg:inline-block py-2 px-6 bg-amber-500 hover:bg-amber-600 text-base text-black font-bold rounded-xl transition duration-200" href="/register">Sign up</a>
    </nav>
    <div class="navbar-menu relative z-50 hidden">
      <div class="navbar-backdrop fixed inset-0 opacity-25"></div>
      <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-purple-600 border-r overflow-y-auto">
        <div class="flex items-center mb-8">
          <a class="mr-auto text-xl font-bold leading-none text-white" href="/home">
            <h1 class="text-white">Nova E-Learning</h1>
          </a>
          <button class="navbar-close">
            <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
        <div>
          <ul>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-white hover:bg-blue-50 hover:text-blue-600 rounded" href="/home#hero">Home</a>
            </li>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-white hover:bg-blue-50 hover:text-blue-600 rounded" href="/home#about">About Us</a>
            </li>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-white hover:bg-blue-50 hover:text-blue-600 rounded" href="/home#features">Services</a>
            </li>
            <li class="mb-1">
            </li>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-white hover:bg-blue-50 hover:text-blue-600 rounded" href="/home#footer">Contact</a>
            </li>
          </ul>
        </div>
        <div class="mt-auto">
          <div class="pt-6">
            <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl" href="/login">Sign in</a>
            <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-blue-600 hover:bg-blue-700  rounded-xl" href="/register">Sign Up</a>
          </div>
          <p class="my-4 text-xs text-center text-gray-400">
            <span>Copyright © 2023</span>
          </p>
        </div>
      </nav>
    </div>
  </div>

  <div class="register mt-16" id="register">
    <div class="content-area flex flex-wrap">
        <div class="image-area md:flex hidden justify-center md:w-5/12 w-full bg-violet-400">
            <img class="w-8/12 mt-5" src="https://res.cloudinary.com/dlulk3leh/image/upload/v1705798683/qje9pxjdwzlax7d4mgiw.png" alt="">
        </div>
        <div class="input-area md:w-7/12 w-full md:bg-white bg-violet-300">
            <div class="content-area mx-10 my-10">
                <h1 class="text-3xl font-bold">Sign into your Account</h1>
                <p class="text-base mt-1">Many great things await you.</p>
                
                <form action="/login" method="POST" class="md:w-10/12 w-full mt-8">
                    @csrf
                    <div class="mb-6">
                        <label for="large-input" class="block mb-2 text-base font-medium text-gray-500">Email</label>
                        <input type="text" id="large-input" name="email" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" placeholder="Johndoe@smk.belajar.id" required>
                    </div>
                    <div class="mb-6">
                        <label for="large-input" class="block mb-2 text-base font-medium text-gray-500">Password</label>
                        <input type="password" id="large-input" name="password" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" placeholder="">
                    </div>

                    <button type="submit" class="py-4 w-full px-5 bg-amber-500 hover:bg-amber-700 text-white font-bold text-xl mt-5 mb-5 rounded-full" onclick="location.href=''">
                        Sign In
                    </button>

                    <h1 class="mt-3">Not Have an Account? <a href="/register" class="text-blue-500 underline pointer">Register Now</a></h1>
                </form>
            </div>
        </div>
    </div>
  </div>




  <script>
    // Burger menus
    document.addEventListener('DOMContentLoaded', function() {
        // open
        const burger = document.querySelectorAll('.navbar-burger');
        const menu = document.querySelectorAll('.navbar-menu');
    
        if (burger.length && menu.length) {
            for (var i = 0; i < burger.length; i++) {
                burger[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
    
        // close
        const close = document.querySelectorAll('.navbar-close');
        const backdrop = document.querySelectorAll('.navbar-backdrop');
    
        if (close.length) {
            for (var i = 0; i < close.length; i++) {
                close[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
    
        if (backdrop.length) {
            for (var i = 0; i < backdrop.length; i++) {
                backdrop[i].addEventListener('click', function() {
                    for (var j = 0; j < menu.length; j++) {
                        menu[j].classList.toggle('hidden');
                    }
                });
            }
        }
    });
  </script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>