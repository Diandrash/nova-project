@extends('layout.student')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-semibold">My Course</h1>
        <div class="text-right flex">
            <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
        </div>
    </div>

    <div class="course-banner w-full mt-7 mb-3">
        <div class="card h-64 rounded-2xl py-1 bg-amber-300 ">
            <h3 class="ml-5 mt-3 text-3xl font-bold">{{ $course->name }}</h3>
            <p class="ml-5 mt-1 text-xl  font-normal">{{ $course->instructor->fullname }}</p>
        </div>
    </div>

    <div class="course-attributes flex flex-row flex-wrap">
        <div class="attribute flex px-9 mt-3 py-1.5 bg-violet-500 hover:bg-violet-700 rounded-full text-white" onclick="location.href='{{ route('materials.indexStudent', ['courseId' => $course->id]) }}'">
            <i class="fa-solid fa-book text-xl self-center"></i>
            <h1 class="text-base font-medium self-center ml-3 cursor-pointer">Materials</h1>
        </div>
        <div class="attribute ml-3 flex px-9 mt-3 py-1.5 bg-amber-400 hover:bg-amber-500 rounded-full" onclick="location.href='{{ route('assignment.indexStudent', ['courseId' => $course->id, 'course_id' => $course->id]) }}'">
            <i class="fa-solid fa-book-open text-xl  self-center"></i>
            <h1 class="text-base font-medium self-center ml-3 cursor-pointer">Assignments</h1>
        </div>
        <div class="attribute ml-3 flex px-9 mt-3 py-1.5 bg-violet-400 hover:bg-violet-500 rounded-full text-black" onclick="location.href='{{ route('studentShowUsers', ['courseId' => $course->id, 'course' => $course->id]) }}'">
            <i class="fa-solid fa-users text-xl  self-center"></i>
            <h1 class="text-base font-medium self-center ml-3 cursor-pointer">Members</h1>
        </div>
        <form id="leaveCourseForm" action="/student/courses/{{ $course->id }}/leave" method="post">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <button type="button" class="attribute ml-3 flex px-9 mt-3 py-1.5 bg-red-500 hover:bg-red-700 rounded-full text-white" onclick="confirmLeave()">
                <i class="fa-solid fa-right-from-bracket text-xl self-center"></i>
                <h1 class="text-base font-medium self-center ml-3 cursor-pointer">Leave Course</h1>
            </button>
        </form>
        

    </div>

    <div class="course-description mt-10">
        <h1 class="title font-semibold text-base">
            Course Description :
        </h1>

        <p class="mt-1 font-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis ex iure obcaecati? Cumque nesciunt perspiciatis dolores? Alias ab itaque unde. Lorem ipsum dolor sit amet consectetur adipisicing elit. A, deserunt eveniet ipsam ex numquam consequatur consequuntur reprehenderit est aut repellat corrupti explicabo, vel quisquam aperiam eum? Expedita cumque praesentium consectetur?</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmLeave() {
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
                // Jika pengguna mengonfirmasi, kirim formulir
                if (result.isConfirmed) {
                    document.getElementById('leaveCourseForm').submit();
                }
            });
        }
    </script>

@endsection