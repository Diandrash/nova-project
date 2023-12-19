@extends('layout.index')


@section('container')
@if (session()->has('UpdateSuccess'))
    <div class="alert alert-success">
        {{ session('UpdateSuccess') }}
    </div>
@endif
    <div class="container mt-2">
        {{-- {{ $submission[0]->submission_text }} --}}
        <div class="row d-flex">
            <div class="d-flex text-primary col" onclick="history.back()">
                <ion-icon class="align-self-center" name="chevron-back-outline"></ion-icon>
                <h6 style="cursor: pointer" class="align-self-center mb-0 ms-1">Back</h6>
            </div>

            @if ($submission[0]->status == 1)
                <div class="col-3 d-flex">
                    <ion-icon name="checkmark-outline" class="text-primary fs-5 me-2 align-self-center"></ion-icon>
                    <p class="align-self-center mb-0">Turned on 28 October 2023</p>
                </div>
            @endif
        </div>
        <h1>{{ $assignment->title }}</h1>
        <p class="mt-1">Due on {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $assignment->deadline)->format('d F Y H:i') }}</p>
        <!-- Tautan ke Submission Page -->


        <h5 class="mt-1">Instruction :</h5>
        <p style="color: rgb(50, 52, 52)">{{ $assignment->description }}</p>

        <h5 class="mt-1">Attachment</h5>
        <div class="d-flex">
            <div class="col-4">
                <div class="d-flex rounded" style="background-color: rgb(202, 202, 202)">
                    <ion-icon class="align-self-center mt-1 mb-2 ms-2 fs-4" name="document-attach-outline"></ion-icon>
                    <a class="align-self-center mt-1 mb-2 ms-2 mb-0 fs-6" href="{{ asset('Assignments/' . $assignment->files) }}" target="_blank">{{ $assignment->files }}</a>
                    {{-- <ion-icon onclick="document.href='{{ asset('Assignments/' . $assignment->files) }}'" name="download-outline"></ion-icon> --}}
                </div> 
            </div>
            <div class="col ms-auto">
                <a href="{{ asset('Assignments/' . $assignment->files) }}" download class=" ms-2 btn btn-primary "><ion-icon name="download-outline"></ion-icon></a>
            </div>
        </div>

        
        @php
            $submissionId = $submission[0]->id
        @endphp
        <h5 class="mt-3">Your Work</h5>
        @if ($submission[0]->submitted_files)  
        <div class="d-flex">
            <div class="col-4">
                <div class="d-flex rounded" style="background-color: rgb(202, 202, 202)">
                    <ion-icon class="align-self-center mt-1 mb-2 ms-2 fs-4" name="document-outline"></ion-icon>
                    <a class="align-self-center mt-1 mb-2 ms-2 mb-0 fs-6" href="{{ asset('Submissions/' . $submission[0]->submitted_files) }}" target="_blank">{{ $submission[0]->submitted_files }}</a>
                   
                </div> 
            </div>
            <div class="col ms-auto">
                <a href="{{  asset('Submissions/' . $submission[0]->submitted_files)}}" download class=" ms-2 btn btn-primary "><ion-icon name="download-outline"></ion-icon></a>
            </div>
        </div>   
        <form action="{{ route('assignment.studentUpdate', ['course_id' => $course, 'assignment' => $assignment->id, 'submission' => $submissionId]) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="formFile" class=" mt-3 form-label">Update your work here</label>
                <div class="col-4">
                    <input class="form-control" type="file" id="formFile" name="submitted_files">
                </div>
                <input type="hidden" name="submission_text" value="test i">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                <input type="hidden" name="status" value="1">
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </div>
        </form> 
        @endif
        @if (!$submission[0]->submitted_files)
        <form action="{{ route('assignment.studentUpdate', ['course_id' => $course, 'assignment' => $assignment->id, 'submission' => $submissionId]) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload your files here</label>
                <div class="col-4">
                    <input class="form-control" type="file" id="formFile" name="submitted_files">
                </div>
                <input type="hidden" name="submission_text" value="test i">
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="assignment_id" value="{{ $assignment->id }}">
                <input type="hidden" name="status" value="1">
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </div>
        </form>
        @endif
    </div>

    

    <script>
        // Tambahkan event listener untuk tautan PDF
        const pdfLinks = document.querySelectorAll('.open-pdf');
        
        pdfLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const pdfUrl = link.getAttribute('data-pdf');
                openPdf(pdfUrl);
            });
        });
    
        // Fungsi untuk membuka PDF
        function openPdf(pdfUrl) {
            const container = document.getElementById('pdfViewer');
    
            // Buat instance PDF.js
            const pdfjsLib = window['pdfjs-dist/build/pdf'];
    
            // Atur lokasi worker
            pdfjsLib.GlobalWorkerOptions.workerSrc = '{{ asset('js/pdf.worker.js') }}';
    
            // Muat dokumen PDF
            pdfjsLib.getDocument(pdfUrl).promise.then(pdfDoc => {
                const numPages = pdfDoc.numPages;
    
                // Tampilkan semua halaman PDF
                for (let pageNumber = 1; pageNumber <= numPages; pageNumber++) {
                    pdfDoc.getPage(pageNumber).then(page => {
                        const canvas = document.createElement('canvas');
                        container.appendChild(canvas);
    
                        const scale = 1.5;
                        const viewport = page.getViewport({ scale });
    
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;
    
                        const context = canvas.getContext('2d');
                        page.render({
                            canvasContext: context,
                            viewport: viewport
                        });
                    });
                }
            });
        }

        // Show Docx
    </script>
    
    
@endsection 