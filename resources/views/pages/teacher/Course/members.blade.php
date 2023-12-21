@extends('layout.teacher')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-bold">All Your Members</span></h1>
        <div class="text-right flex">
            <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
        </div>
    </div>

    <h1 class="text-base font-medium hover:text-blue-700 cursor-pointer" onclick="location.href='{{ route('course.showTeacher', ['course' => $course->id]) }}'">{{ $course->name }}</span></h1>
    <div class="add-users flex w-56 py-1.5 px-3 bg-violet-500 hover:bg-violet-700 cursor-pointer mt-3 rounded text-white" onclick="location.href='/teacher/courses/{{ $course->id }}/code'">
        <i class="fa-solid fa-user-plus text-sm self-center"></i>
        <h1 class="text-sm ml-5 font-semibold">Add New Members</h1>
    </div>

    <div class="relative overflow-x-auto mt-5">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 :text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 :bg-gray-700 :text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-3">
                        No. 
                    </th>
                    <th scope="col" class="px-3 py-3 text-left">
                        Name
                    </th>
                    <th scope="col" class=" py-3 text-left">
                        Instance
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Join on
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>


                </tr>
            </thead>
            <tbody>
                
                @forelse ($users as $index => $user)

                <tr class="bg-gray-100 border-b hover:bg-yellow-100 :border-gray-700">
                    <td class="px-2 py-4">
                        {{ $loop->iteration }}
                    </td>
                    <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                        <h2 class="text-base">{{ $user->fullname }}</h2>
                    </th>
                    <td class="text-left py-4 cursor-pointer">
                        <h3 class="text-amber-500 font-bold text-base">{{ $user->instance }}</h3>
                    </td>
                    <td class="text-center py-4">
                        @php
                            $date = \Carbon\Carbon::parse($user->pivot->created_at);
                            $formattedDate = $date->format('j F Y');
                        @endphp
                        <h3 class="text-black font-medium text-base">{{ $formattedDate }}</h3>
                    </td>
                    <td class="text-center py-4">
                        <form class="deleteMember" action="{{ route('course.memberDelete', ['course' => $course->id, 'user' => $user->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <button type="button" class="attribute" onclick="confirmDelete(this)">
                                <i class="fa-solid fa-trash text-base text-white hover:text-gray-300 p-2 mx-1 bg-red-500 rounded"></i>
                            </button>
                            
                        </form>
                    </td>
                </tr>
                    
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500 font-semibold text-base">No materials available.</td>
                    </tr>
                @endforelse




            </tbody>
        </table>
    </div>

<script>
    function confirmDelete(button) {
        // Tampilkan SweetAlert konfirmasi
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to undo this action!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Confirm Leave'
        }).then((result) => {
            // Jika pengguna mengonfirmasi, kirim formulir terkait
            if (result.isConfirmed) {
                // Temukan formulir terkait dengan tombol yang diklik
                var form = button.closest('.deleteMember');
                form.submit();
            }
        });
    }
</script>

@endsection