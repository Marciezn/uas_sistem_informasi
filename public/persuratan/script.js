const ctx = document.getElementById('chartSurat').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        datasets: [{
          label: 'Jumlah Surat',
          data: [8000, 12000, 6000, 11000, 9500, 7800, 9800, 7200, 10500, 12000, 6500, 1500],
          backgroundColor: 'rgba(99, 132, 255, 0.4)',
          borderColor: '#6384ff',
          borderWidth: 1,
          borderRadius: 4
        }]
      },
      options: {
        scales: {
          y: { beginAtZero: true }
        },
        plugins: {
          legend: { display: true, position: 'top' }
        }
      }
    });


// File ini tetap statik (tanpa data backend)
document.querySelectorAll(".btn-edit").forEach(btn => {
  btn.addEventListener("click", () => {
    alert("Fitur edit pengguna masih dalam tahap pengembangan!");
  });
});

document.querySelectorAll(".btn-hapus").forEach(btn => {
  btn.addEventListener("click", () => {
    const konfirmasi = confirm("Apakah Anda yakin ingin menghapus pengguna ini?");
    if (konfirmasi) {
      alert("Data pengguna berhasil dihapus (simulasi statik).");
    }
  });
});

// Tombol "Kembali" simulasi ke halaman sebelumnya
document.getElementById("btnKembali").addEventListener("click", function() {
  alert("Kembali ke halaman sebelumnya.");
  window.history.back();
});


// Memberi efek "active" di sidebar
document.querySelector('.hapus').addEventListener('click', () => {
    alert('Surat berhasil dihapus!');
});

document.querySelector('.kembali').addEventListener('click', () => {
    history.back();
});

