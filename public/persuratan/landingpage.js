// Smooth scroll untuk semua menu navbar
document.querySelectorAll('.navbar nav a').forEach(link => {
    link.addEventListener('click', e => {
        e.preventDefault();
        const target = document.querySelector(link.getAttribute('href'));
        if (target) {
            window.scrollTo({
                top: target.offsetTop - 70,
                behavior: 'smooth'
            });
        }
    });
});

// Highlight menu aktif saat scroll
const sections = document.querySelectorAll('section');
const navLinks = document.querySelectorAll('.navbar nav a');

window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(section => {
        const sectionTop = section.offsetTop - 100;
        const sectionHeight = section.clientHeight;
        if (scrollY >= sectionTop && scrollY < sectionTop + sectionHeight) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${current}`) {
            link.classList.add('active');
        }
    });
});

// ===============================
// 👇 Tambahan bagian navigasi tombol
// ===============================

// Tombol "Sign Up" di navbar → arahkan ke login.html
const signUpBtn = document.querySelector('.navbar .btn');
if (signUpBtn) {
    signUpBtn.addEventListener('click', () => {
        window.location.href = 'login.html';
    });
}

// Tombol "Get Started" di Hero → arahkan ke register.html
const getStartedBtn = document.querySelector('.hero .btn');
if (getStartedBtn) {
    getStartedBtn.addEventListener('click', () => {
        window.location.href = 'register.html';
    });
}

// Tombol "Get Started" di bagian Solution → juga ke register.html
const getStartedInSolution = document.querySelector('.solution .btn');
if (getStartedInSolution) {
    getStartedInSolution.addEventListener('click', () => {
        window.location.href = 'register.html';
    });
}
