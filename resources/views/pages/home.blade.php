<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Nova E-Learning | Home Page</title>
</head>
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
  * {
    scroll-behavior: smooth;
  }
</style>
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
        <li><a class="text-base text-white hover:text-gray-300 font-semibold" href="#hero">Home</a></li>
        <li><a class="text-base text-white hover:text-gray-300 font-semibold" href="#about">About Us</a></li>
        <li><a class="text-base text-white hover:text-gray-300 font-semibold" href="#features">Services</a></li>
        <li><a class="text-base text-white hover:text-gray-300 font-semibold" href="#footer">Contact</a></li>
      </ul>
      <a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-purple-50 hover:bg-purple-100 text-base text-purple-900 font-bold  rounded-xl transition duration-200" href="/login">Sign In</a>
      <a class="hidden lg:inline-block py-2 px-6 bg-amber-500 hover:bg-amber-600 text-base text-black font-bold rounded-xl transition duration-200" href="/register">Sign up</a>
    </nav>
    <div class="navbar-menu relative z-50 hidden">
      <div class="navbar-backdrop fixed inset-0 opacity-25"></div>
      <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-purple-600 border-r overflow-y-auto">
        <div class="flex items-center mb-8">
          <a class="mr-auto text-xl font-bold leading-none text-white" href="#">
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
              <a class="block p-4 text-sm font-semibold text-white hover:bg-blue-50 hover:text-blue-600 rounded" href="#hero">Home</a>
            </li>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-white hover:bg-blue-50 hover:text-blue-600 rounded" href="#about">About Us</a>
            </li>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-white hover:bg-blue-50 hover:text-blue-600 rounded" href="#features">Services</a>
            </li>
            <li class="mb-1">
            </li>
            <li class="mb-1">
              <a class="block p-4 text-sm font-semibold text-white hover:bg-blue-50 hover:text-blue-600 rounded" href="#footer">Contact</a>
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

  <section class="hero  z-10" id="hero" data-aos="fade-up-left" data-aos-duration="1000" data-aos-easing="linear">
    <div class="content-area mt-24 flex justify-between flex-wrap mx-16">
      <div class="text-content md:mt-16 mt-0 md:w-6/12 w-full">
        <h3 class="text-base font-medium text-purple-700 uppercase">Modern E-Learning</h3>
        <p class="font-bold md:text-4xl text-2xl mt-3">
          Belajar Bertransformasi, Masa depan dalam genggaman anda
        </p>
        <p class="font-semibold md:text-xl text-sm mt-3 opacity-55">
          Online learning is valuable tool for children's education it's important to approach it with a thoughtful mindset
        </p>

        <button class="px-16 py-3 md:text-base text-sm bg-amber-300 hover:bg-amber-500 font-bold mt-6 rounded-full" onclick="location.href='/login'">Join Now</button>
      </div>
      <div class="image-content md:w-5/12 w-full">
        <img src="{{ asset('img/3.png') }}" alt="">
      </div>
    </div>
  </section>

  <section class="about z-10 pb-24" id="about" data-aos="flip-left" data-aos-duration="500">
    <div class="content-area md:mt-10 mt-24 flex flex-wrap md:justify-evenly justify-center md:mx-24 mx-10">
      <div class="image-area md:w-3/12 w-8/12">
        <img src="{{ asset('img/logoremove.png') }}" alt="">
      </div>
      <div class="text-area mt-5 md:w-6/12 w-auto">
        <h2 class="md:text-4xl text-3xl font-semibold md:text-left text-center">About Us</h2>
        <p class="mt-3 text-left">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque soluta ex unde inventore fugiat expedita delectus eius placeat repellat odio. Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, repellendus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque soluta, qui excepturi magnam aut in distinctio asperiores voluptas! Facere, sit! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi temporibus doloremque odit magnam aspernatur nobis blanditiis nostrum. Dignissimos atque molestiae deleniti velit nulla ex numquam. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, reprehenderit.</p>
      </div>
    </div>
  </section>

  <section id="features" class="z-10 features  pb-10" data-aos="zoom-in-up" data-aos-duration="600">
    <div class="content-area mt-10 flex flex-wrap justify-between md:mx-24 mx-14">
      <div class="text-left md:w-6/12 w-full md:ml-10 ml-0">
        <h1 class="md:text-4xl text-2xl font-bold">Our <span class="text-purple-700">Online Teaching Platform</span> Enable the Students to</h1>
        <div class="feature lists mt-4">

          <div class="list flex md:mt-10 mt-8">
            <img class="w-8" src="{{ asset('icons/vector.svg') }}" alt="">
            <h1 class="md:text-3xl text-xl font-bold ml-5">Provide basic consepts</h1>
          </div>
          <div class="list flex md:mt-10 mt-8">
            <img class="w-8" src="{{ asset('icons/vector.svg') }}" alt="">
            <h1 class="md:text-3xl text-xl font-bold ml-5">Solve complicated sums</h1>
          </div>
          <div class="list flex md:mt-10 mt-8">
            <img class="w-8" src="{{ asset('icons/vector.svg') }}" alt="">
            <h1 class="md:text-3xl text-xl font-bold ml-5">Understand difficult topics</h1>
          </div>
          <div class="list flex md:mt-10 mt-8">
            <img class="w-8" src="{{ asset('icons/vector.svg') }}" alt="">
            <h1 class="md:text-3xl text-xl font-bold ml-5">Interact with the teachers</h1>
          </div>
        </div>
      </div>
      <div class="image-content md:w-3/12 w-9/12 md:mr-16 mr-0 md:mt-0 mt-5">
        <img class="" src="{{ asset('img/loginPeople.png') }}" alt="">
      </div>
    </div>
  </section>

  <section class="footer z-10 mt-16 mb-16 h-72 border-t-2 border-purple-200" id="footer">
    <div class="big-area pt-16 sm:mx-16 mx-8  h-full flex justify-between flex-wrap">
        <div class="logo-area w-96">
            <img class="w-32" src="{{ asset('img/logoremove.png') }}" alt="">
            <h1 class="text-xl font-semibold opacity-70 mt-3">Bimbel online interaktif pertama di Indonesia</h1>
        </div>

        <div class="text-area lg:mt-0 md:mt-5 mt-5 flex flex-wrap sm:justify-between justify-between pb-10 " style="width: 46rem;">
            
            <div class="col-1 sm:mt-0 mt-3 w-32">
                <h2 class="font-bold text-base uppercase opacity-50">Developer</h2>

                <div class="flex flex-col md:mt-6 mt-14 h-40 justify-between text-sm font-medium ">
                    <h3>Diandra Farel</h3>
                    <h3>Muhammad Tamzis</h3>
                    <h3>Andri Bayu</h3>
                    <h3>Listya Wulandari</h3>
                </div>
            </div>

            <div class="col-2 lg:ml-10 md:ml-0 ml-0 sm:mt-0 mt-3 md:mr-0 mr-16">
                <h2 class="font-bold text-base uppercase opacity-50">Sosmed</h2>

                <div class="flex flex-col mt-14  md:mt-8 h-40 justify-between text-sm font-medium ">
                    <h3 class="text-black hover:text-blue-300 pointer" onclick="location.href='https://www.instagram.com/diandraafs_?utm_source=ig_web_button_share_sheet&igsh=OGQ5ZDc2ODk2ZA=='">@diandraafs_</h3>
                    <h3 class="text-black hover:text-blue-300 pointer" onclick="location.href='https://www.instagram.com/tznvn?utm_source=ig_web_button_share_sheet&igsh=OGQ5ZDc2ODk2ZA=='">@tznvn_</h3>
                    <h3 class="text-black hover:text-blue-300 pointer" onclick="location.href='https://www.instagram.com/andrby_?utm_source=ig_web_button_share_sheet&igsh=OGQ5ZDc2ODk2ZA=='">@andrby_</h3>
                    <h3 class="text-black hover:text-blue-300 pointer" onclick="location.href='https://www.instagram.com/lstywlndr._?utm_source=ig_web_button_share_sheet&igsh=OGQ5ZDc2ODk2ZA=='">@lstywlndr.</h3>
                </div>
            </div>

            <div class="col-3 sm:w-auto md:w-36 ml-0 lg:ml-10 sm:mt-0 mt-3 md:mt-0">

                <h2 class="font-bold text-base uppercase opacity-50">Tentang Kami</h2>

                <div class="flex flex-col md:mt-6 mt-14 h-40 justify-between text-sm font-medium ">
                    <h3>Home</h3>
                    <h3>About Us</h3>
                    <h3>Contact</h3>
                    <h3>Pusat bantuan</h3>
                </div>
            </div>

            <div class="col-4 ml-0 md:ml-0 lg:ml-8 mt-9 md:mt-0">
                <h2 class="font-bold text-base uppercase opacity-50">Dedicated</h2>

                <div class="flex flex-col mt-6 h-40 justify-between text-sm font-medium ">
                    <div class="contact-person flex">
                        <img src="Assets/icon-message.svg" alt="">
                        <p class="text-xs font-semibold self-center">SMK Negeri 2 Klaten</p>
                    </div>
                    <div class="contact-person flex">
                        <img src="Assets/icon-call.svg" alt="">
                        <p class="text-xs font-semibold self-center">Kelompok 4</p>
                    </div>
                    <h3>‎</h3>
                    <h3>‎</h3>
                    <h3>‎</h3>
                </div>
            </div>

        </div>
    </div>
</section>




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