// Fungsi tombol logout
document.getElementById('logoutBtn').addEventListener('click', function() {
  // Konfirmasi logout
  const yakin = confirm('Apakah kamu yakin ingin logout?');

  if (yakin) {
    // Redirect ke halaman login
    window.location.href = 'login.html';
  }
});
