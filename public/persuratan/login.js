document.addEventListener("DOMContentLoaded", () => {
    const inputs = document.querySelectorAll("input");

    inputs.forEach(input => {
        input.addEventListener("focus", () => {
            input.style.borderColor = "#007bff";
        });
        input.addEventListener("blur", () => {
            input.style.borderColor = "#ddd";
        });
    });

    const form = document.getElementById("loginForm");
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        alert("Login berhasil (demo)");
    });
});
