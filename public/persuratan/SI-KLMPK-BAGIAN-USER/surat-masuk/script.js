document.getElementById("formSurat").addEventListener("submit", function (e) {
  e.preventDefault();
  alert("Data surat berhasil disimpan!");
});

document.getElementById("logoutBtn").addEventListener("click", function () {
  const confirmLogout = confirm("Yakin ingin logout?");
  if (confirmLogout) {
    alert("Anda telah logout!");
    window.location.href = "login.html"; // ganti sesuai halaman login kamu
  }
});
