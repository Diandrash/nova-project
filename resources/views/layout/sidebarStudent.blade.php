<div class="sidebar sidebar-student flex flex-col w-20 md:mt-3 mt-0 fixed justify-between text-center md:rounded-full rounded-none shadow-lg" >
    <a href="">
        <div class="relative inline-flex items-center justify-center md:w-16 w-14 md:h-16 h-14 mt-3  md:ml-0 ml-2 overflow-hidden bg-gray-100 rounded-full ">
            <img src="https://i.pinimg.com/564x/03/39/27/033927806d11bab51c919cd265b6960b.jpg" alt="">
        </div>
    </a>
    <a href="/student" class="relative inline-flex items-center justify-center md:ml-0 ml-2">
        <img src=" {{ (request()->is('student')) ? 'https://res.cloudinary.com/dlulk3leh/image/upload/v1705799226/Icons/homeFilled.svg' : 'https://res.cloudinary.com/dlulk3leh/image/upload/v1705799225/Icons/home.svg' }}" class="w-10" alt="">
    </a>
    <a href="/student/courses" class="relative inline-flex items-center justify-center md:ml-0 ml-2">
        <img src=" {{ (request()->is('student/courses*')) ? 'https://res.cloudinary.com/dlulk3leh/image/upload/v1705799200/Icons/graduationFilled.svg' : 'https://res.cloudinary.com/dlulk3leh/image/upload/v1705799152/Icons/graduation.svg' }}" class="w-10" alt="">
    </a>
    <a href="/student/assignments" class="relative inline-flex items-center justify-center md:ml-0 ml-2">
        <img src=" {{ (request()->is('student/assignments*')) ? 'https://res.cloudinary.com/dlulk3leh/image/upload/v1705799111/Icons/backpackFilled.svg' : 'https://res.cloudinary.com/dlulk3leh/image/upload/v1705799031/Icons/backpack.svg' }}" class="w-10" alt="">
    </a>
    <a href="" class="relative inline-flex items-center justify-center md:ml-0 ml-2">
    </a>
    
    
    <a href="javascript:void(0);" onclick="confirmLogout()" class="relative inline-flex items-center justify-center md:ml-0 ml-2">
        <img src="https://res.cloudinary.com/dlulk3leh/image/upload/v1705799231/Icons/shutdown.svg" class="w-10 mb-3" alt="">
    </a>

</div>

<!-- Masukkan link SweetAlert CSS dan JS pada halaman Anda (pastikan Anda sudah memasang SweetAlert di proyek Laravel Anda) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Tambahkan script JavaScript -->
<script>
    // Function to display SweetAlert confirmation
    function confirmLogout() {
        Swal.fire({
            title: 'Confirm Logout',
            text: 'Are you sure you want to logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, Logout!'
        }).then((result) => {
            // If the user confirms logout, redirect to the logout link
            if (result.isConfirmed) {
                window.location.href = '/logout';
            }
        });
    }
</script>
