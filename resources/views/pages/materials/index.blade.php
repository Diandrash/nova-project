@extends('layout.index')

@section('container')
    <div class="container">
        <h1>All Materials</h1>

        @if(auth()->user()->role_id == 2)
            <button class="btn btn-primary" onclick="location.href='/teacher/materials/create'">Add Materials</button>
        @endif

        <div class="table-responsive mt-4">
            <table class="table table-hover">
                <thead>
                  <tr class="">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">File</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($materials as $material)
                        <tr onclick="window.open('{{ asset('materials/' . $material->file_path) }}', '_blank');">
                            <th scope="row"><ion-icon name="document-outline" class="text-primary fs-4"></ion-icon></th>
                            {{-- <td class="text-capitalized fs-5">{{ $material->title }}</td> --}}
                            <td class="text-capitalized fs-6">
                                <a href="{{ asset('materials/' . $material->file_path) }}" style="text-decoration: none;" target="_blank">{{ $material->title }}</a>
                            </td>
                            <td >
                                {{ $material->file_path }}
                            </td>
                            <td>
                                {{ $material->course->instructor->fullname }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($material->created_at, 'UTC')->setTimezone('Asia/Jakarta')->format('d F Y H:i T') }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
              </table>

              
            </div>

            <div id="pdfViewer"></div>

            <div id="docViewer"></div>
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