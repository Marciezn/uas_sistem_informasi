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
    console.log('Halaman Sistem Informasi Persuratan siap dimuat.');

    // Contoh sederhana untuk tombol aksi (Lihat/Hapus)
    document.querySelectorAll('.btn.lihat').forEach(button => {
        button.addEventListener('click', (e) => {
            alert('Fungsi Lihat untuk surat: ' + e.target.closest('tr').querySelector('td:nth-child(2)').textContent);
        });
    });

    document.querySelectorAll('.btn.hapus').forEach(button => {
        button.addEventListener('click', (e) => {
            if (confirm('Anda yakin ingin menghapus surat ini?')) {
                // Logika penghapusan di sini (saat ini hanya alert)
                alert('Surat dihapus (simulasi)');
            }
        });
    });

    // Event listener untuk ikon print
    const printIcon = document.querySelector('.print-icon');
    if (printIcon) {
        printIcon.addEventListener('click', () => {
            alert('Fungsi cetak (print) akan diaktifkan di sini.');
            // window.print(); // Anda bisa mengaktifkan fungsi print browser
        });
    }
});