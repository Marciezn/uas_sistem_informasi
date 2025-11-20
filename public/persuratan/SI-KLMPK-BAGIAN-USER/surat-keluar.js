document.addEventListener('DOMContentLoaded', function() {
    // 1. Fungsionalitas Tombol Logout (Kanan Atas)
    const logoutButton = document.getElementById('logoutBtn');
    logoutButton.addEventListener('click', function() {
        alert('Anda telah menekan tombol Logout!'); 
        // Tambahkan window.location.href = '/login'; di sini untuk mengarahkan ke halaman login
    });

    // 2. Fungsionalitas Menu Navigasi Sidebar
    const menuItems = document.querySelectorAll('.menu-item');
    
    // Pastikan hanya Surat Keluar yang aktif saat dimuat
    menuItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault(); 
            // Hapus 'active' dari semua menu dan tambahkan ke item yang diklik
            menuItems.forEach(i => i.classList.remove('active'));
            this.classList.add('active');
        });
    });
});