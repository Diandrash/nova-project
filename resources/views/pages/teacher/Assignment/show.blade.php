@extends('layout.index')

@section('container')
    <div class="container mt-2">
        <div class="d-flex text-primary" onclick="history.back()">
            <ion-icon class="align-self-center" name="chevron-back-outline"></ion-icon>
            <h6 style="cursor: pointer" class="align-self-center mb-0 ms-1">Back</h6>
        </div>
        <h1>{{ $assignment->title }}</h1>
        <p class="mt-1">Due on {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $assignment->deadline)->format('d F Y H:i') }}</p>
        <!-- Tautan ke Submission Page -->
        <a href="{{ route('submission.index', ['assignment' => $assignment->id, 'assignmentId' => $assignment->id]) }}" class="btn btn-primary mt-2">View Submissions</a>


        <h5 class="mt-1">Instruction :</h5>
        <p style="color: rgb(50, 52, 52)">{{ $assignment->description }}</p>

        <h5 class="mt-1">Attachment</h5>
        <div class="mt-2">
            <div class="col-6 d-flex rounded" style="background-color: rgb(202, 202, 202)">
                <ion-icon class="align-self-center mt-1 mb-1 ms-2 fs-4" name="document-attach-outline"></ion-icon>
                <a class="align-self-center mt-1 mb-1 ms-2 mb-0 fs-6" href="{{ asset('Assignments/' . $assignment->files) }}" target="_blank">{{ $assignment->files }}</a>
                {{-- <ion-icon onclick="document.href='{{ asset('Assignments/' . $assignment->files) }}'" name="download-outline"></ion-icon> --}}
            </div> 
            <a href="{{ asset('Assignments/' . $assignment->files) }}" download class="btn btn-primary mt-2 ms-2">Download</a>
        </div>
    </div>

    <div id="pdfViewer"></div>

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