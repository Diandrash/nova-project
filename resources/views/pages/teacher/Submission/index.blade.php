@extends('layout.teacher')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-bold">All Submissions on <span class="italic">{{ $assignment->title }}</span></h1>
        <div class="text-right flex">
            <h1 class="text-base opacity-70 font-medium self-center">Senin, 15 Desember 2023</h1>
            <ion-icon onclick="history.back()" class="self-center text-xl ml-5 text-violet-900" name="chevron-back-outline"></ion-icon>
            <ion-icon onclick="history.forward()" class="self-center text-xl ml-2 text-violet-900" name="chevron-forward-outline"></ion-icon>
        </div>
    </div>

    <h1 class="text-xl font-semibold mt-2">{{ $course->name }}</h1>

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
                        File
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Submitted On
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Mark
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Action
                    </th>


                </tr>
            </thead>
            <tbody>
                
                @forelse ($submissions as $index => $submission)
                <tr class="bg-gray-100 border-b hover:bg-yellow-100 :border-gray-700">
                    <td class="px-2 py-4">
                        {{ $loop->iteration }}
                        
                    </td>
                    <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                        <h2 class="text-base">{{ $submission->user->fullname }}</h2>
                    </th>
                    <td class="text-left py-4 cursor-pointer">
                        @if ($submission->submitted_files)
                            <h3 class="text-blue-900 hover:text-blue-500 font-bold text-base"onclick="window.open('{{ asset('submissions/' . $submission->submitted_files) }}', '_blank');">{{ $submission->submitted_files }}</h3>
                        @endif
                        @if (!$submission->submitted_files)
                            <h3 class=" font-medium text-sm italic opacity-70">Not Yet</h3>
                        @endif
                    </td>
                    <td class="text-center py-4">
                        @if ($submission->status == 0)
                            <button class="py-1 px-6 bg-red-500 rounded text-white font-semibold">Not Turn in</button>
                        @endif
                        @if ($submission->status == 1)
                            <button class="py-1 px-6 bg-green-500 rounded text-white font-semibold">Has Turn in</button>
                        @endif
                    </td>
                    <td class="text-center py-4">
                        @php
                            $date = \Carbon\Carbon::parse($submission->created_at);
                            $formattedDate = $date->format('j F Y | H:i T');
                        @endphp
                        <h3 class="text-black font-medium text-sm opacity-70">{{ $formattedDate }}</h3>
                    </td>

                    <th scope="row" class="px-3 py-4 font-medium text-green-600 whitespace-nowrap text-center">
                        @if ($submission->mark)
                        <h2 class="text-base">{{ $submission->mark }}/100</h2>
                        @endif
                        @if (!$submission->mark)
                        <h2 class="text-sm text-red-500 opacity-50">Not Marked</h2>
                        @endif
                    </th>

                    <td class="text-center py-4">
                        <a href="{{ asset('submissions/' . $submission->submitted_files) }}" download>
                            <i class="fa-solid fa-download text-base text-white hover:text-gray-300 p-2 mx-1 bg-violet-500 rounded" ></i>
                        </a>
                        @if ($submission->status == 1)
                            <button class="update-mark-btn" data-submission-id="{{ $submission->id }}" data-assignment-id="{{ $submission->assignment->id }}" data-user-fullname={{ $submission->user->fullname }}>
                                <i class="fa-solid fa-check text-base text-white hover:text-gray-300 p-2 mx-1 bg-green-500 rounded" ></i>
                            </button>
                        @endif
                        @if ($submission->status == 0)
                            <button disabled class="update-mark-btn" data-submission-id="{{ $submission->id }}" data-assignment-id="{{ $submission->assignment->id }}" data-user-fullname={{ $submission->user->fullname }}>
                                <i class="fa-solid fa-check text-base text-white  p-2 mx-1 bg-green-200 rounded focus-outline-none" ></i>
                            </button>
                        @endif
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

    <!-- Sertakan SweetAlert dan jQuery -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.update-mark-btn').on('click', function() {
                var submissionId = $(this).data('submission-id');
                var assignmentId = $(this).data('assignment-id');
                var userFullname = $(this).data('user-fullname');

                Swal.fire({
                    title: 'Give Mark to ' + userFullname + ' 0 - 100',
                    html: '<input id="swal-input" class="swal2-input">',
                    showCancelButton: true,
                    confirmButtonText: 'Update',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var newMark = $('#swal-input').val();

                        // Validasi nilai mark di sisi klien
                        if (newMark >= 0 && newMark <= 100) {
                            $.ajax({
                                url: '/teacher/assignments/' + assignmentId + '/submissions/' + submissionId + '/mark',
                                method: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    _method: 'PUT',
                                    mark: newMark
                                },
                                success: function(response) {
                                    Swal.fire('Success', 'Mark updated successfully', 'success');
                                },
                                error: function(error) {
                                    Swal.fire('Error', 'Failed to update mark', 'error');
                                }
                            });
                        } else {
                            Swal.fire('Error', 'Please enter a valid mark between 0 and 100', 'error');
                        }
                    }
                });
            });
        });

    </script>


@endsection