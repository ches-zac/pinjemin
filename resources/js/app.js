import './bootstrap';
import 'preline';

// Fungsi togel sidebar
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const navIcons = sidebar.querySelectorAll(".nav-icon");
    const spanElements = sidebar.querySelectorAll("a span"); //select semua tag span di dlm tag a

    //cek apa sidebarnya lagi shrinked apa expanded
    if (sidebar.classList.contains("w-16")) { //kalo shrinked
        //diexpand
        sidebar.classList.remove("w-16");
        sidebar.classList.add("w-64");

        //nampilin tulisannya
        spanElements.forEach((span) => span.classList.remove("hidden"));
        // ratain ikon
        navIcons.forEach((icon) => {
            icon.classList.remove("mx-auto");
            icon.classList.add("mx-0");
        });
    } else { //kalo ternyata lagi expanded
        //di shrinked
        sidebar.classList.remove("w-64");
        sidebar.classList.add("w-16");

        //sembunyiin tulisan
        spanElements.forEach((span) => span.classList.add("hidden"));
        //ratain ikon
        navIcons.forEach((icon) => {
            icon.classList.remove("mx-0");
            icon.classList.add("mx-auto");
        });
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
    const sidebarToggle = document.getElementById('toggleBtn');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', toggleSidebar);
    }
}

// DOM
document.addEventListener('DOMContentLoaded', () => {
    initializeTogglePassword();
    initializeToggleSidebar();
});
