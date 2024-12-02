import './bootstrap';
import 'preline';

// Fungsi togel sidebar
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const navIcons = sidebar.querySelectorAll(".nav-icon");
    const spanElements = sidebar.querySelectorAll("a span"); //select semua tag span di dlm tag a

    if (sidebar.classList.contains("w-16")) { //kalo shrinked
        sidebar.classList.remove("w-16"); //diexpand
        sidebar.classList.add("w-64");

        spanElements.forEach((span) => span.classList.remove("hidden"));//nampilin tulisannya
        navIcons.forEach((icon) => { // ratain ikon
            icon.classList.remove("mx-auto");
            icon.classList.add("mx-0");
        });
    } else { //kalo ternyata lagi expanded
        sidebar.classList.remove("w-64"); //di shrinked
        sidebar.classList.add("w-16");

        spanElements.forEach((span) => span.classList.add("hidden")); //sembunyiin tulisan
        navIcons.forEach((icon) => {
            icon.classList.remove("mx-0"); //ratain ikon
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




// const projectSelects = document.querySelectorAll('select');
// const kuotaElements = document.querySelectorAll('.kuota');
// const pinjamButtons = document.querySelectorAll('.pinjam-button');

// projectSelects.forEach((select, index) => {
//     select.addEventListener('change', () => {
// const selectedValue = select.value;
//     kuotaElements[index].textContent = `Kuota: ${selectedValue}`;
//     });
// });

// pinjamButtons.forEach(button => {
//     button.addEventListener('click', () => {
// const kuotaElement = button.previousElementSibling.querySelector('.kuota');
// const currentKuota = parseInt(kuotaElement.textContent.split(' ')[1]);

//     if (currentKuota > 0) {
//         kuotaElement.textContent = `Kuota: ${currentKuota - 1}`;
//         button.disabled = true;
//         alert('Item berhasil dipinjam.');
//     } else {
//         alert('Kuota sudah habis.');
//     }
//     });
// });

// const projectSelect = document.getElementById('projectSelect');
// const kuotaElement = document.getElementById('kuota');

//     projectSelect.addEventListener('change', () => {
// const selectedValue = projectSelect.value;
//       kuotaElement.textContent = `Kuota: ${selectedValue}`;
//     });

// const proyektorButton = document.getElementById('proyektorButton');
// const proyektorDropdown = document.getElementById('proyektorDropdown');

// proyektorButton.addEventListener('click', () => {
// proyektorDropdown.classList.toggle('hidden');
// });

// const searchInput = document.getElementById('searchInput');
// const searchResults = document.getElementById('searchResults');  
// const searchInput1 = document.getElementById('searchInput1');
// const searchResults1 = document.getElementById('searchResults1');  

// const ruangan = ['Ruangan A', 'Ruangan B', 'Ruangan C', 'Ruangan D'];
// const pelajaran = ['RPL', 'Agama', 'Matematika', 'Cinta'];

// searchInput.addEventListener('input', (event) => {
// const searchTerm = event.target.value.toLowerCase();
// const filteredRuangan = ruangan.filter(ruangan => ruangan.toLowerCase().includes(searchTerm));

// searchResults.innerHTML = filteredRuangan.map(ruangan => `<div class="px-4 py-2 hover:bg-gray-100 cursor-pointer">${ruangan}</div>`).join('');

// searchResults.classList.toggle('hidden', filteredRuangan.length === 0);
// });

// // Event delegation for click events on dynamically added room options
// searchResults.addEventListener('click', (event) => {
// if (event.target.tagName === 'DIV') {
//     const selectedRuangan = event.target.textContent;
//     console.log('Selected room:', selectedRuangan);
//     // Do something with the selected room, e.g., update input value
//     searchInput.value = selectedRuangan;
//     searchResults.classList.add('hidden');
// }
// });

// searchInput1.addEventListener('input', (event) => {
// const searchTerm = event.target.value.toLowerCase();
// const filteredPelajaran1 = pelajaran.filter(pelajaran => pelajaran.toLowerCase().includes(searchTerm));

// searchResults1.innerHTML = filteredPelajaran1.map(pelajaran => `<div class="px-4 py-2 hover:bg-gray-100 cursor-pointer">${pelajaran}</div>`).join('');

// searchResults1.classList.toggle('hidden', filteredPelajaran1.length === 0);
// });

// // Event delegation for click events on dynamically added room options
// searchResults1.addEventListener('click', (event) => {
// if (event.target.tagName === 'DIV') {
//     const selectedPelajaran = event.target.textContent;
//     console.log('Selected room:', selectedPelajaran);
//     // Do something with the selected room, e.g., update input value
//     searchInput1.value = selectedPelajaran;
//     searchResults1.classList.add('hidden');
// }
// });


// function toggleSidebar() {
//     const sidebar = document.getElementById("sidebar");
//     if (sidebar.classList.contains("w-16")) {
//         sidebar.classList.remove("w-16");
//         sidebar.classList.add("w-64");
//         sidebar.classList.add("md:flex");
//     } else {
//         sidebar.classList.remove("w-64");
//         sidebar.classList.add("w-16");
//     }
// }

// // Misalnya Anda mendapatkan nama peminjaman dari localStorage atau API
// const namaPeminjaman = "John Doe"; // Ganti ini dengan data yang Anda ambil dari halaman lain
// document.getElementById('nama-peminjaman').innerText = namaPeminjaman;
