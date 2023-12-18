@extends('layout.student')

@section('container')
<div class="welcome-text main flex justify-between">
    <h1 class="text-2xl font-semibold">All Assignments</span></h1>
    <div class="text-right flex">
        <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
        <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
        <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
    </div>
</div>
<div class="relative overflow-x-auto mt-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 :text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 :bg-gray-700 :text-gray-400">
            <tr>
                <th scope="col" class="px-2 py-3">
                    No
                </th>
                <th scope="col" class="px-3 py-3 text-left">
                    Assignment name
                </th>
                <th scope="col" class=" py-3 text-left">
                    Due on
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Status
                </th>

            </tr>
        </thead>
        <tbody>
            <tr class="bg-gray-100 border-b hover:bg-violet-100 :border-gray-700 cursor-pointer" onclick="location.href='assignment.html'">
                <td class="px-2 py-4">
                    1
                </td>
                <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                    <div class="flex">
                        <div class="icon p-3 rounded-full bg-gray-100">
                            <img src="/icons/Book.svg" alt="icon" class="w-6 bg-gray-10 ">
                        </div>
                        <div class="text ml-3">
                            <h5 class="text-left text-base font-semibold">Tugas 1. Struktur Website</h5>
                            <p class="text-left opacity-60 font-normal">Telkom DigiUp 2023</p>
                        </div>
                    </div>
                </th>
                <td class="text-left py-4">
                    <h3 class="text-black font-bold">Today, 23:59 WIB</h3>
                </td>
                <td class="px-6 py-4 text-center">
                    <button type="button" class="py-2 px-7 me-2 mb-2 text-green-500 text-sm font-medium focus:outline-none bg-gray-100 rounded-full border border-green-200 hover:bg-green-100 hover:text-blue-1 focus:z-10 focus:ring-4 focus:ring-green-200 :focus:ring-green-1 :bg-green-800 :text-green-400 :border-green-600 :hover:text-white :hover:bg-green-700">Completed</button>
                </td>

            </tr>
            <tr class="bg-gray-100 border-b hover:bg-violet-100 :border-gray-700 cursor-pointer" onclick="location.href='assignment.html'">
                <td class="px-2 py-4">
                    2
                </td>
                <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                    <div class="flex">
                        <div class="icon p-3 rounded-full bg-gray-100">
                            <img src="/icons/Paint.svg" alt="icon" class="w-6 bg-gray-10 ">
                        </div>
                        <div class="text ml-3">
                            <h5 class="text-left text-base font-semibold">Tugas 2. Layout Website</h5>
                            <p class="text-left opacity-60 font-normal">Telkom DigiUp 2023</p>
                        </div>
                    </div>
                </th>
                <td class="text-left py-4">
                    <h3 class="text-black font-bold">Tomorrow, 23:59 WIB</h3>
                </td>
                <td class="px-6 py-4 text-center">
                    <button type="button" class="py-2 px-5 me-2 mb-2 text-red-500 text-sm font-medium focus:outline-none bg-gray-100 rounded-full border border-red-200 hover:bg-red-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-red-200 :focus:ring-red-700 :bg-red-800 :text-red-400 :border-red-600 :hover:text-white :hover:bg-red-700">Uncompleted</button>
                </td>

            </tr>
            <tr class="bg-gray-100 border-b hover:bg-violet-100 :border-gray-700 cursor-pointer" onclick="location.href='assignment.html'">
                <td class="px-2 py-4">
                    3
                </td>
                <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                    <div class="flex">
                        <div class="icon p-3 rounded-full bg-gray-100">
                            <img src="/icons/Ruler.svg" alt="icon" class="w-6 bg-gray-10 ">
                        </div>
                        <div class="text ml-3">
                            <h5 class="text-left text-base font-semibold">Project Akhir SaaS</h5>
                            <p class="text-left opacity-60 font-normal">Ms. Atik Ariyani</p>
                        </div>
                    </div>
                </th>
                <td class="text-left py-4">
                    <h3 class="text-black font-bold">13 Dec 2023 | 23:59 WIB</h3>
                </td>
                <td class="px-6 py-4 text-center">
                    <button type="button" class="py-2 px-5 me-2 mb-2 text-red-500 text-sm font-medium focus:outline-none bg-gray-100 rounded-full border border-red-200 hover:bg-red-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-red-200 :focus:ring-red-700 :bg-red-800 :text-red-400 :border-red-600 :hover:text-white :hover:bg-red-700">Uncompleted</button>
                </td>

            </tr>
            <tr class="bg-gray-100 border-b hover:bg-violet-100 :border-gray-700 cursor-pointer" onclick="location.href='assignment.html'">
                <td class="px-2 py-4">
                    1
                </td>
                <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                    <div class="flex">
                        <div class="icon p-3 rounded-full bg-gray-100">
                            <img src="/icons/Book.svg" alt="icon" class="w-6 bg-gray-10 ">
                        </div>
                        <div class="text ml-3">
                            <h5 class="text-left text-base font-semibold">Tugas 1. Struktur Website</h5>
                            <p class="text-left opacity-60 font-normal">Telkom DigiUp 2023</p>
                        </div>
                    </div>
                </th>
                <td class="text-left py-4">
                    <h3 class="text-black font-bold">Today, 23:59 WIB</h3>
                </td>
                <td class="px-6 py-4 text-center">
                    <button type="button" class="py-2 px-7 me-2 mb-2 text-green-500 text-sm font-medium focus:outline-none bg-gray-100 rounded-full border border-green-200 hover:bg-green-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-green-200 :focus:ring-green-700 :bg-green-800 :text-green-400 :border-green-600 :hover:text-white :hover:bg-green-700">Completed</button>
                </td>

            </tr>
            <tr class="bg-gray-100 border-b hover:bg-violet-100 :border-gray-700 cursor-pointer" onclick="location.href='assignment.html'">
                <td class="px-2 py-4">
                    2
                </td>
                <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                    <div class="flex">
                        <div class="icon p-3 rounded-full bg-gray-100">
                            <img src="/icons/Paint.svg" alt="icon" class="w-6 bg-gray-10 ">
                        </div>
                        <div class="text ml-3">
                            <h5 class="text-left text-base font-semibold">Tugas 2. Layout Website</h5>
                            <p class="text-left opacity-60 font-normal">Telkom DigiUp 2023</p>
                        </div>
                    </div>
                </th>
                <td class="text-left py-4">
                    <h3 class="text-black font-bold">Tomorrow, 23:59 WIB</h3>
                </td>
                <td class="px-6 py-4 text-center">
                    <button type="button" class="py-2 px-5 me-2 mb-2 text-red-500 text-sm font-medium focus:outline-none bg-gray-100 rounded-full border border-red-200 hover:bg-red-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-red-200 :focus:ring-red-700 :bg-red-800 :text-red-400 :border-red-600 :hover:text-white :hover:bg-red-700">Uncompleted</button>
                </td>

            </tr>
            <tr class="bg-gray-100 border-b hover:bg-violet-100 :border-gray-700 cursor-pointer" onclick="location.href='assignment.html'">
                <td class="px-2 py-4">
                    3
                </td>
                <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                    <div class="flex">
                        <div class="icon p-3 rounded-full bg-gray-100">
                            <img src="/icons/Ruler.svg" alt="icon" class="w-6 bg-gray-10 ">
                        </div>
                        <div class="text ml-3">
                            <h5 class="text-left text-base font-semibold">Project Akhir SaaS</h5>
                            <p class="text-left opacity-60 font-normal">Ms. Atik Ariyani</p>
                        </div>
                    </div>
                </th>
                <td class="text-left py-4">
                    <h3 class="text-black font-bold">13 Dec 2023 | 23:59 WIB</h3>
                </td>
                <td class="px-6 py-4 text-center">
                    <button type="button" class="py-2 px-5 me-2 mb-2 text-red-500 text-sm font-medium focus:outline-none bg-gray-100 rounded-full border border-red-200 hover:bg-red-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-red-200 :focus:ring-red-700 :bg-red-800 :text-red-400 :border-red-600 :hover:text-white :hover:bg-red-700">Uncompleted</button>
                </td>

            </tr>
            <tr class="bg-gray-100 border-b hover:bg-violet-100 :border-gray-700 cursor-pointer" onclick="location.href='assignment.html'">
                <td class="px-2 py-4">
                    1
                </td>
                <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                    <div class="flex">
                        <div class="icon p-3 rounded-full bg-gray-100">
                            <img src="/icons/Book.svg" alt="icon" class="w-6 bg-gray-10 ">
                        </div>
                        <div class="text ml-3">
                            <h5 class="text-left text-base font-semibold">Tugas 1. Struktur Website</h5>
                            <p class="text-left opacity-60 font-normal">Telkom DigiUp 2023</p>
                        </div>
                    </div>
                </th>
                <td class="text-left py-4">
                    <h3 class="text-black font-bold">Today, 23:59 WIB</h3>
                </td>
                <td class="px-6 py-4 text-center">
                    <button type="button" class="py-2 px-7 me-2 mb-2 text-green-500 text-sm font-medium focus:outline-none bg-gray-100 rounded-full border border-green-200 hover:bg-green-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-green-200 :focus:ring-green-700 :bg-green-800 :text-green-400 :border-green-600 :hover:text-white :hover:bg-green-700">Completed</button>
                </td>

            </tr>
            <tr class="bg-gray-100 border-b hover:bg-violet-100 :border-gray-700 cursor-pointer" onclick="location.href='assignment.html'">
                <td class="px-2 py-4">
                    2
                </td>
                <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                    <div class="flex">
                        <div class="icon p-3 rounded-full bg-gray-100">
                            <img src="/icons/Paint.svg" alt="icon" class="w-6 bg-gray-10 ">
                        </div>
                        <div class="text ml-3">
                            <h5 class="text-left text-base font-semibold">Tugas 2. Layout Website</h5>
                            <p class="text-left opacity-60 font-normal">Telkom DigiUp 2023</p>
                        </div>
                    </div>
                </th>
                <td class="text-left py-4">
                    <h3 class="text-black font-bold">Tomorrow, 23:59 WIB</h3>
                </td>
                <td class="px-6 py-4 text-center">
                    <button type="button" class="py-2 px-5 me-2 mb-2 text-red-500 text-sm font-medium focus:outline-none bg-gray-100 rounded-full border border-red-200 hover:bg-red-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-red-200 :focus:ring-red-700 :bg-red-800 :text-red-400 :border-red-600 :hover:text-white :hover:bg-red-700">Uncompleted</button>
                </td>

            </tr>
            <tr class="bg-gray-100 border-b hover:bg-violet-100 :border-gray-700 cursor-pointer" onclick="location.href='assignment.html'">
                <td class="px-2 py-4">
                    3
                </td>
                <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                    <div class="flex">
                        <div class="icon p-3 rounded-full bg-gray-100">
                            <img src="/icons/Ruler.svg" alt="icon" class="w-6 bg-gray-10 ">
                        </div>
                        <div class="text ml-3">
                            <h5 class="text-left text-base font-semibold">Project Akhir SaaS</h5>
                            <p class="text-left opacity-60 font-normal">Ms. Atik Ariyani</p>
                        </div>
                    </div>
                </th>
                <td class="text-left py-4">
                    <h3 class="text-black font-bold">13 Dec 2023 | 23:59 WIB</h3>
                </td>
                <td class="px-6 py-4 text-center">
                    <button type="button" class="py-2 px-5 me-2 mb-2 text-red-500 text-sm font-medium focus:outline-none bg-gray-100 rounded-full border border-red-200 hover:bg-red-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-red-200 :focus:ring-red-700 :bg-red-800 :text-red-400 :border-red-600 :hover:text-white :hover:bg-red-700">Uncompleted</button>
                </td>

            </tr>

        </tbody>
    </table>
</div>
@endsection