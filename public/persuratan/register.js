document.getElementById("registerForm").addEventListener("submit", function(event) {
  event.preventDefault();

  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value.trim();
  const terms = document.getElementById("terms").checked;

  if (!terms) {
    alert("Please agree to the terms and privacy policy before registering.");
    return;
  }

  alert(`Registration successful!\nEmail: ${email}`);
  // di sini bisa diarahkan ke halaman login atau dashboard
});
