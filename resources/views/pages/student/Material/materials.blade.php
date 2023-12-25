@extends('layout.student')

@section('container')
    <div class="welcome-text main flex justify-between">
        <h1 class="text-2xl font-semibold">All Materials</span></h1>
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
    <div class="relative overflow-x-auto mt-3">
        <div class="text-info flex">
            <i class="fa-solid fa-circle-exclamation self-center text-sm opacity-40 mr-2"></i>
            <h1 class="text-sm font-semibold opacity-30 mb-1">Click on file to view</h1>
        </div>
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
                        Owner
                    </th>
                    <th scope="col" class="py-3 text-center">
                        Upload on
                    </th>
                    <th scope="col" class="py-3 text-center">
                        Action
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
                            {{ $loop->iteration }}
                        </td>
                        <th scope="row" class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap :text-white">
                            <h2 class="text-base">{{ $material->title }}</h2>
                        </th>
                        <td class="text-left py-4 cursor-pointer flex" onclick="window.open('{{ asset('materials/' . $material->file_path) }}', '_blank');">
                            <i class="fa-solid {{ App\Helpers\FileHelper::getFileIconClass(pathinfo($material->file_path, PATHINFO_EXTENSION)) }} text-{{ $randomColor }} text-medium self-center mr-2"></i>
                            <h3 class="text-blue-800 hover:text-blue-500 font-bold text-base">{{ $material->file_path }}</h3>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <h3 class="text-black font-medium text-base">{{ $material->course->instructor->fullname }}</h3>
                        </td>
                        <td class="text-center py-4">
                            @php
                                $date = $material->created_at;
                                $formattedDate = \Carbon\Carbon::parse($date)->format('d F Y | H.i');
                            @endphp
                            <h3 class="text-black font-medium text-base whitespace-nowrap">{{ $formattedDate . ' WIB' }}</h3>
                        </td>
                        <td class="px-3 py-4 text-center">
                            <a href="{{ asset('materials/' . $material->file_path) }}" download>
                                <button class="px-2 py-1 bg-blue-500 text-white ">
                                    <i class="fa-solid fa-download text-xs"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                @empty
                    <!-- Pesan jika materials kosong -->
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500 font-semibold text-base">No materials available.</td>
                    </tr>
                @endforelse
            </tbody>
            
        </table>

        <div id="pdfViewer"></div>

    </div>

    <script>
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
    </script>

@endsection