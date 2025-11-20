// script.js

document.addEventListener('DOMContentLoaded', () => {
    console.log('Dashboard Sistem Informasi Persuratan siap dimuat.');

    // Fungsi untuk tombol aksi 'Lihat'
    document.querySelectorAll('.btn.lihat').forEach(button => {
        button.addEventListener('click', (e) => {
            // Mengambil nama dari baris yang sama
            const nama = e.target.closest('tr').querySelector('td:nth-child(1)').textContent;
            if (nama) {
                alert('Melihat detail surat untuk: ' + nama);
            } else {
                alert('Tidak ada data untuk baris ini.');
            }
        });
    });

    // Event listener untuk ikon print/cetak
    const printIcon = document.querySelector('.print-icon');
    if (printIcon) {
        printIcon.addEventListener('click', () => {
            alert('Fungsi cetak (print) untuk dashboard.');
            // window.print(); // Dapat diaktifkan jika Anda ingin mencetak halaman
        });
    }

    // Simulasi menu aktif
    document.querySelectorAll('.menu-item').forEach(item => {
        item.addEventListener('click', (e) => {
            // Hapus kelas 'active' dari semua menu
            document.querySelectorAll('.menu-item').forEach(m => m.classList.remove('active'));
            // Tambahkan kelas 'active' hanya pada item yang diklik
            e.currentTarget.classList.add('active');
            // Logika navigasi sebenarnya bisa diletakkan di sini
            console.log(e.currentTarget.textContent.trim() + ' diklik.');
        });
    });
    
});