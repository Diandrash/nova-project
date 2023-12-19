
@extends('layout.student')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-semibold">Welcome, <span class="font-bold">{{ auth()->user()->fullname }}</span></span></h1>
        <div class="text-right flex">
            <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
        </div>

    </div>

    <div class="course-cards flex flex-wrap justify-between">
        <div class="card w-60 h-80 rounded-3xl shadow-xl mt-5 bg-amber-400 hover:bg-amber-300" onclick="location.href=''">
            <div class="content ml-6 mt-5 ">
                <div class="relative inline-flex items-center justify-center w-12 mt-3 h-12 bg-gray-200    overflow-hidden bg-gray-100 rounded-full ">
                    <img src="icons/Flower.svg" class="w-6" alt="">
                </div>
                <h2 class="mt-3 font-bold text-lg">SAAS XII SIJA B</h2>

                <h3 class="mt-28 font-medium text-base">Progress</h3>
                <div class="progress-bar flex flex-row mt-3 gap-2">
                    <div class="bar w-14 bg-white rounded-full h-1.5 mb-4 "></div>
                    <div class="bar w-14 bg-white rounded-full h-1.5 mb-4 "></div>
                    <div class="bar w-14 bg-white rounded-full h-1.5 mb-4 opacity-50"></div>
                </div>
            </div>
        </div>
        <div class="card w-60 h-80 rounded-3xl shadow-xl mt-5 bg-violet-600 hover:bg-violet-500" onclick="location.href=''">
            <div class="content ml-6 mt-5 ">
                <div class="relative inline-flex items-center justify-center w-12 mt-3 h-12 bg-gray-200    overflow-hidden bg-gray-100 rounded-full ">
                    <img src="icons/Data Backup.svg" class="w-6" alt="">
                </div>
                <h2 class="mt-3 font-bold text-lg">PKK XII SIJA B</h2>

                <h3 class="mt-28 font-medium text-base">Progress</h3>
                <div class="progress-bar flex mt-3 gap-2">
                    <div class="bar w-14 bg-white rounded-full h-1.5 mb-4 "></div>
                    <div class="bar w-14 bg-white rounded-full h-1.5 mb-4 opacity-50"></div>
                    <div class="bar w-14 bg-white rounded-full h-1.5 mb-4 opacity-50"></div>
                </div>
            </div>
        </div>
        <div class="card w-60 h-80 rounded-3xl shadow-xl mt-5 bg-violet-400 hover:bg-violet-600" onclick="location.href=''">
            <div class="content ml-6 mt-5 ">
                <div class="relative inline-flex items-center justify-center w-12 mt-3 h-12 bg-gray-200    overflow-hidden bg-gray-100 rounded-full ">
                    <img src="icons/Hashtag Large.svg" class="w-6" alt="">
                </div>
                <h2 class="mt-3 font-bold text-lg">UI / UX Design</h2>

                <h3 class="mt-28 font-medium text-base">Progress</h3>
                <div class="progress-bar flex mt-3 gap-2">
                    <div class="bar w-14 bg-white rounded-full h-1.5 mb-4 "></div>
                    <div class="bar w-14 bg-white rounded-full h-1.5 mb-4 "></div>
                    <div class="bar w-14 bg-white rounded-full h-1.5 mb-4 opacity-50"></div>
                </div>
            </div>
        </div>
        <div class="card w-60 h-80 rounded-3xl shadow-xl mt-5 bg-amber-400 hover:bg-amber-300" onclick="location.href=''">
            <div class="content ml-6 mt-5 ">
                <div class="relative inline-flex items-center justify-center w-12 mt-3 h-12 bg-gray-200    overflow-hidden bg-gray-100 rounded-full ">
                    <img src="icons/Flower.svg" class="w-6" alt="">
                </div>
                <h2 class="mt-3 font-bold text-lg">Big Data</h2>

                <h3 class="mt-28 font-medium text-base">Progress</h3>
                <div class="progress-bar flex mt-3 gap-2">
                    <div class="bar w-14 bg-white rounded-full h-1.5 mb-4 "></div>
                    <div class="bar w-14 bg-white rounded-full h-1.5 mb-4 "></div>
                    <div class="bar w-14 bg-white rounded-full h-1.5 mb-4 opacity-50"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="assignments-cards mt-10">
        <h1 class="text-2xl font-semibold">My Assignments</h1>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 :text-gray-400 mt-3">
                <tbody>
                    <tr class="bg-gray-100 border-b hover:bg-violet-200 :border-gray-700">
                        <th scope="row" class="pr-6 py-4 font-bold text-base text-gray-900 whitespace-nowrap :text-white">
                            1. <br>
                        </th>
                        <th scope="row" class="px-6 py-4 font-bold text-base text-gray-900 whitespace-nowrap :text-white">
                            Tugas 1 Struktur Website <br>
                        </th>
                        <td class="px-6 py-4">
                            <span class="font-medium opacity-50 text-sm">
                                29 Oktober 2023 | 23:59 WIB
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center    ">
                            <button type="button" class="text-green-600 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Has Completed</button>
                        </td>
                    </tr>
                    <tr class="bg-gray-100 border-b hover:bg-violet-200 :border-gray-700">
                        <th scope="row" class="pr-6 py-4 font-bold text-base text-gray-900 whitespace-nowrap :text-white">
                            2. <br>
                        </th>
                        <th scope="row" class="px-6 py-4 font-bold text-base text-gray-900 whitespace-nowrap :text-white">
                            Tugas 2 Layout Website <br>
                        </th>
                        <td class="px-6 py-4">
                            <span class="font-medium opacity-50 text-sm">
                                31 Oktober 2023 | 23:59 WIB
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button type="button" class="text-red-600 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800">Uncompleted</button>
                        </td>
                    </tr>
                    <tr class="bg-gray-100 border-b hover:bg-violet-200 :border-gray-700">
                        <th scope="row" class="pr-6 py-4 font-bold text-base text-gray-900 whitespace-nowrap :text-white">
                            3. <br>
                        </th>
                        <th scope="row" class="px-6 py-4 font-bold text-base text-gray-900 whitespace-nowrap :text-white">
                            Tugas 3 Slicing Website <br>
                        </th>
                        <td class="px-6 py-4">
                            <span class="font-medium opacity-50 text-sm">
                                31 Oktober 2023 | 23:59 WIB
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <button type="button" class="text-red-600 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800">Uncompleted</button>
                        </td>
                    </tr>


                </tbody>
            </table>
            <div class="text-more flex justify-center text-base font-semibold mt-3 text-blue-800 hover:text-blue-600">
                <h2 onclick="location.href=''">View All Assignments</h2>
            </div>
        </div>
    </div>


@endsection