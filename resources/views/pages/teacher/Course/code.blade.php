@extends('layout.teacher')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-semibold">Your Course Code</h1>
        <div class="text-right flex">
            <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
        </div>

    </div>


    <div class="input-code-area flex flex-col mt-24 items-center h-screen">
        <h1 class="text-3xl font-semibold">{{ $course->name }}</h1>
        <p id="helper-text-explanation" class="mt-2 text-xl text-gray-500 dark:text-gray-400">Give the course code to students who want to join your course.</p>
        
        <form class="mt-7 flex flex-col">
            <div class="flex mb-2 justify-center space-x-2 rtl:space-x-reverse">
                <div>
                    <label for="code-1" class="sr-only">First code</label>
                    <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-1', 'code-2')" id="code-1" class="block w-16 h-16 py-3 text-2xl font-extrabold text-center text-violet-500 bg-white border-2 border-violet-300 rounded-lg focus:ring-primary-500 focus:border-primary-500" required value={{ $digits[0] }}>
                </div>
                <div>
                    <label for="code-2" class="sr-only">Second code</label>
                    <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-1', 'code-3')" id="code-2" class="block w-16 h-16 py-3 text-2xl font-extrabold text-center text-violet-500 bg-white border-2 border-violet-300 rounded-lg focus:ring-primary-500 focus:border-violet-800" required value={{ $digits[1] }}>
                </div>
                <div>
                    <label for="code-3" class="sr-only">Third code</label>
                    <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-2', 'code-4')" id="code-3" class="block w-16 h-16 py-3 text-2xl font-extrabold text-center text-violet-500 bg-white border-2 border-violet-300 rounded-lg focus:ring-primary-500 focus:border-violet-800" required value={{ $digits[2] }}>
                </div>
                <div>
                    <label for="code-4" class="sr-only">Fourth code</label>
                    <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-3', 'code-5')" id="code-4" class="block w-16 h-16 py-3 text-2xl font-extrabold text-center text-violet-500 bg-white border-2 border-violet-300 rounded-lg focus:ring-primary-500 focus:border-violet-800" required value={{ $digits[3] }}>
                </div>
                <div>
                    <label for="code-5" class="sr-only">Fivth code</label>
                    <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-4', 'code-6')" id="code-5" class="block w-16 h-16 py-3 text-2xl font-extrabold text-center text-violet-500 bg-white border-2 border-violet-300 rounded-lg focus:ring-primary-500 focus:border-violet-800" required value={{ $digits[4] }}>
                </div>
                <div>
                    <label for="code-6" class="sr-only">Sixth code</label>
                    <input type="text" maxlength="1" onkeyup="focusNextInput(this, 'code-5', 'code-6')" id="code-6" class="block w-16 h-16 py-3 text-2xl font-extrabold text-center text-violet-500 bg-white border-2 border-violet-300 rounded-lg focus:ring-primary-500 focus:border-violet-800" required value={{ $digits[5] }}>
                </div>
            </div>


            
        </form>

    </div>
@endsection