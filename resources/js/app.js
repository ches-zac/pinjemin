import './bootstrap';
import 'preline';

function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const spanElements = sidebar.querySelectorAll("span.hidden");

    if (sidebar.classList.contains("w-16")) {
        sidebar.classList.remove("w-16");
        sidebar.classList.add("w-64");
        spanElements.forEach((span) => span.classList.remove("hidden"));
    } else {
        sidebar.classList.remove("w-64");
        sidebar.classList.add("w-16");
        spanElements.forEach((span) => span.classList.add("hidden"));
    }
}

function togglePasswordVisibility(passwordInputId, eyeClosedId, eyeOpenId) {
    const passwordInput = document.getElementById(passwordInputId);
    const eyeClosed = document.getElementById(eyeClosedId);
    const eyeOpen = document.getElementById(eyeOpenId);

    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      eyeClosed.classList.add('hidden'); // Sembunyikan ikon mata tertutup
      eyeOpen.classList.remove('hidden'); // Tampilkan ikon mata terbuka
    } else {
      passwordInput.type = 'password';
      eyeClosed.classList.remove('hidden'); // Tampilkan ikon mata tertutup
      eyeOpen.classList.add('hidden'); // Sembunyikan ikon mata terbuka
    }
}

//fungsi inisialisasi
function initializeTogglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeClosed = document.getElementById('eyeClosed');
    const eyeOpen = document.getElementById('eyeOpen');

    if (passwordInput && eyeClosed && eyeOpen ) {
        console.log('yklo yg ini dah jalan')
        document.getElementById('eyeClosed').addEventListener('click', () => {
            togglePasswordVisibility('password', 'eyeClosed', 'eyeOpen');
        });
        document.getElementById('eyeOpen').addEventListener('click', () => {
            togglePasswordVisibility('password', 'eyeClosed', 'eyeOpen');
        });
        console.log('yg ini jalan ga')
        document.getElementById('eyeClosed1').addEventListener('click', () => {
            togglePasswordVisibility('password1', 'eyeClosed1', 'eyeOpen1');
        });
        document.getElementById('eyeOpen1').addEventListener('click', () => {
            togglePasswordVisibility('password1', 'eyeClosed1', 'eyeOpen1');
        });
    }
}

function initializeToggleSidebar() {
    const sidebarToggle = document.querySelector('button[onclick="toggleSidebar()"]');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', toggleSidebar);
    }
}

// DOM
document.addEventListener('DOMContentLoaded', () => {
    initializeTogglePassword();
    initializeToggleSidebar();
});
