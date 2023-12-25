@extends('layout.teacher')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-semibold">All Assignments</span></h1>
        <div class="text-right flex">
            @php
                $timezone = new DateTimeZone('Asia/Jakarta');
                $date = new DateTime('now', $timezone);
                $formattedDate = $date->format('l, d F Y ');
            @endphp
            <h1 class="text-base opacity-70 font-medium self-center md:block hidden">{{ $formattedDate }}</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900 md:block hidden" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900 md:block hidden" name="chevron-forward-outline"></ion-icon>
        </div>
    </div>


    <div class="add-assignment flex w-48 py-1.5 px-3 bg-amber-300 hover:bg-amber-500 cursor-pointer mt-5 rounded" onclick="location.href='{{ route('assignment.create', ['course' => $course->id, 'courseId' => $course->id]) }}'">
        <i class="fa-solid fa-plus text-xl self-center"></i>
        <h1 class="text-base ml-2 font-semibold">Create Assignment</h1>
    </div>
    <div class="table-assignments relative overflow-x-auto mt-2">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 :text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 :bg-gray-700 :text-gray-400">
                <tr>
                    <th scope="col" class="px-2 py-3">
                        No
                    </th>
                    <th scope="col" class="px-3 py-3 text-left">
                        Assignment name
                    </th>
                    <th scope="col" class=" py-3 text-center">
                        Due on
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Submission
                    </th>

                </tr>
            </thead>
            <tbody>
                @forelse ($assignments as $index => $assignment)
                @php
                    $icons = ['pen-ruler', 'palette', 'paintbrush', 'scroll'];
                    $colors = ['amber-700', 'violet-500', 'amber-500', 'violet-700'];
                    $randomIcon = $icons[array_rand($icons)];
                    $randomColor = $colors[array_rand($colors)];
                @endphp
                <tr class="bg-gray-100 border-b hover:bg-violet-100 :border-gray-700 cursor-pointer" >
                    <td class="number px-2 py-4">
                        {{ $loop->iteration }}
                    </td>
                    <th scope="row" class="assignment-name px-3 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                        <div class="flex">
                            <div class="icon py-3 px-4 rounded-full bg-gray-200 md:block hidden">
                                <i alt="icon" class="fa-solid fa-{{ $randomIcon }} bg-gray-10 text-{{ $randomColor }}"></i>
                            </div>
                            <div class="text ml-3">
                                <h5 class="text-left text-base font-semibold">{{ $assignment->title }}</h5>
                                <p class="text-left opacity-60 font-normal">{{ $assignment->course->name }}</p>
                            </div>
                        </div>
                    </th>
                    <td class="due-on text-center py-4">
                        @php
                            $deadline = \Carbon\Carbon::parse($assignment->deadline);
                            $formattedDeadline = $deadline->format('j F Y | H:i T');
                        @endphp
                        <h3 class="text-black font-bold">{{ $formattedDeadline }}</h3>
                    </td>
                    <td class="action text-center py-4 flex justify-center">
                        <i class="fa-solid fa-eye text-base text-white hover:text-gray-300 p-2 mx-1 bg-green-700 rounded" onclick="location.href='/teacher/assignments/{{ $assignment->id }}'"></i>

                        <i class="fa-solid fa-pencil text-base text-white hover:text-gray-300 p-2 mx-1 bg-amber-500 rounded" onclick="location.href='{{ route('assignment.edit', ['assignment' => $assignment->id, 'courseId' => $course->id]) }}'"></i>

                        <form class="deleteAssignment" action="{{ route('assignment.destroy', ['assignment' => $assignment->id, 'courseId' => $course->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $assignment->id }}">
                            <button type="button" class="attribute" onclick="confirmDelete(this)">
                                <i class="fa-solid fa-trash text-base text-white hover:text-gray-300 p-2 mx-1 bg-red-500 rounded"></i>
                            </button>
                            
                        </form>
                    </td>
                    <td class="show-submission px-6 py-4 text-center">
                        <button type="button" class="py-2 px-7 me-2 mb-2 text-white text-sm font-medium focus:outline-none bg-violet-500 rounded-full border hover:shadow-lg hover:bg-violet-700 cursor-pointer" onclick="location.href='{{ route('submission.index', ['assignmentId' => $assignment->id, 'assignment' => $assignment->id]) }}'">Show Submission</button>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500 font-semibold text-base">No Assignments available.</td>
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
                confirmButtonText: 'Confirm Delete'
            }).then((result) => {
                // Jika pengguna mengonfirmasi, kirim formulir terkait
                if (result.isConfirmed) {
                    // Temukan formulir terkait dengan tombol yang diklik
                    var form = button.closest('.deleteAssignment');
                    form.submit();
                }
            });
        }
    </script>
    
@endsection