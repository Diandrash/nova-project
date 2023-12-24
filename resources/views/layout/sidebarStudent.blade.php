<div class="sidebar flex flex-col w-20 mt-3 fixed justify-between text-center rounded-full shadow-lg" style="background-color: #7537D8; height: 35rem;">
    <a href="">
        <div class="relative inline-flex items-center justify-center w-16 mt-3 h-16  overflow-hidden bg-gray-100 rounded-full ">
            <img src="https://i.pinimg.com/564x/03/39/27/033927806d11bab51c919cd265b6960b.jpg" alt="">
        </div>
    </a>
    <a href="/student" class="relative inline-flex items-center justify-center">
        <img src=" {{ (request()->is('student')) ? '/icons/HomeFilled.svg' : '/icons/Home.svg' }}" class="w-10" alt="">
    </a>
    <a href="/student/courses" class="relative inline-flex items-center justify-center">
        <img src=" {{ (request()->is('student/courses*')) ? '/icons/GraduationFilled.svg' : '/icons/Graduation Cap.svg' }}" class="w-10" alt="">
    </a>
    <a href="/student/assignments" class="relative inline-flex items-center justify-center">
        <img src=" {{ (request()->is('student/assignments*')) ? '/icons/BackpackFilled.svg' : '/icons/Backpack.svg' }}" class="w-10" alt="">
    </a>
    <a href="" class="relative inline-flex items-center justify-center">
    </a>
    
    
    <a href="javascript:void(0);" onclick="confirmLogout()" class="relative inline-flex items-center justify-center">
        <img src="/icons/Shutdown.svg" class="w-10 mb-3" alt="">
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
