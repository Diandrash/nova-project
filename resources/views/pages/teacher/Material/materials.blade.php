@extends('layout.teacher')

@section('container')
<div class="welcome-text main flex justify-between">
    <h1 class="text-2xl font-semibold">Your Course Materials</span></h1>
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

<h1 class="text-base font-medium hover:text-blue-700 cursor-pointer" onclick="location.href='{{ route('course.showTeacher', ['course' => $course->id]) }}'">{{ $course->name }}</span></h1>
<div class="add-material flex w-48 py-1.5 px-3 bg-amber-300 hover:bg-amber-500 cursor-pointer mt-5 rounded" onclick="location.href='{{ route('materials.create', ['courseId' => $course->id]) }}'">
    <i class="fa-solid fa-plus text-xl self-center"></i>
    <h1 class="text-base ml-2 font-semibold">Add New Material</h1>
</div>

<div class="relative overflow-x-auto mt-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 :text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 :bg-gray-700 :text-gray-400">
            <tr>
                <th scope="col" class="px-2 py-3">
                    #
                </th>
                <th scope="col" class="px-3 py-3 text-left">
                    Name
                </th>
                <th scope="col" class=" py-3 text-left">
                    File
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Action
                </th>
                <th scope="col" class="py-3 text-center">
                    Upload on
                </th>

            </tr>
        </thead>
        <tbody>
            @forelse ($materials as $index => $material)
            @php
                    $colors = ['amber-700', 'violet-500', 'amber-500', 'violet-700'];
                    $randomColor = $colors[array_rand($colors)];
                @endphp
            <tr class="bg-gray-100 border-b hover:bg-gray-300 :border-gray-700">
                <td class="px-2 py-4">
                    <i class="fa-solid {{ App\Helpers\FileHelper::getFileIconClass(pathinfo($material->file_path, PATHINFO_EXTENSION)) }} text-{{ $randomColor }} md:text-base text-xs self-center mr-2 shadow"></i>
                </td>
                <th scope="row" class="px-3 py-4 font-medium capitalize text-gray-900 whitespace-nowrap :text-white">
                    <h2 class="md:text-base text-sm">{{ $material->title }}</h2>
                </th>
                <td class="text-left py-4 cursor-pointer" onclick="window.open('{{$material->file_path}}', '_blank');">
                    <h3 class="text-blue-800 hover:text-blue-500 font-bold md:text-base text-sm">{{ $material->file_path }}</h3>
                </td>
                <td class="action text-center px-4 py-4 flex justify-center">
                    <a href="{{ $material->file_path }}" download>
                        <i class="fa-solid fa-download md:text-base text-sm text-white hover:text-gray-300 p-2 mx-1 bg-green-700 rounded"></i>
                    </a>
                    <i class="fa-solid fa-pencil md:text-base text-sm text-white hover:text-gray-300 p-2 mx-1 bg-amber-500 rounded" onclick="location.href='/teacher/materials/{{ $material->id }}/edit'"></i>

                    <form class="deleteMaterial" action="{{ route('materials.delete', ['material' => $material->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $material->id }}">
                        <input type="hidden" name="course_id" value="{{ $material->course->id }}">
                        <button type="button" class="attribute" onclick="confirmLeave(this)">
                            <i class="fa-solid fa-trash md:text-base text-sm text-white hover:text-gray-300 p-2 mx-1 bg-red-500 rounded"></i>
                        </button>
                        
                    </form>
                </td>
                <td class="text-center py-4">
                    @php
                        $date = \Carbon\Carbon::parse($material->created_at);
                        $formattedDate = $date->format('j F Y | H:i T');
                    @endphp
                    <h3 class="text-black font-medium md:text-base text-sm whitespace-nowrap">{{ $formattedDate }}</h3>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-4 text-gray-500 font-semibold text-base ">No materials available.</td>
            </tr>
            @endforelse



        </tbody>
    </table>
</div>


<script>
    function confirmLeave(button) {
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
                var form = button.closest('.deleteMaterial');
                form.submit();
            }
        });
    }
</script>

@endsection