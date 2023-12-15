@extends('layout.index')

@section('container')
    <div class="container mt-3">
        <h1 class="">Students Submissions</h1>
        <div class="row">
          <div class="col-8 d-flex align-items-center mb-4 text-primary">
            @php
              $assignmentId = request()->query('assignmentId');
              $assignment = App\Models\Assignment::find($assignmentId);
              @endphp
              <ion-icon name="book-outline" class="fs-4 "></ion-icon>
            <p class="fs-5 mb-0 ms-2">
              {{ $assignment->title }}
            </p>
          </div>
          <div class="col">
            <p>Due on {{ \Carbon\Carbon::parse($assignment->deadline)->format('d F Y | H:i') . ' WIB'}}</p>
          </div>
        </div>

        <table class="table align-middle mb-0 bg-white">
            <thead class="bg-light">
              <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Files</th>
                <th>Completed On</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($submissions as $submission)                    
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                      <p class="fw-semibold mb-1">{{ $submission->user->fullname }}</p>
                  </div>
                </td>
                
                <td>
                    @if ($submission->status == 0)
                    <p class="btn btn-danger mb-0">Not Turned</p>
                    @endif

                    @if ($submission->status == 1)
                    <p class="btn btn-success mb-0">Has Turned</p>
                    @endif
                </td>
                <td>
                    <a class="fw-normal mb-1" href="{{ asset('Submissions/' . $submission->submitted_files) }}" target="blank">{{ $submission->submitted_files }}</a>
                    {{-- Andai_Aku_Menjadi_Bung_Karno.pdf --}}
                </td>
                <td>
                    @if ($submission->status == 0)
                        -
                    @endif                   

                    @if ($submission->status == 1)
                        {{-- {{ $submission->updated_at }} --}}
                        {{ \Carbon\Carbon::parse($submission->updated_at)->format('d F Y | H:i') . ' WIB'}}
                    @endif
                </td>
                <td>
                  <a href="{{ asset('Submissions/' . $submission->submitted_files) }}" download class="btn btn-warning "><ion-icon name="download-outline"></ion-icon></a>
                </td>
              </tr>
            @endforeach

            </tbody>
          </table>
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